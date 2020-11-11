@extends('layouts.app')

@section('title', 'Добавление объявления')


@section('menu')
  @include('menu')
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Добавление отзыва</div>
          <form action="{{route('store', $data) }}"
                method="post">
            @csrf

            <div class="form-group row mt-4">
              <label for="adName"
                     class="col-md-4 col-form-label text-md-right">Имя автора</label>
              <div class="col-md-6">
                <input id="adName" type="text" class="form-control" name="author_name"
                       value="{{old('author_name')}}">

                @if ($errors->has('author_name'))
                  <div class="alert alert-danger mt-1" role="alert">
                    @foreach($errors->get('author_name') as $error)
                      {{ $error }}
                    @endforeach
                  </div>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="desc"
                     class="col-md-4 col-form-label text-md-right">Текст отзыва</label>
              <div class="col-md-6">
                <textarea name="desc" id="desc" cols="30" rows="10"
                          class="form-control">{{old('desc')}}</textarea>

                @if ($errors->has('desc'))
                  <div class="alert alert-danger mt-1" role="alert">
                    @foreach ($errors->get('desc') as $error)
                      {{ $error }}
                    @endforeach
                  </div>
                @endif
              </div>
            </div>

            <div class="form-group row mb-4">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">Добавить объявление</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
