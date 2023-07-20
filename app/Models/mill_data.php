<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mill_data extends Model
{
    use HasFactory;
    protected $table='data_operating_milling';
    protected $fillabel=['id','shift','line','time_start','time_stop','reason','error_type','error_time','power_a','power_b','wheat_quantity','flour_quantity','amount_quantity','elsen_quantity','control_manager','extactiob_ratio_a','extactiob_ratio_b','shift_manager','f_k_data_day'];
    public $timestamps=false;
}
