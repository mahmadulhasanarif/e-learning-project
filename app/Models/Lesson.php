<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    
    public function course()
    {
       return $this->hasMany(Course::class);
    }
}
