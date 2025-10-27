<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newcateg extends Model
{
    use HasFactory;
    protected $fillable = [
        
        // 'TOTAL_APPROPRIATION',
        'CATEGORY',
        'AIPRefCode',
        'PPA',
        'RESOURCES',
        'RESPONSIBLE_UNIT',
       'Year',
        'NOTE',
        'ACCOUNT_CODE',
        'OBJECT_EXPENDITURE',
        'SOURCE_FUND',
        'FIRST',
        'FIRSTREM',
        'SECOND',
        'SECONDREM',
        'THIRD',
        'THIRDREM',
        'FOURTH',
        'FOURTHREM',
        'TOTAL',
        'REMAINING_BALANCE',
       

    ];

    public function Supplementals() {
  return $this->hasMany(supplemental::class,'category_id', 'id');
    }


}
