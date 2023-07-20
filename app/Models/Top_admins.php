<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Top_admins extends Authenticatable
{
    use Notifiable;

    protected $table = 'top_admin';
    protected $fillable=['id','name','email','phone','password','other_data','status','open'];
    public $timestamps=false;
}
