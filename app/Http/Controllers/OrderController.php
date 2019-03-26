<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Repositories\ProductRepository;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Food;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        $orders = User::find($user->id)->orders;
        
        return response()->json($orders,200);
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
    public function store(OrderStoreRequest $request, OrderRepository $OrderRepository)
    {
        $user = Auth::user();
        
        $data = $request->validated();
        
   
        if( $data["user_id"] != $user->id ) // Avoid literal non equal because id received might be a string
        {
            abort(403);
        }
        
        $order = $OrderRepository->create($data);
        
        $associations = $OrderRepository->createProductAssociations($data, $order, $user->id);

        return response()->json( [
            'message' => "Order has been successfully placed as their respective relationships",
            'order' => $order
            ] ,200);
        
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
