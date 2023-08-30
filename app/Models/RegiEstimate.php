<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegiEstimate extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','content','quantity','unit','unit_prise','prise','checkitem_id','order','created_at','updated_at'];
}
