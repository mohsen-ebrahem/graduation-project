<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MusicalNote;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class MusicalNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<4;$i++) 
        MusicalNote::create(['name' => Str::random(10),
        'noteUrl' => Str::random(10),
        'description'=>Str::random(40)]);
    }
}
