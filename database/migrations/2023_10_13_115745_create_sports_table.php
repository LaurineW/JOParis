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
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->integer('annee_ajout');
            $table->integer('nb_epreuves');
            $table->integer('nb_disciplines');
            $table->string('url_media')->default('images/image1.jpg');
            $table->datetime('date_debut')->nullable(false);
            $table->datetime('date_fin')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sports');
    }
};
