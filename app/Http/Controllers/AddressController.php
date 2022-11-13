<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'addresses' => Auth::user()->addresses,
            'states' => State::all(),
            'cities' => City::all(),
        ];
        return view('dashboard.admin.personalInfo.addresses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'states' => State::all(),
            'cities' => City::all(),
        ];
        return view('dashboard.admin.personalInfo.addresses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address();
        $address->user_id = Auth::id();
        $address->state_id = $request->state_id;
        $address->city_id = $request->city_id;
        $address->detail = $request->detail;
        $address->postal_code = $request->postal_code;
        $address->save();

        return Redirect::route('personal-info.address.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $data = [
            'address' => $address,
            'states' => State::all(),
            'cities' => City::all(),
        ];
        return view('dashboard.admin.personalInfo.addresses.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $address->state_id = $request->state_id;
        $address->city_id = $request->city_id;
        $address->detail = $request->detail;
        $address->postal_code = $request->postal_code;
        $address->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return Redirect::route('personal-info.address.index');
    }
}
