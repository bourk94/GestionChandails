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

   

        <!-- Script qui fait apparaitre un modal -->
        <div id="modalLogin" class="modal">
            <section class="modal-content">
                <div class=" card__padding">
                    <div class="card__container">
                        <div class="flex__center">
                            <h1>Connexion</h1>
                                <form method="POST" action="{{ route('login') }}">
                            <div>
                                    @csrf
                                    <div>
                                        <label for="email" class="form-label">Adresse courriel</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" required>
                                    </div>
                                    <div>
                                        <label for="password" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="flex__center">
                                            compte</a>
                                        <a class="hover__orange color__white" href="{{ route('usagers.create') }}">Créer un
                                    </div>
                                    <div class="flex__center">
                                        <div class="flex__inline margin__top">
                                            <a href="/forgot-password"><button
                                            <button class="btn bg__orange color__white" type="submit">Connexion</button>
                                                    class="btn bg__orange color__white margin__top" type="button">Mot de
                                        </div>
                                                    passe oublié</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <script>
        </div>
            //Mettre dans un .JS
            var modalLogin = document.getElementById("modalLogin");
            var btnModalLogin = document.getElementById("btnModalLogin");
            var span = document.getElementsByClassName(" close")[0];
            btnModalLogin.onclick = function() {
            }
                modalLogin.style.display = "block";
            span.onclick = function() {
                modalLogin.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modalLogin) {
                    modalLogin.style.display = "none";
                }
            }
        </script>
@auth
    @if (Auth::user()->type == 'admin')
        @include('Admin.show')
    @endif
@endauth
           
@endsection
