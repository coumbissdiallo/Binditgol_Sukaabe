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
        Schema::create('validations', function (Blueprint $table) {
            $table->id();
            $table->string('type_validation');
            $table->string('mode_signature');
            $table->date('date_validation');
            $table->unsignedBigInteger('id_officier');
            $table->foreign('id_officier')->references('id')->on('users');
            $table->unsignedBigInteger('id_declarationNaiss');
            $table->foreign('id_declarationNaiss')->references('id')->on('declaration_naissances');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validations');
    }
};
