<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpAuth extends Model
{
    use HasFactory;

    protected $table = 'otp_auth';
    
    protected $fillable = [
        'email',
        'otp',
    ];
    
    // If 'otp_id' is different from the default 'id' primary key
    protected $primaryKey = 'otp_id';
    
    public $timestamps = true;
    
}
