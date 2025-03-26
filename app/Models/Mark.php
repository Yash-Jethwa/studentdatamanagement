<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Mark extends Model
{    
    // protected $table = "tablename"; use this if table name not match with model
    protected $fillable = [
        'id',
        'userid',
        'rollno',
        'maths',
        'science',
        'ss',
        'english',
        'sanskrit',
        'hindi',
        'gujarati',
        'computer'
    ];

}
