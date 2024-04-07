@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('user'))
                    <span class="fs-2 fw-bold me-auto">Hi, {{ session('user')->name }}</span><br>
                @else
                    <span class="fs-2 fw-bold me-auto">Hi, Guest</span><br>
                @endif

                @include('order')
            </div>
        </div>
    </div>
@endsection
