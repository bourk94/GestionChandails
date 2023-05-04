<div>
    <form method="POST" action="{{ route('cart.list') }}" >
        @csrf
        <button type="submit"><i class="fa fa-shopping-cart"></i> Panier ({{ $cart_count }})</button>
    </form>
</div>
