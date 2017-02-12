@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h3>{{ $store->name }}</h3>
          <p>
              {{ $store->description }}
          </p>
          <address>
              {{ $store->address }}
          </address>
          @if ($store->logo)
            <img src="{{ $store->logo->url }}" alt="{{ $store->logo->name }}" class="img-rounded">
          @endif
          </p>
          <div>
              @if (Auth::user()->id == $store->user_id)
                  <a href="{{ route('stores.edit', ['id' => $store->id]) }}">Edit</a>
                  <form method="Post" action="{{ route('stores.destroy', $store->id) }}">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <input class="btn btn-danger" type="submit" value="Delete Store">
                  </form>
              @endif
          </div>
        </div>
    </div>
</div>
@endsection
