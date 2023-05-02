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
            $table->integer('own_production_company')->default(0);
            $table->integer('independ_investor')->default(0);
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
