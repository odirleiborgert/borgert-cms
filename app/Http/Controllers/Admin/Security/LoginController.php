<?php

namespace App\Http\Controllers\Admin\Security;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class LoginController extends Controller
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        return view('admin.security.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        /*if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('admin.index');
        }*/

        $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('username')]);

        if ($this->auth->attempt($request->only($field, 'password'))) {
            return redirect()->route("admin.index");
        }

        \Session::flash('error', 'Usuário ou senha inválidos!');

        return redirect()->route('login');
    }
}
