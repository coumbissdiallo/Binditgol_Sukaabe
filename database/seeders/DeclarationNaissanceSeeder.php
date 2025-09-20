<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeclarationNaissanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $declarations=DeclarationNaissance::inRandomOrder()->take(10)->get();
     
    }
}
