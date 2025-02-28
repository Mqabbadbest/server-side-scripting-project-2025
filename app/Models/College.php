<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];
    
    /**
     * Get the students for the college. One college can have many students.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students(){
        return $this->hasMany(Student::class);
    }
}
