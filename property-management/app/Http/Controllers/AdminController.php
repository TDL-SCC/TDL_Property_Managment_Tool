<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function showAdminCreateResForm()
    {
        return view('admin-create-res');
    }

    public function createRes(Request $request)
    {
        // //Validate the form data
        // $this->validate($request, [
        //     'username' => 'required',
        //     'password' => 'required|min:6'
        // ]);

        // //Attepmt to log the user in
        // if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
        //     //if successful, then redirect to their intended location
        //     return redirect()->intended(route('admin.dashboard'));
        // }

        // //if unsuccessful, then redirect back to the login with form data
        // return redirect()->back()->WithInput($request->only('username', 'remember'));
    }
}
