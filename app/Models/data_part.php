<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\paper_part;

class data_part extends Model
{
    use HasFactory;
    protected $table='data_part';
    protected $fillable=['id','part_id','part_name','type_quantity','minimum_quantity','part_type','part_depart'];
    public $timestamps=false; 

    public function get_many_d()
    {
        return $this->hasMany(paper_part::class,'name_f','part_name');
    }
}
