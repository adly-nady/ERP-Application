<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total_balance_part extends Model
{
    use HasFactory;
    protected $table = 'total_part_balance';
    protected $fillable=['id', 'part_name', 'part_id', 'part_depart', 'balance'];
    public $timestamps=false;
}
