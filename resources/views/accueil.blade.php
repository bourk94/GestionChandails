@extends('layouts.app')
@section('contenu')

@guest
    @include('Accueil.show')
@else
    @if (Auth::user()->type == 'client')
        @include('Accueil.show')
    @endif
@endguest

@auth
    @if (Auth::user()->type == 'superadmin')
        @include('SuperAdmin.show')
    @endif
@endauth
    
@auth
    @if (Auth::user()->type == 'admin')
        @include('Admin.show')
    @endif
@endauth
           
@endsection
