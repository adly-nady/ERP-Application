<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_operating_milling extends Model
{
    use HasFactory;
    protected $table='data_operating_milling';
    protected $fillable=['shift','line','time_start','time_stop','reason','error_type','error_time','power_a','power_b','extactiob_ratio_a','extactiob_ratio_b','date','f_k_data_day'];
    public $timestamps=false;
}
