<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_profile extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'email', 'profile_picture', 'phone_number','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
