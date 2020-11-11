@extends('layouts.app')

@section('title')
  @parent Отзыв
@endsection

@section('menu')
  @include('menu')
@endsection

@section('content')
  @if($data)
    <div class="card border-0">
      <li class="list-group-item border-0">
        <div class="row">
          <h5 class="pt-1">{{ $data->author_name }}</h5>
          <p>{{ $data->desc }}</p>
        </div>
        <p>{{ $data->likes }}</p>
        <p>{{ $data->created_at }}</p>
        <a href="{{ route('previous', $data->id) }}" class="btn btn-dark">Previous</a>
        <a href="{{ route('next', $data->id) }}" class="btn badge-light">Next</a>
      </li>

    </div>
  @else
    <h1>Извините</h1>
    <p>Такого отзыва нет;(</p>
  @endif
@endsection
