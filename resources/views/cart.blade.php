@extends('layouts.app')

@section('title', 'Panier')
@section('contenu')

{{-- ZONE DE JEU --}}

    <div class="padding">
        <h1 class="center">Panier</h1>

        <br>

        <div style="overflow-x: auto;">
            <table class="customers w3-border w3-bordered">
                <tr>
                    <th></th> {{-- Zone pour l'image --}}
                    <th>Article</th>
                    <th>Couleur</th>
                    <th>Taille</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th></th>
                </tr>

                @if ($cartItems->isNotEmpty())
                    @foreach ($cartItems as $item)
                        <tr class="center">
                            <td>
                                @if ($item->attributes->image != null)
                                    <div class="flex__center">
                                        <img src="{{ asset("img/$article->type/$article->image") }}" alt="{{ $item->name }}">
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="cart__color"
                                    style="background-color: {{ $item->attributes->code_couleur }}">&nbsp;</div>
                                <div>{{ $item->attributes->couleur }}</div>
                                </td>
                            <td>{{ $item->attributes->taille }}</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id"
                                        value="{{ $item->id }}">
                                    <div>
                                        @livewire('counter', ['idarticle' => $item->id, 'count' => $item->quantity])
                                    </div>
                                    <div class="flex__center">
                                        <button class="cart__btn">Modifier</button>
                                        </div>
                                    </form>
                            </td>
                            <td>{{ $item->price * $item->quantity}} $</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button class="cart__btn"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </table>
            <h4>Total estimé: {{ Cart::getTotal() }} $</h4>
            <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
                <button class="cart__btn">Vider le panier</button>
            </form>
            @if (Auth::user())
                <div>
                    <form action="{{ route('commandes.store') }}" method="POST">
                        @csrf
                        <button class="cart__btn">Confirmer</button>
                    </form>
                </div>
            @endif
                @else
                    <h4>Panier vide</h4>
                @endif
        </div>
    </div>

{{-- FIN ZONE DE JEU --}}

    

{{-- ----------------------------MODAL---------------------------- --}}

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
