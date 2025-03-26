<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
  
    
}


