<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use App\Models\ScriptCollection;
use App\Models\ProcessingPayment;
use App\Models\User;

class TransactionsController extends Controller
{
    public function buy_Script(Request $request){
        if(!auth()->user()->is_investor){
            return redirect()->back()->with('error', 'You are not an investor');
        }
        $validated = $request->validate([
            'script_id' => 'required|integer'
        ]);

        $script = ScriptCollection::find($validated['script_id']);

        if(!$script){
            return redirect()->back()->with('error', 'Script not found');
        }

        $amount = 1000; // in fcfa we can change later

        $res = auth()->user()->makePayment($amount, $script->id);

        if($res['status'] != 'success'){
            return redirect()->back()->with('error', 'An error occured');
        }

        $payment_link = $res['data']['link'];
        
        // redirect user to the payment link
        return Inertia::location($payment_link);
    }

    public function payment_callback(Request $request){
        $reference = $request->query('tx_ref');
        $transaction = ProcessingPayment::where('reference',$reference)->first();

        if(!$transaction){
            return redirect()->route('home')->with('error', 'Invalid transaction reference');
        }

        // TODO: Redirect to appropriate page
        if($transaction->status == 'successful'){
            return redirect()->route('home')->with('message', 'Payment successful');
        }

        return redirect()->route('home')->with('error', 'Payment failed');
    }

    public function flw_webhook(Request $request){
        $secretHash = env('FLW_SECRET_HASH');
        $signature = $request->header('verif-hash');
        if (!$signature || ($signature !== $secretHash)) {
            Log::error('Invalid signature');
            abort(401);
        }
        $payload = $request->all();
        Log::info($payload);
        // Update the payment status
        $transaction = ProcessingPayment::where('reference',$payload['txRef'])->first();

        if($transaction && $transaction->status == $payload['status']){
            // just return 200 response because the call is a duplicate
            Log::info('Duplicate webhook call for transaction: ' . $transaction->reference . ' with status: ' . $transaction->status . '');
            return response(200);
        }
        
        // updates the status of the transaction
        $transaction->update([
            'status' => $payload['status']
        ]);

        if($payload['status'] == 'successful'){
            $user = User::find($transaction->user_id);
            $user->buyScript($transaction->script_id, $transaction->amount);
        }

        return response(200);
    }
}
