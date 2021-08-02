<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPersonalInfo extends Model
{
    use HasFactory;
    
    protected $table="user_personal_info";
    
    public function user(){
        return $this->hasOne(User::Class,'id','id');
    }
    
}
