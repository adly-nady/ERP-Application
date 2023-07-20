<?php

namespace App\Models\storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class b_addreturn_report extends Model
{
    use HasFactory;
    protected $table='b_addreturn_report_db';
    protected $fillable=['id','part_name','part_id','part_unit','delivered_name','old_balance','income_balance','balance_after_add','note','title_id'];
    public $timestamps=false;
}
