<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $fillable = ['name','desc','price', 'img1', 'img2', 'img3'];

  public static function rules()
  {
    return [
      'name' => ['required', 'max:200'],
      'desc' => 'required|max:1000',
      'price'=> 'required',
      'img1' => 'required',
      'img2' => 'nullable',
      'img3' => 'nullable',
    ];

  }

  public static function attrNames() {
    return [
      'name' => 'Название объявления',
      'desc' => 'Описание объявления',
      'img1' => "Изображение 1",
      'img2' => "Изображение 2",
      'img3' => "Изображение 3",
    ];
  }
}
