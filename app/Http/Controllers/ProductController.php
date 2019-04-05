<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\Drink;
use App\Menu;

class ProductController extends Controller
{
    public function __construct()
    {
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($amount)
    {
        $amount = (int)$amount;
        $foods = Food::paginate($amount);
        $drinks = Drink::paginate($amount);
        $menus = Menu::paginate($amount);
        $products = ['foods' => $foods, 'drinks' => $drinks, 'menus' => $menus];
        return response()->json( ['products' => [$products]] ,200);
    }
    
    
    
    public function foods()
    {
        $foods = Food::paginate(20);
        
        return response()->json( [
            'foods' => $foods, 
            ] ,200);
    }
    
    public function drinks()
    {
        $drinks = Drink::paginate(20);
        
        return response()->json( [
            'drinks' => $drinks, 
            ] ,200);
    }
    
    public function menus()
    {
        $menus = Menu::paginate(20);
        
        return response()->json( [
            'menus' => $menus, 
            ] ,200);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProductRepository $ProductRepository, $id)
    {
        
        $url = url()->current();
        
        $type = $ProductRepository->getProductTypeByUrl($url);
        
        $product = $ProductRepository->findProductById($id, $type);
        
        return response()->json($product, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProductRepository $ProductRepository)
    {   
        
       
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductRepository $ProductRepository, $id)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
