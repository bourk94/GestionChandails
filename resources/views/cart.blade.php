@extends('layouts.app')

@section('title', 'Panier')
@section('contenu')

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
                        <tr>
                            <td>
                                @if ($item->attributes->image != null)
                                    <div class="flex__center">
                                        <img src="{{ asset("img/$article->type/$article->image") }}" alt="{{ $item->name }}">
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="row" style="align-items: center;">
                                    <div class="cart__color"
                                        style="background-color: {{ $item->attributes->code_couleur }}">&nbsp;</div>
                                    <div>{{ $item->attributes->couleur }}</div>
                                </div>
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
        </div>
        <h4>Total estimé: {{ Cart::getTotal() }} $</h4>
        @if (Auth::user())
            <div>
                <form action="{{ route('commandes.store') }}" method="POST">
                    @csrf
                    <button class="w3-button w3-block w3-hover-red btnColor">Confirmer</button>
                </form>
            </div>
        @endif

        <br>

        <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
            <button onclick="return confirm('Êtes-vous certain de vouloir vider le panier ?')" class="w3-button w3-block w3-black w3-hover-red">Vider le panier</button>
        </form>
        @else
            <h4>Panier vide</h4>
        @endif
        
    </div>

{{-- ----------------------------MODAL---------------------------- --}}

<div class="w3-container">
    <div id="modalLogin" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
            <a href="{{ route('accueil') }}" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</a>
            </div>

            <form class="w3-container" method="POST" action="{{ route('login') }}">
            @csrf
                <input type="hidden" name="modal" value="modal">
                <div class="w3-section">
                    <label for="email">Adresse courriel :</label>
                    <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="w3-section">
                    <label for="password">Mot de passe :</label>
                    <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="password" id="password" name="password" required>
                </div>

                <div class="center">
                    <a href="{{ route('usagers.create') }}">Créer un compte</a>
                </div>

                <br>

                <div>
                    <button type="submit" class="w3-button w3-block w3-hover-red btnColor">Connexion</button>
                    <br>
                    <a class="a_decoration_none" href="{{ route('password.request') }}"><button class="w3-button w3-block w3-hover-red btnColor" type="button">Mot de passe oublié</button></a>
                </div>
            </form>
            <br>
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
