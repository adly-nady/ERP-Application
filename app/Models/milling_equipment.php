<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class milling_equipment extends Model
{
    use HasFactory;
    protected $table="milling_equipment";
    protected $fillable=['id','Department','MQ_name','MQ_number'];
    public $timestamps=false;
}
