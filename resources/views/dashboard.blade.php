@extends('layouts.auth')

@section('title')
    Administra tus presupuestos
@endsection

@section('auth-contents')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif

    <p class="mt-5 text-lg">
        Bienvenido a tu panel de control. Aquí podrás administrar tus presupuestos y gastos de manera eficiente.
    </p>
@endsection
