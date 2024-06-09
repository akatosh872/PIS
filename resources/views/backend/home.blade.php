@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1>Головна сторінка</h1>
        <p>Ласкаво просимо, {{ auth()->user()->name }}!</p>
    </div>
@endsection
