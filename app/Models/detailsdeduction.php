<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailsdeduction extends Model
{
    use HasFactory;
    protected $fillable = [
        
       'uniqueID',
        'Quarter',
        'PR_No',
        'Date',
        'Title',
        'Amount',
        'Status',
        'Totaldeduction',
      
       

    ];
}
