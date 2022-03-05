<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Redirect;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo ='/login';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

     /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
       // $user->ip = $request->ip();
       // $user->user_agent= $request->server('HTTP_USER_AGENT');
       // $user->update();
       
      //   return redirect($this->redirectTo);
      
    }

    protected function attemptLogin(Request $request)
    {
            
        $user = User::where('email', $request->email)
                            ->first();

        $password = User::where('email', $request->email)
                            ->where('password',$request->password)
                            ->first();

        if(!isset($user))
        {
            //return false;
            return Redirect::route('login')->withInput()->withErrors([  'email' => 'Can\'nt vote by this email. ']);
            //return redirect()->route('login')->with('create','Wrong Password.');//OKKK
          
        }
        else if(!isset($password)){
                
            return Redirect::route('login')->withInput()->withErrors(['password' => 'Password is incorrrect']);
        }
        else
        {
            $user->ip = $request->ip();
            $user->user_agent= $request->server('HTTP_USER_AGENT');
            $time = Carbon::now();
            $user->login_at=Carbon::parse($time)->format('Y-m-d H:i:s');
            $user->update();
        }
        
        return Auth::login($user);

    }
     

/*    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect('/login')
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ]);
    }
*/
   

}
