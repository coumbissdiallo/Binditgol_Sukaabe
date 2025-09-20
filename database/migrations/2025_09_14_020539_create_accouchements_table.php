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
        Schema::create('accouchements', function (Blueprint $table) {
            $table->id();
            $table->string('nom_mere');
            $table->string('prenom_mere');
            $table->string('cni_mere');
            $table->string('nom_pere')->nullable();
            $table->string('prenom_pere')->nullable();
            $table->string('cni_pere')->nullable();
            $table->date('date_naissance');
            $table->time('heure_naissance');
            $table->unsignedBigInteger('id_maternite');
            $table->foreign('id_maternite')->references('id')->on('maternites');
            $table->unsignedBigInteger('id_agent');
            $table->foreign('id_agent')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accouchements');
    }
};
