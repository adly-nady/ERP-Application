<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class day_data_operating_milling extends Model
{
    use HasFactory;
    protected $table='day_data_opeating_milling';
    protected $fillable=['id','Day_Name','Date','total_houer_operating_a','Total_Houer_Stop_A','Extraction_Ratio_A','Total_Houer_Operating_B','Total_Houer_Stop_B','Extraction_Ratio_B','Wheat_Quantity_A','Floor_Quantity_A','Amount_Quantity_A','Elsen_Quantity_A','Wheat_Quantity_B','Floor_Quantity_B','Amount_Quantity_B','Elsen_Quantity_B','the_path_report'];
    public $timestamps=false;
}
