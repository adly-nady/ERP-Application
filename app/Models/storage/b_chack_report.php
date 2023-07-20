<?php

namespace App\Models\storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class b_chack_report extends Model
{
    use HasFactory;
    protected $table='b_chack_report_db';
    protected $fillable=['id','part_name','part_unit','part_unit','part_count','part_discription','resuilt_chack','note','title_id'];
    public $timestamps=false;
}
