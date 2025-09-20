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
        Schema::create('enfants', function (Blueprint $table) {
            $table->id();
            $table->string('nom_enfant');
            $table->string('prenom_enfant');
            $table->string('sexe');
            $table->date('date_naissance');
            $table->time('heure_naissance');
            $table->unsignedBigInteger('id_parent');
            $table->foreign('id_parent')->references('id')->on('users');
            $table->unsignedBigInteger('id_accouchement');
            $table->foreign('id_accouchement')->references('id')->on('accouchements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enfants');
    }
};
