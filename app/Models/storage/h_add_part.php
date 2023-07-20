<?php

namespace App\Models\storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class h_add_part extends Model
{
    use HasFactory;
    protected $table='h_add_part_db';
    protected $fillable=['id','id_num','shift','date','supplayer','chackReport_id','incomeOrder_id','department_name','recipient_name','storage_manger','ginral_manger'];
    public $timestamps=false;
}
