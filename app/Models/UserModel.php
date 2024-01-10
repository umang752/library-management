<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
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
