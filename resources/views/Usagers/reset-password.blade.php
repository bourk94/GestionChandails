@extends('layouts.app')

@section('title', 'Réinitialiser le mot de passe')
@section('contenu')

    <section class="main-container">
        <div class="card__padding">
            <div class="card__container">
                <div class="flex__center">
                    <h1>Réinitialiser le mot de passe</h1>
                    <form form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" id="token" value="{{$token}}">
                        <div> 
                            <div>
                                <label for="email">Adresse courriel</label>
                                <input type="email" name="email" id="email" required>    
                            </div>            
                            <div>
                                <label for="password">Nouveau mot de passe</label>
                                <input type="password" name="password" id="password" required>
                            </div>
                            <div>
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required>
                            </div>  
                        </div>
                        <div class="flex__center">
                            <div class="flex__inline margin__top">
                                <button class="btn bg__orange color__white" type="submit">Réinitialiser le mot de passe</button>
                            </div>
                        </div>
                    </form>      
                </div>
            </div>
        </div> 
    </div>

@endsection