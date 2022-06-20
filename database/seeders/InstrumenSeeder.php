<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instrument;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InstrumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<4;$i++) 
        Instrument::create(['name' => Str::random(10),
        'imageUrl' => Str::random(10),
        'state'=>true,
        'bookingPrice'=>random_int(1,10000)]);
    }
}
