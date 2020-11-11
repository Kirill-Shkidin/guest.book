@extends('layouts.app')

@section('title')
  @parentГлавная
@endsection

@section('menu')
  @include('menu')
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">

        <div class="card border-0">
          <li class="list-group-item border-0">

            <a href="{{ route('sort', 'like_up') }}" class=" btn bg-success">По возрастанию лайков</a>
            <a href="{{ route('sort', 'like_down') }}" class=" btn bg-success">По убыванию лайков</a>
            <a href="{{ route('sort', 'date_up') }}" class=" btn bg-success">По возрастанию даты</a>
            <a href="{{ route('sort', 'date_down') }}" class=" btn bg-success">По убыванию даты</a>
          </li>
        </div>
{{--        @dd($data)--}}
        @forelse ($data as $item)
          {{--          @dump($item)--}}
          <a href="{{ route('one', $item->id) }}" class="btn p-0 mb-1">
            <div class="card border-0">
              <li class="list-group-item border-0">
                <div class="row">
                    <h5 class="pt-1">{{ $item->author_name }}</h5>
                    <p>{{ $item->desc }}</p>
                </div>
                <a href="{{ route('like', $item->id) }}" class="btn bg-success">Like</a>
                <p>{{ $item->likes }}</p>
                <p>{{ $item->created_at }}</p>
              </li>
            </div>
          </a>
        @empty
          <div class="card border-0 m-1 p-1">
            Нет отзывов
          </div>
        @endforelse
        <div class="d-flex p-2 justify-content-center">
          {{ $data->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection
