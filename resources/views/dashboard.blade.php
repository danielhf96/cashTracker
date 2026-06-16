@extends('layouts.auth')

@section('title')
    Administra tus presupuestos
@endsection

@section('auth-contents')
    @if (session('success'))
        <div class="my-10 text-center border border-green-400 bg-green-100 py-3 text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <p class="mt-5 text-lg">
        Bienvenido a tu panel de control. Aquí podrás administrar tus presupuestos y gastos de manera eficiente.
    </p>
@endsection
