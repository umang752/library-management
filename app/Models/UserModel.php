<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'user';
     protected $primaryKey = 'user_id'; 
     public $timestamps = true;
     protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'phone',
        'status',
    ];
    public function book(){
        return $this->hasMany(Book::class);
    }
    public function role(){
        return $this->hasMany(Role::class);
    }
    public function bookissued(){
        return $this->hasMany(Bookissued::class);
    }
}
