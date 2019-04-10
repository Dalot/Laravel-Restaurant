<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CartSession;
use App\Food;
use App\Drink;
use App\Menu;
use App\Cart;

use Session;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session =  Session::get('cart');
        dd($session);
        return response()->json( $cart, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = Auth::user();
        
        $data = $request->all();
        $type = $data['type'];
        if( $type == 'food' ) {
            
            $product = Food::find($data['product_id']);
            $product['price'] = (int) $product['price_food'];
        }
        else if ($type == 'drink') {
            $product = Drink::find($data['product_id']);
            $product['price'] = (int) $product['price_drink'];
        }
        else {
            $product = Menu::find($data['product_id']);
            $product['price'] = (int) $product['price_menu'];
        }
            
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            
            $cart = new Cart($oldCart);
            
            $cart->add($product, $product->id, $data['qty'], $type);
            
            $request->session()->put('cart', $cart); // Session a Store Instance (with an id) with Cart Instante which has Cart Items
            
            $cartArray = (array) $cart;
            
            return response()->json($cart,200);
            
       
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
