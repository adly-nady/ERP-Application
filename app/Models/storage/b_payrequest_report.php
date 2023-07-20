<?php

namespace App\Models\storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class b_payrequest_report extends Model
{
    use HasFactory;
    protected $table='b_payrequest_report_db';
    protected $fillable=['id','part_name','part_quantity','part_balance','part_quantity_want','part_id','note','title_id'];
    public $timestamps=false;
}
