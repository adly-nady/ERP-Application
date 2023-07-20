<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifacationwrning_db extends Model
{
    use HasFactory;
    protected $table='notifacationwrning_db';
    protected $fillable=['id', 'date', 'dp_WanteFix', 'controll_boy', 'error_location', 'start_time_error', 'shift_manger', 'department', 'who_will_fix', 'part_name', 'part_id', 'start_date_fix', 'start_time_fix', 'requerd', 'what_did', 'part_use', 'part_count', 'note', 'who_fix', 'name_WanteFix', 'mintanice_manger'];
    public $timestamps=false;
}
