<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'productName',
    ];

    // public function supplier() {
    //     return $this->belongsTo(Supplier::class);
    // }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function sizes() {
        return $this->hasMany(Size::class);
    }
}
