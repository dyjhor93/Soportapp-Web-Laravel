<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function wellcome()
    {
        return view('welcome');
    }
    public function api()
    {
        $hw = ['auth'=>'api autenticacion de los usuarios','client'=>'api clientes','os'=>'api ordenes de servicio'];
        return $hw;
    }
    
}
