<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;
// use Barryvdh\DomPDF\Facade\Pdf;

class Studentdata extends Model
{
    
    protected $primaryKey = 'rollno';
    public $incrementing = false;
    protected $keyType = 'string';
    //
    // protected $table = "tablename"; use this if table name not match with model
    protected $fillable = [
        'rollno',
        'image',
        'std',
        'firstname',
        'middlename',
        'lastname',
        'addressline1',
        'addressline2',
        'city',
        'pincode',
        'mobileno',
        'email',
        'dob',
        'status'
    ];
   
}
 