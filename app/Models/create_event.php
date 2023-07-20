<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_event extends Model
{
    use HasFactory;
    protected $table='create_event';
    protected $fillable=['id','title','start','end','created_at','updated_at'];
    public $timestamps=false;
}
