<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','item','content','quantity','unit','unit_prise','prise','web_flag','app_flag','machine_both','ja_flag','eng_flag','lang_both','checkitem_id','order'];
}
