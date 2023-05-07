<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Couleur;
use App\Models\Taille;
use App\Models\ArticleCampagne;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cartList()
    {
        
        $cartItems = \Cart::getContent();
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        $condition = ['couleur' => $request->couleur_id, 'taille'=> $request->taille_id, 'article_id'=> $request->article_id, 'campagne_id'=> $request->campagne_id];
        $article_campagne = DB::table('article_campagne')->where($condition)->value('id');
        
        if (!empty($request->except('_token')) && $request->quantity > 0 && $article_campagne != null) {
        $article = Article::find($request->article_id);
        $couleur = Couleur::find($request->couleur_id);
        $taille = Taille::find($request->taille_id);
        \Cart::add([
            'id' => $article_campagne,
            'name' => $article->nom,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $article->image,
                'id_article' => $request->article_id,
                'id_couleur' => $request->couleur_id,
                'id_taille' => $request->taille_id,
                'code_couleur' => $couleur->code_couleur,
                'couleur' => $couleur->nom_couleur,
                'taille' => $taille->format
            ],
        ]);
    }
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
            \Cart::update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity
                    ],
                ]
            );

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        return redirect()->route('cart.list');
    }

}