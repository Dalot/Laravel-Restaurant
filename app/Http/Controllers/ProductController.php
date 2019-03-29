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
    public function index()
    {
        $foods = Food::paginate(20);
        $drinks = Drink::paginate(20);
        $menus = Menu::paginate(20);
        
        return response()->json( [
            'foods' => $foods, 
            'drinks' => $drinks, 
            'menus' => $menus
            ] ,200);
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
        $foods = Drink::paginate(20);
        
        return response()->json( [
            'drinks' => $foods, 
            ] ,200);
    }
    
    public function menus()
    {
        $foods = Menu::paginate(20);
        
        return response()->json( [
            'menus' => $foods, 
            ] ,200);
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
     * Display the specified resource.
     *
     * @param  \App\
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProductRepository $ProductRepository, $id)
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
