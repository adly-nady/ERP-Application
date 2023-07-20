<?php

namespace App\Models\storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class h_pay_part extends Model
{
    use HasFactory;
    protected $table='h_pay_part_db';
    protected $fillable=['id','id_num','shift','date','couses','department_name','oprating_order_id','recipient_name','storage_manger','ginral_manger'];
    public $timestamps=false;
}
