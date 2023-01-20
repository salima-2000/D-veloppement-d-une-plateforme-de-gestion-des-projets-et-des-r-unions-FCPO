<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class resetController extends Controller
{

use ResetsPasswords;

/** * Where to redirect users after password reset. * * @var string */
protected $redirectTo = 'login';

/** * Create a new password controller instance. * * @return void */
public function __construct()
{
$this->middleware('guest');
}
}
