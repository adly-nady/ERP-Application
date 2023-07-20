<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\data_part;

class paper_part extends Model
{
    use HasFactory;
    protected $table = 'paper_part';
    protected $fillable=['id', 'id_part', 'date', 'income_quantity', 'price', 'out_quantity', 'id_report_income', 'id_report_out', 'recipient', 'report_name', 'name_f'];
    public $timestamps=false;

    public function get_many_p()
    {
        return $this->belongsTo(data_part::class,'part_name','id');
    }
}
