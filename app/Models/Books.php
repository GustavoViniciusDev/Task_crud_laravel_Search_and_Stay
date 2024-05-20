<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
      /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'ISBN',
        'value',
    ];

    /**
     * The attributes that should be hidden for serialization
     * 
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

}
