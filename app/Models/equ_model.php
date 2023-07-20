<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equ_model extends Model
{
    use HasFactory;
    protected $table='milling_equipment';
    protected $fillable=['id','MQ_name','MQ_number'];
    public $timestamps=false;
}
