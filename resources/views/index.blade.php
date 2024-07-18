@extends('base')

@section('main')
    <main>
        @yield('content')

        @include('templates.sidebar')
    </main>
@endsection
