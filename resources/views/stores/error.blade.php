@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div style="font-size: 300px">
                {{ $error_code }}
            </div>
            <p>
              {{ $error_message }}
            </p>
        </div>
    </div>
</div>
@endsection
