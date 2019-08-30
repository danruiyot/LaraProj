<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
use AuthenticatesUsers;
protected $guard = 'admin';
protected $redirectTo = '/admin/';
public function showLoginForm()
{
return view('admin.login');
}
protected function guard()
{
return Auth::guard($this->guard);
}
}