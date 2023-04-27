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
                                <input class="@error('email') is-invalid @enderror" type="email" name="email" id="email" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror    
                            </div>            
                            <div>
                                <label for="password">Nouveau mot de passe</label>
                                <input class="@error('password') is-invalid @enderror" type="password" name="password" id="password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                                <input class="@error('password') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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