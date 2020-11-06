<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $fillable = ['name','desc','price', 'img1', 'img2', 'img3'];

}
