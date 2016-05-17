<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;

use Auditoria\Http\Requests;
use Auditoria\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('n0.panel');
    }
    public function crearr()
    {
        return view('n0.crearr');
    }

}
