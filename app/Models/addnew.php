<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addnew extends Model
{
    use HasFactory;
    protected $fillable = [
        'Title', 'Department', 'Year','AIPRefCode','ACCOUNT_CODE'
    ];
}
