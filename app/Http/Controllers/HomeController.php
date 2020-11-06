<?php

namespace App\Http\Controllers;

use App\Helpers\General\CollectionHelper;
use App\Http\Requests\StoreHomeAd;
use App\Jobs\AddImgUrl;
use App\Models\Ad;

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
    //Sorting Ads on main page by clicking buttons
    switch ($sort):
      case 'price_up':
        return view('index')->with(['data' => CollectionHelper::paginate(Ad::query()->get()->sortBy('price'), 10)]);
      case 'price_down':
        return view('index')->with(['data' => CollectionHelper::paginate(Ad::query()->get()->sortByDesc('price'), 10)]);
      case 'date_up':
        return view('index')->with(['data' => CollectionHelper::paginate(Ad::query()->get()->sortBy('created_at'), 10)]);
      case 'date_down':
        return view('index')->with(['data' => CollectionHelper::paginate(Ad::query()->get()->sortByDesc('created_at'), 10)]);
    endswitch;
    return view('index')->with(['data' => Ad::query()->paginate(10)]);
  }

  public function create(Ad $data)
  {
    return view('create')->with(['data' => $data]);
  }

  public function store(StoreHomeAd $request, Ad $data)
  {
    $validated = $request->validated();

    $tmp['name'] = $validated['name'];
    $tmp['desc'] = $validated['desc'];
    $tmp['price'] = $validated['price'];

    $result1 = $data->fill($tmp)->save();

    $result2 = AddImgUrl::dispatch($data->getAttributeValue('id'));

    if ($result1 && $result2) {
      return redirect()->route('create')->with('success', $data->id);
    } else {
      return redirect()->route('create')->with('error', 'Ошибка добавления новости!');
    }
  }
}
