@extends('layouts.app')

@section('title', 'Panier')
@section('contenu')

    <div class="">
        <h1 class="">Panier</h1>
        @if ($cartItems->isNotEmpty())
            @foreach ($cartItems as $item)
                <div class="cart__grid">
                    @if ($item->attributes->image == null)
                        <div class="flex__center">
                            <div class="zoneImageVide">.</div>
                        </div>
                    @else
                        <div class="flex__center">
                            <div>
                                <h3>Image</h3>
                            </div>
                            <img src="{{ asset("img/$article->type/$article->image") }}" alt="{{ $item->name }}">
                        </div>
                    @endif
                    <div class="flex__center">
                        <div>
                            <h3>Article</h3>
                        </div>
                        <h4>{{ $item->name }}</h4>
                    </div>
                    <div class="flex__center">
                        <div>
                            <h3>Couleur</h3>
                        </div>
                        <div class="flex__center">
                            <div class="cart__color" style="background-color: {{ $item->attributes->code_couleur }}">&nbsp;
                            </div>
                            <div>{{ $item->attributes->couleur }}</div>
                        </div>
                    </div>
                    <div class="flex__center">
                        <div>
                            <h3>Taille</h3>
                        </div>
                        <h4>{{ $item->attributes->taille }}</h4>
                    </div>
                    <div class="flex__center">
                        <div class="cart__title">
                            <h3>Quantité</h3>
                        </div>
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div>
                                @livewire('counter', ['idarticle' => $item->id, 'count' => $item->quantity])
                            </div>
                            <div class="flex__center">
                                <button class="cart__btn">Modifier</button>
                            </div>
                        </form>
                    </div>
                    <div class="flex__center">
                        <div>
                            <h3>Prix</h3>
                        </div>
                        <h4>{{ $item->quantity * $item->price }}$</h4>
                    </div>

                    <div class="flex__center">
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button class="cart__btn"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>


                </div>
            @endforeach

            <div>
                <h4>Total estimé: {{ Cart::getTotal() }}$</h4>
            </div>

            @if(Auth::user())
                <div class="flex__center">
                    <form action="{{ route('commandes.store') }}" method="POST">
                        @csrf
                        <button class="cart__btn">Confirmer</button>
                    </form>
                </div>
            @endif
            <div>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="cart__btn">Vider le panier</button>
                </form>
            </div>
        @else
            <p>Panier vide</p>
        @endif
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
