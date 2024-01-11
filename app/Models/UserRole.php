<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_role'; 

    protected $primaryKey = 'userrole_id'; 

    protected $fillable = [
        'user_id',
        'role_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
