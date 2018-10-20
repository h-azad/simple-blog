<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'title', 'subtitle', 'image', 'description', 'status'
  ];

  public function scopePublished($query)
  {
      return $query->where('status', 1);
  }
}
