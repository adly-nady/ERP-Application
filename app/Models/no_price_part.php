<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class no_price_part extends Model
{
    use HasFactory;
    protected $table='no_price_part';
    protected $fillable=['id','date','recipient','price','income_quantity','id_part','name_f'];
    public $timestamps=false;
}
