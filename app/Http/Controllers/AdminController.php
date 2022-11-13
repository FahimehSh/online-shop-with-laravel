<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (filled(Auth::user()->birth_date)) {
            $birth_date = Auth::user()->birth_date;
            $date = jdate($birth_date)->format('Y/m/d');
            $jDate = CalendarUtils::convertNumbers($date, false);
            return view('dashboard.admin.personalInfo.index', compact('jDate'));
        }
        return view('dashboard.admin.personalInfo.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (filled(Auth::user()->birth_date)) {
            $birth_date = Auth::user()->birth_date;
            $date = jdate($birth_date)->format('Y/m/d');
            return view('dashboard.admin.personalInfo.edit', compact('date'));
        }

        return view('dashboard.admin.personalInfo.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $latinDate = CalendarUtils::convertNumbers($request->birth_date, true);
        $date = CalendarUtils::createCarbonFromFormat('Y/m/d', $latinDate)->format('Y-m-d');
        $user->birth_date = $date;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();

        if ($request->has('images')) {
            if ($user->files->first() != '' && $user->files->first() != null) {
                $file_old = public_path() . '/' . $user->files->first()->path;
                Storage::delete($file_old);
                $user->files()->delete();
            }
            foreach ($request->images as $image) {
                $public_path = 'public/uploads';
                uploadFiles($user, $image, $public_path);
            }

        }
        return Redirect::route('personal-info.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
