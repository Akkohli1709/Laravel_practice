<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\UniqueConstraintViolationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {   
        try{
            User::create($request->validated());
            return redirect()->route('user.index')->with('status','User is Created Successfully');  
        }catch(\Exception $exception){
            return redirect()->back()->withErrors('Error Occurred');
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {    
        try {
            $user->update($request->validated());
            return redirect()->route('user.show',compact('user'))->with('status','User Updated Successfully');
        }catch(\Exception $exception){
            return redirect()->back()->withErrors('Error Occurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index')->with('status','Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error Occurred');
        }
        
    }

}
