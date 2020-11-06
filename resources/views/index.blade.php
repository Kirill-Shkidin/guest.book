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

            <a href="{{ route('sort', 'price_up') }}" class=" btn bg-success">По возрастанию цены</a>
            <a href="{{ route('sort', 'price_down') }}" class=" btn bg-success">По убыванию цены</a>
            <a href="{{ route('sort', 'data_up') }}" class=" btn bg-success">По возрастанию даты</a>
            <a href="{{ route('sort', 'data_down') }}" class=" btn bg-success">По убыванию даты</a>
          </li>
        </div>

        @forelse ($data as $item)
          {{--          @dump($item)--}}
          <a href="{{ route('ad.one', $item->id) }}" class="btn p-0 mb-1">
            <div class="card border-0">
              <li class="list-group-item border-0">
                <div class="row">
                  <div class="col-2">
                    <img src="{{ $item->img1 }}" alt="" class="rounded" style="
max-width: 100%">
                  </div>
                  <div class="col-10">
                    <h5 class="pt-1">{{ $item->name }}</h5>
                    <p>{{ $item->desc }}</p>
                  </div>
                </div>
                <p>{{ $item->price }} $</p>
                <p>{{ $item->created_at }}</p>
                <a href="{{ route('ad.one', $item) }}" class=" btn bg-success">API</a>
              </li>
            </div>
          </a>
        @empty
          <div class="card border-0 m-1 p-1">
            Нет объявлений
          </div>
        @endforelse
        <div class="d-flex p-2 justify-content-center">
          {{ $data->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection
