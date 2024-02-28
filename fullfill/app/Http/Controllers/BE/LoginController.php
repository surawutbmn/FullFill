<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('be.login');
    }
    public  function  postLogin(Request $request){
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ], [
            'login.required' => 'กรุณากรอกอีเมลหรือชื่อผู้ใช้',
            'password.required' => 'กรุณากรอกรหัสผ่าน'
        ]);

        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credential = [
            $loginType => $request->input('login'),
            'password' => $request->input('password')
        ];

        if (\Auth::attempt($credential)) {
            $user = \Auth::user();

            // Check role
            if ($user->role == '1') {
                return redirect()->route('be.home.index')->with('login', 'เข้าสู่ระบบสำเร็จ');
            } elseif ($user->role == '2') {
                return redirect()->route('seller.order')->with('login', 'เข้าสู่ระบบสำเร็จ');
            }

            // Default redirect if no specific role is found
            return redirect()->route('fe.homepage')->with('login', 'เข้าสู่ระบบสำเร็จ');
        }


        return redirect()->route('login.index')->with('error', 'ไม่พบผู้ใช้งาน');
        // if(\Auth::attempt($credential)){
        //     return redirect()->route('be.home.index')->with('login','เข้าสู่ระบบสำเร็จ');
        // }
        // return redirect()->route('login.index')->with('error','ไม่พบผู้ใช้งาน');
    }
    public function logout(){
        if (Auth::user()->role != 0) {
            Auth::logout();
            // Redirect users with role != 0 to the login page
            return redirect()->route('login.index')->with('success', 'ออกจากระบบแล้ว');
        }

        Auth::logout();
        return redirect()->route('fe.homepage')->with('success', 'ออกจากระบบแล้ว');
    }
    public function registerSeller()
    {
        return view('be.register_seller');
    }

    public function postRegisterSeller(Request $request)
    {
        // Validation rules for seller registration
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => Hash::make($request->input('password')),
            'role' => '2', // Set the role directly
        ]);
        $user->save();

        return redirect()->route('login.index')->with('success', 'registration successful');
    }

    public function registerBuyer()
    {
        return view('be.register_buyer');
    }

    public function postRegisterBuyer(Request $request)
    {
        // Validation rules for buyer registration
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user
        $user = new User([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => '0', // Set the role directly
        ]);
        $user->save();

        return redirect()->route('login.index')->with('success', 'registration successful');
    }
}
