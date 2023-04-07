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
        Schema::create('script_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('script_writer_id'); // Will contain user id of the person who uploads the script
            $table->text('document_url');
            $table->string('script_title');
            $table->text('script_synopsis');
            $table->integer('script_genre'); // Will contain the id of the genre of the script
            $table->string('script_logline');
            $table->string('script_sub_genre')->nullable();
            $table->integer('script_cast_size'); //cast size
            $table->integer('script_no_locations');
            $table->json('script_lead_roles')->nullable(); // lead 
            $table->text('poster_image')->nullable();
            $table->boolean('is_bought')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('script_collections');
    }
};
