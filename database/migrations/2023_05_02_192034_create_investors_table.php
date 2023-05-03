<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('previous_productions')->nullable();
            $table->integer('number_of_productions')->nullable();
            $table->text('links_to_trailers')->nullable();
            $table->integer('work_in_production_company')->default(0);
            $table->json('work_in_production_company_details')->nullable();
            $table->integer('own_production_company')->default(0);
            $table->json('own_production_company_details')->nullable();
            $table->integer('independent_investor')->default(0);
            $table->json('independent_investor_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investors');
    }
};
