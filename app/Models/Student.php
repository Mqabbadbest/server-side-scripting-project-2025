<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'dob', 'college_id'];

    /**
     * Get the college that the student belongs to. One student belongs to only one college.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function college(){
        return $this->belongsTo(College::class);
    }
}
