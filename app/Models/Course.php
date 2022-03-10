<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function lesson()
    {
       return $this->hasMany(Category::class);
    }
}
