<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function index(Request $request)
    {
        return 'Hola';
    }
}
