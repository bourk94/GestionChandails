@extends('layouts.app')

@section('title', 'Panier')
@section('contenu')

    <div class="">
        <div class="">
            <div class="">
                <h1 class="">Panier</h1>
                @if ($cartItems->isNotEmpty())
                    <div class="">
                        <table class="" cellspacing="0">
                            <thead>
                                <tr class="">
                                    <th class=""></th>
                                    <th class="">Nom</th>
                                    <th class="">
                                        <span class="" title="Quantity">Quantité</span>
                                    </th>
                                    <th class="">Prix</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>

                                            <p class="">{{ $item->name }}</p>


                                        </td>
                                        <td class="">
                                            <div class="">
                                                <div class="">

                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        @livewire('counter', ['idarticle' => $item->id, 'count' => $item->quantity])
                                                        <button class="">Modifier</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="">
                                                ${{ $item->price }}
                                            </span>
                                        </td>
                                        <td class="">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button class="">x</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div>
                            Total estimé: ${{ Cart::getTotal() }}
                        </div>
                        <div>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button class="">Vider le panier</button>
                            </form>
                        </div>
                    @else
                        <p>Panier vide</p>
                @endif


            </div>
        </div>
    </div>
    </div>
@endsection
