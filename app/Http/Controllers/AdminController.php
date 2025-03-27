<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function validateLogin(Request $request)
    {
        $input = $request->input_user;
        if (is_numeric($request->input_user)) {

            $name = User::where('phone', $request->input_user)->pluck('name')->first();
            $role_id = User::where('phone', $request->input_user)->pluck('role_id')->first();
            $role_name = Role::where('id', $role_id)->pluck('role')->first();
            $admin_id = User::where('phone', $request->input_user)->pluck('id')->first();

            $credentials = array(
                'phone' => $request->get('input_user'),
                'password' => $request->get('input_password'),
            );

            if (Auth::attempt($credentials, $request->get('remember_me'))) {
                // Remember Login Details
                if ($request->has('remember_me')) {
                    Cookie::queue('saved_input', $request->get('input_user'), 1440);
                    Cookie::queue('saved_password', $request->get('input_password'), 1440);
                }
                $request->session()->put('admin', ['id' => $admin_id, 'name' => $name, 'role_id' => $role_id, 'role_name' => $role_name]);

                return response()->json([
                    'status' => 200,
                    'url' => route('admin.dashboard')
                ]);
            } else {
                return response()->json([
                    'status' => 202,
                    'message' => 'Invalid Credentials',
                ]);
            }
        }
    }


    public function profile(Request $request)
    {
        $admin_id = Auth::user()->id;
        $admin = User::where('id', $admin_id)->first();
        return view('admin.profile', compact('admin'));
    }
}
