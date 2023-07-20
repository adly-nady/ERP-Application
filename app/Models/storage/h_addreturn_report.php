<?php

namespace App\Models\storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class h_addreturn_report extends Model
{
    use HasFactory;
    protected $table='h_addreturn_report_db';
    protected $fillable=['id','id_num','date','return_from','cosus_return','payed_befor','delivered _name','storage_manage','ginral_manage'];
    public $timestamps=false;
}
