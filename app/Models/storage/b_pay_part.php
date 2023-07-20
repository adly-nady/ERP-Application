<?php

namespace App\Models\storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class b_pay_part extends Model
{
    use HasFactory;
    protected $table='b_pay_part_db';
    protected $fillable=['id','part_id','part_name','part_unit','part_count','note','title_id'];
    public $timestamps=false;
}
