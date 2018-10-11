<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
  protected $fillable = [
      'admin_id', 'first_name', 'last_name', 'city', 'country', 'email', 'about_me','profile_pic', 'quote'
  ];
}
