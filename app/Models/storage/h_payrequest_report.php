<?php

namespace App\Models\storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class h_payrequest_report extends Model
{
    use HasFactory;
    protected $table='h_payrequest_report_db';
    protected $fillable=['id','id_num','date','who_want','depart','storag_manage','who_want_name','milling_manage','ginral_manage','paying_manage'];
    public $timestamps=false;
}
