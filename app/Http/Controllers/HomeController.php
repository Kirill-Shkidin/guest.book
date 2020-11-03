<?php

namespace App\Http\Controllers;

use App\Helpers\General\CollectionHelper;
use App\Jobs\AddImgUrl;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //$this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
      return view('index')->with(['data' => Ad::query()->paginate(10)]);
  }

  public function sort($sort)
  {
    if ($sort == 'price_up') {
      return view('index')->with(['data' => CollectionHelper::paginate(Ad::query()->get()->sortBy('price'), 10)]);
    } elseif ($sort == 'price_down') {
      return view('index')->with(['data' => CollectionHelper::paginate(Ad::query()->get()->sortByDesc('price'), 10)]);
    } elseif ($sort == 'date_up') {
      return view('index')->with(['data' => CollectionHelper::paginate(Ad::query()->get()->sortBy('created_at'), 10)]);
    } elseif ($sort == 'date_down') {
      return view('index')->with(['data' => CollectionHelper::paginate(Ad::query()->get()->sortByDesc('created_at'), 10)]);
    }
      return view('index')->with(['data' => Ad::query()->paginate(10)]);
  }

  public function show(Ad $Ad)
  {
    return view('one')->with(['data' => $Ad->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)]);
  }

  public function showAll()
  {
    return view('one')->with(['data' => Ad::query()->get()->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)]);
  }

  public function create(Ad $data)
  {
    return view('create')->with(['data' => $data]);
  }

  public function store(Request $request, Ad $data)
  {
    $this->validate($request, Ad::rules(), [], Ad::attrNames());

    $result1 = $data->fill($request->except('_token', 'img1', 'img2', 'img3'))->save();

    $result2 = AddImgUrl::dispatch($data->getAttributeValue('id'));

    if ($result1 && $result2) {
      return redirect()->route('create')->with('success', $data->id );
    } else {
      return redirect()->route('create')->with('error', 'Ошибка добавления новости!');
    }
  }
}
