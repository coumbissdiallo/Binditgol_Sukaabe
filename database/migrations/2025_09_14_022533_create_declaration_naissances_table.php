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
        Schema::create('declaration_naissances', function (Blueprint $table) {
            $table->id();
            $table->date('date_declaration');
            $table->string('statut');
            $table->unsignedBigInteger('id_enfant');
            $table->foreign('id_enfant')->references('id')->on('enfants');
            $table->unsignedBigInteger('id_createur');
            $table->foreign('id_createur')->references('id')->on('users');
            $table->unsignedBigInteger('id_accouchement');
          $table->foreign('id_accouchement')->references('id')->on('accouchements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaration_naissances');
    }
};
