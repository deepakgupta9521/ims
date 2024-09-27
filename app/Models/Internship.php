<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Internship extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'internships';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'title',
        'admin_id',
        'company_name',
        'email',
        'short_description',
        'deadline',
        'location',
        'work_type',
        'job_type',
        'duration',
        'salary',
        'job_description',
        'responsibilities',
        'category',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }


    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // Optionally, if you have timestamps in your table
    public $timestamps = true;
}
