<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:vendor')->except('logout');
    }


    /** START ADMIN LOGIN */
    public function showAdminLoginForm()
    {
        //dd('');
        return view('auth.admin.admin-login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        //dd('asd');
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6',
            'is_active' => '1'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }


        return back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => __('auth.failed'),
        ]);
    }
    /** END ADMIN LOGIN */


    /** START VENDOR LOGIN */
    public function showVendorLoginForm()
    {
        return view('auth.vendor.vendor-login', ['url' => 'vendor']);
    }

    public function vendorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6',
            'status' => '1'
        ]);

        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/vendor');
        }
            return back()->withInput($request->only('email', 'remember'))->withErrors([
                'email' => __('auth.failed'),
            ]);
    }
    /** END VENDOR LOGIN */

    public function logout( Request $request )
    {
        if(Auth::guard('admin')->check()) // this means that the admin was logged in.
        {
            Auth::guard('admin')->logout();
            return redirect()->route('admin-login');
        }

        if(Auth::guard('vendor')->check()) // this means that the admin was logged in.
        {
            Auth::guard('vendor')->logout();
            return redirect()->route('vendor-login');
        }
        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }


}
