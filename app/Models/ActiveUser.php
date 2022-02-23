<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];
    
    public function user() {
        return $this->hasOne(User::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
