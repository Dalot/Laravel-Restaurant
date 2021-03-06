<?php

namespace App\Http\Controllers\Admin;

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
        
        $data = $request->all();
        
        $type = $ProductRepository->getProductType($data);
        
        $product = $ProductRepository->create($data, $type);
        
        return response()->json($product,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\
     * @return \Illuminate\Http\Response
     */
    

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
        $data = $request->all();
       
        $type = $ProductRepository->getProductType($data);
        
        unset($data['type']);
        
        $success = $ProductRepository->update($data, $type, $id); // Returns True or False
        
        if($success)
        {
            return response()->json($product,200);
        }
        
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
