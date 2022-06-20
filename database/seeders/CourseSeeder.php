<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<4;$i++)
        Course::create(['name' => Str::random(10),
        'url' => Str::random(10),
        'description'=>Str::random(40),
        'level'=>'advanced',
        'teacher_id'=>$i+2]);
    }
}
