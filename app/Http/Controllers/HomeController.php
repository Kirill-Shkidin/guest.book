<?php

namespace App\Http\Controllers;

use App\Helpers\General\CollectionHelper;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    return view('index')->with(['data' => Review::query()->paginate(10)]);
  }

  public function sort($sort)
  {
//    dd(Review::query()->get()->sortByDesc('created_at'));
    //Sorting Reviews on main page by clicking buttons
    switch ($sort):
      case 'like_up':
        return view('index')->with(['data' => CollectionHelper::paginate(Review::query()->get()->sortBy('likes'), 10)]);
      case 'like_down':
//        dd(Review::query()->get()->sortByDesc('likes'));
        return view('index')->with(['data' => CollectionHelper::paginate(Review::query()->get()->sortByDesc('likes'), 10)]);
      case 'date_up':

        return view('index')->with(['data' => CollectionHelper::paginate(Review::query()->get()->sortBy('created_at'), 10)]);
      case 'date_down':
        $data = Review::query()->latest()->paginate(10)->appends(['sort' => 'created_at']);
//        dd(Review::query()->get()->sortByDesc('created_at'));
        return view('index')->with(['data' => CollectionHelper::paginate(Review::query()->get()->sortByDesc('created_at'), 10)]);
    endswitch;
    return view('index')->with(['data' => Review::query()->paginate(10)]);
  }

  public function show(Review $review)
  {
    return view('one')->with(['data' => $review]);
  }

  public function create(Review $data)
  {
    return view('create')->with(['data' => $data]);
  }

  public function store(Request $request, Review $data)
  {

    $validated['author_name'] = strip_tags($request->author_name);
    $validated['desc'] = strip_tags($request->desc);
    $validated['author_ip'] = $_SERVER['REMOTE_ADDR'];
    $validated['created_at'] = now();
    $validated['updated_at'] = now();


    $result = $data->fill($validated)->save();

    if ($result) {
      return redirect()->route('create')->with('success', $data->id);
    } else {
      return redirect()->route('create')->with('error', 'Ошибка добавления отзыва!');
    }
  }

  public function like(Request $request, Review $review)
  {
    if(DB::table('reviews_likes')->where([['user_ip', $_SERVER['REMOTE_ADDR']], ['review_id', $review->id]])->first()) {
      $result = false;
//      $data['likes'] = $request->likes - 1;
//      $data['updated_at'] = now();
//      $result = $data->save();
    } else {
//      dd($review->likes);
      $review['likes'] = $review->likes + 1;
      $review['updated_at'] = now();
      $result = $review->save();
      DB::table('reviews_likes')->insert(['user_ip' => $_SERVER['REMOTE_ADDR'], 'review_id'=> $review->id, 'updated_at' => now(), 'created_at' => now()]);
    }

    if ($result) {
      return redirect()->route('one', $review->id);
    } else {
      return redirect()->route('one', $review->id)->with('error', 'Два раза лайкать нельзя!');
    }
  }

  public function next(Request $request, Review $review) {
    $next = $review->id + 1;
    if (DB::table('reviews')->find($next)) {
      return redirect()->route('one', $next);
    } else {
      return redirect()->route('one', $review->id)->with('error', 'Такого обзора нет');
    }
  }

  public function previous(Request $request, Review $review) {
    $previous = $review->id - 1;
    if (DB::table('reviews')->find($previous)) {
      return redirect()->route('one', $previous);
    } else {
      return redirect()->route('one', $review->id)->with('error', 'Такого обзора нет');
    }
  }
}
