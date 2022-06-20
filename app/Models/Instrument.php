<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;
    
    protected $fillable=['name','imageUrl','state','description','bookingPrice','bookingDate','expireDate','user_id'];
}
