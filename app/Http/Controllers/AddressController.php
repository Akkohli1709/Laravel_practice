<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error Occurred');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('user.address.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request, User $user)
    {   
        try {
            $user->addresses()->create($request->validated());
            return redirect()->route('user.show',compact('user'));
        }catch(\Exception $exception){
            return redirect()->back()->withErrors('Error Occurred');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return redirect()->route('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Address $address)
    {
        return view('user.address.edit', compact('user','address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user,Address $address,AddressRequest $request )
    {
        try {
            $address->update($request->validated());
            return redirect()->route('user.show',compact('user'));
        }catch(\Exception $exception){
            return redirect()->back()->withErrors('Error Occurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user,Address $address)
    {
        try {
            $address->delete();
            return redirect()->route('user.show',compact('user'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error Occurred');
        }      
    }
}
