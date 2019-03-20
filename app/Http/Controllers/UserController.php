<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserLoginRequest;
use App\Repositories\UserRepository;

use App\User;

class UserController extends Controller
{
    
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(UserLoginRequest $request)
    {
        
        $validated = $request->validated();
 
        if (auth()->attempt($validated)) {
            
            $user = auth()->user();
            $token = $user->createToken('restaurant')->accessToken;
            Auth::login($user);
            
            return response()->json(['token' => $token], 200);
        } 
        
        return response()->json(['error' => 'UnAuthorised'], 401);
        
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
    public function register(UserStoreRequest $request, UserRepository $UserRepository)
    {
        
        $validated = $request->validated();
        
        $userAndToken = $UserRepository->create($validated);
        
        return response()->json([$userAndToken], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        
        if($user->id != $id) // Avoid strict equal because $id is a string
        {
            abort(403);
        }
        
        return response()->json(['user' => $user], 200);
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
