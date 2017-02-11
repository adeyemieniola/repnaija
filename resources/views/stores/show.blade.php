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
          <p>
              {{ $store->description }}
          </p>

        </div>
    </div>
</div>
@endsection
