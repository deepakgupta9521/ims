<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
    'internship_id',
    'user_id',
    'cv',
    ];

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }
}
