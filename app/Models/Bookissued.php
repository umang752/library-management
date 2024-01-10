<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookissued extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(UserModel::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }

}
