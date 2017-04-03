<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('dosen', ['except'=> 'getLogin']);
	}

    public function getLogin()
    {
        return view('dosen.auth.login');
    }

    public function getHome()
    {
        return view('dosen.home');
    }
}
