<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssued extends Model
{
    use HasFactory;
    protected $table = 'book_issued'; 

    protected $primaryKey = 'issue_id'; 

    protected $fillable = [
        'user_id',
        'book_id',
        'status',
        'renew_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
