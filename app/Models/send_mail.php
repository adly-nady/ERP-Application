<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class send_mail extends Model
{
    use HasFactory;
    protected $table='sender';
    protected $fillable=['id','email'];
    public $timestamps=false;
}
