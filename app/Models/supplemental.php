<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplemental extends Model
{
    use HasFactory;
    protected $fillable = [                                                                                                                                            
        'name',
        'category_id',
        'FIRST1',
        'THIRD3',
        'SECOND2',     
        'FOURTH4',
      
    ];


}
