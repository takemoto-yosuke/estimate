<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegiCheckitem extends Model
{
    use HasFactory;
    protected $fillable = ['checkitem','order','created_at','updated_at'];
}
