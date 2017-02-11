@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Stores</h1>
        <a href="{{ route('stores.create')}}"> Add New Stores</a>
        <div class="col-md-8 col-md-offset-2">
            @forelse ($stores as $store)
              <div class="store">
                  <h3><a href="{{ route('stores.show', ['id' => $store->id]) }}">{{ $store->name }}</a></h3>
                  <p>
                    {{ $store->description }}
                  </p>
              </div>

            @empty
              <p>
                You haven't created a store yet. Create <a href="{{ route('stores.create')}}">here</a>
              </p>
            @endforelse
        </div>
    </div>
</div>
@endsection
