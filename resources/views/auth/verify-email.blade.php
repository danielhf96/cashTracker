@extends('layouts.auth')

@section('title')
    Confirma tu cuenta
@endsection

@section('auth-contents')

    @if(session('success'))
        <x-alert type="success" :message="session('success')"/>
    @endif

    <p class="mt-5 text-lg">
        Tu cuenta ha sido creada exitosamente. Por favor, verifica tu correo electrónico para continuar.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <input type="submit"  value="Reenviar correo de verificación" class="mt-5 w-full bg-amber-500 text-white py-2 rounded-md hover:bg-amber-600 font-bold cursor-pointer uppercase">
    </form>
@endsection