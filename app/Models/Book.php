<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book'; // Specify the table name

    protected $primaryKey = 'book_id'; // Specify the primary key

    protected $fillable = [
        'name',
        'author',
        'description',
        'status',
        'photo',
        'total_inventory',
        'issued_copies',
        'price',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
