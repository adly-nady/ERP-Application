<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_between_relation extends Model
{
    use HasFactory;
    protected $table='data_between_relation';
    protected $fillable=['shift','id_day_operating','total_wheal_a','total_wheal_b','total_Flour_a','total_Flour_b','total_sien_a','total_sien_b','total_apostasy_a','total_apostasy_b'];
    public $timestamps=false;
}
