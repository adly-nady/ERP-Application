<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance_db extends Model
{
    use HasFactory;
    protected $table = 'maintenance_db';
    protected $fillable=['id','type_dep','date','title'];
    public $timestamps=false;
}
