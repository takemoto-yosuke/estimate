<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatePartLang extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','item','content','quantity','unit','unit_prise','prise','machine','lang','checkitem_id','order','created_at','updated_at'];
}
