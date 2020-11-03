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
          <div class="card-header">{{ __('Добавление объявления') }}</div>
          <form action="{{route('store', $data) }}"
                method="post">
            @csrf

            <div class="form-group row mt-4">
              <label for="adName"
                     class="col-md-4 col-form-label text-md-right">{{ __('Заголовок объявления') }}</label>

              <div class="col-md-6">
                <input id="adName" type="text" class="form-control" name="name"
                       value="{{old('name')}}">


                @if ($errors->has('name'))
                  <div class="alert alert-danger mt-1" role="alert">
                    @foreach($errors->get('name') as $error)
                      {{ $error }}
                    @endforeach
                  </div>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="desc"
                     class="col-md-4 col-form-label text-md-right">{{ __('Описание объявления') }}</label>
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

            <div class="form-group row">
              <label for="adPrice"
                     class="col-md-4 col-form-label text-md-right">{{ __('Цена') }}</label>
              <div class="col-md-6">
                <input id="adPrice" type="text" class="form-control" name="price"
                       value="{{old('price')}}">
                @if ($errors->has('price'))
                  <div class="alert alert-danger mt-1" role="alert">
                    @foreach ($errors->get('price') as $error)
                      {{ $error }}
                    @endforeach
                  </div>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="adImg1"
                     class="col-md-4 col-form-label text-md-right">{{ __('Изображение 1') }}</label>
              <div class="col-md-6">
                <input id="adImg1" type="text" class="form-control" name="img1"
                       value="{{old('img1')}}">
                @if ($errors->has('img1'))
                  <div class="alert alert-danger mt-1" role="alert">
                    @foreach ($errors->get('img1') as $error)
                      {{ $error }}
                    @endforeach
                  </div>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="adImg2"
                     class="col-md-4 col-form-label text-md-right">{{ __('Изображение 2') }}</label>
              <div class="col-md-6">
                <input id="adImg2" type="text" class="form-control" name="img2"
                       value="{{old('img2')}}">
                @if ($errors->has('img2'))
                  <div class="alert alert-danger mt-1" role="alert">
                    @foreach ($errors->get('img2') as $error)
                      {{ $error }}
                    @endforeach
                  </div>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="adImg3"
                     class="col-md-4 col-form-label text-md-right">{{ __('Изображение 3') }}</label>
              <div class="col-md-6">
                <input id="adImg3" type="text" class="form-control" name="img3"
                       value="{{old('img3')}}">
                @if ($errors->has('img1'))
                  <div class="alert alert-danger mt-1" role="alert">
                    @foreach ($errors->get('img1') as $error)
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
