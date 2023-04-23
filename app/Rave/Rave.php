<?php
namespace App\Rave;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Rave {
    protected $publicKey;
    protected $secretKey;
    protected $baseUrl;
    protected $secretHash;


    function __construct(){
        $this->publicKey = env('FLW_PUBLIC_KEY');
        $this->secretKey = env('FLW_SECRET_KEY');
        $this->baseUrl = 'https://api.flutterwave.com/v3';
        $this->secretHash = env('FLW_SECRET_HASH');
    }

    public static function generateReference(){
        return 'maintle_' . uniqid(time());
    }

    public function initializePayment(array $data){
        $payment = Http::withToken($this->secretKey)->post(
            $this->baseUrl . '/payments',
            $data
        )->json();

        return $payment;
    }

    public function verifyWebHook($request){
        if($request->header('verif-hash')){
            $signature = $request->header('verif-hash');

            if($signature == $this->secretHash){
                return true;
            }
        }

        return false;
    }

    public function verifyTransaction($id)
    {
        $data =  Http::withToken($this->secretKey)->get($this->baseUrl . "/transactions/" . $id . '/verify')->json();
        return $data;
    }
}