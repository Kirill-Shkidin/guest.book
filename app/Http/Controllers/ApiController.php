<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class ApiController extends Controller
{
  public function index()
  {
//    return view('one')->with(['data' => Ad::query()->get()->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)]);
    return Ad::all()->toJson(JSON_UNESCAPED_UNICODE);
  }

  public function show(Ad $ad)
  {
//    return view('one')->with(['data' => $Ad->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)]);
    return $ad->toJson(JSON_UNESCAPED_UNICODE);
  }
}
