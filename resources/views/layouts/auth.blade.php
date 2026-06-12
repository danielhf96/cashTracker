@extends('layouts.base')

@section('content')
    <main class="max-w-2xl mt-10 mx-auto p-10 shadow-lg">

        <h1 class="fontbold text-4xl">
            @yield('title')
        </h1>


        @yield('auth-contents')
    </main>
@endsection
