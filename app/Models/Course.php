<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
class Course extends Model
{
    protected $fillable = ['name','url','description','level','teacher_id'];
    use HasFactory;
    public function lessons(){
        return $this->hasMany(Lesson::class); 
    }
}
