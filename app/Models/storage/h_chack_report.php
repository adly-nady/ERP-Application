<?php

namespace App\Models\storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class h_chack_report extends Model
{
    use HasFactory;
    protected $table='h_chack_report_db';
    protected $fillable=['id','id_num','date','supplier','recipient','date_arrived','recipient_name','storage_manage'];
    public $timestamps=false;
}
