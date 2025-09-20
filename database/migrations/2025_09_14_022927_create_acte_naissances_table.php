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
        Schema::create('acte_naissances', function (Blueprint $table) {
            $table->id();
            $table->date('anne_acte');
            $table->integer('numero_registre');
            $table->date('datesignature');
            $table->unsignedBigInteger('id_commune');
            $table->foreign('id_commune')->references('id')->on('communes');
            $table->unsignedBigInteger('id_signatureofficier');
            $table->foreign('id_signatureofficier')->references('id')->on('users');
            $table->unsignedBigInteger('id_enfant');
            $table->foreign('id_enfant')->references('id')->on('enfants');
            $table->unsignedBigInteger('id_declaration');
            $table->foreign('id_declaration')->references('id')->on('declaration_naissances');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acte_naissances');
    }
};
