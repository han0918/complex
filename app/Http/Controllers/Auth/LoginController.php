<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('destroy');
    }

    public function create()
    {
        return view('admin.login');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request,[
            'name' => 'required|max:255',
            'password' => 'required'
        ]);
        if(Auth::guard('admin')->attempt($credentials,$request->has('remember'))){
            return redirect()->intended(route('article.index'));
        } else {
            session()->flash('danger','很抱歉，您的用户名和密码不匹配');
            return redirect()->back();
        }

    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function destroy()
    {
        $this->guard()->logout();
        return redirect(route('admin.login'));
    }

}
