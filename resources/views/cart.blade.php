@extends('layouts.app')

@section('title', 'Panier')
@section('contenu')

    <div class="padding">
        <h1 class="center">Panier</h1>

        <br>


                </div>
            @endforeach

            <div>
                <h4>Total estimé: {{ Cart::getTotal() }}$</h4>
            </div>

            @if(Auth::user())
                <div class="flex__center">
                    <form action="{{ route('commandes.store') }}" method="POST">
                        @csrf
                        <input name="idUsager" type="hidden" value="{{ Auth::user()->id }}" />
                        <button class="cart__btn">Confirmer</button>
                    </form>
                </div>
            @endif
            <div>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="cart__btn">Vider le panier</button>
                </form>
                @else
                    <h4>Panier vide</h4>
                @endif
                
        </div>
    </div>

    <div id="modalLogin" class="modal">
        <div class="modal-content">
            <div>
                <a href="{{ route('accueil') }}"><span class="close">&times;</span></a>
            </div>
            <div class=" card__padding">
                <div class="card__container">
                    <div class="flex__center">
                        <h1>Connexion</h1>
                        <div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <input type="hidden" name="modal" value="modal">
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
                                    <a class="hover__orange color__white" href="{{ route('usagers.create') }}">Créer un
                                        compte</a>
                                </div>
                                <div class="flex__center">
                                    <div class="flex__inline margin__top">
                                        <button class="btn bg__orange color__white" type="submit">Connexion</button>
                                        <a href="{{ route('password.request') }}"><button
                                                class="btn bg__orange color__white margin__top" type="button">Mot de
                                                passe oublié</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!Auth::User())
        <script>
            var modalLogin = document.getElementById("modalLogin");
            modalLogin.style.display = "block";
        </script>
    @endif

@endsection
