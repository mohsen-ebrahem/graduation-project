<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<4;$i++) 
        Lesson::create(['name' => Str::random(10),
        'url' => Str::random(10),
        'description'=>Str::random(40),
        'course_id'=>$i+3]);
    }
}
