<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;

use Auditoria\Http\Requests;
use Auditoria\Http\Controllers\Controller;
use Auditoria\Recibo;
use Session;
use Redirect;
use Auditoria\Http\Requests\ReciboRequest;

class EditReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recibos =Recibo::all();

        return view('edit.recibo.index',compact('recibos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edit.recibo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recibo= new Recibo ($request->all());

        $recibo->save();
        Session::flash('message','Recibo creado correctamente');
        return redirect::to('edit/recibo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recibo=Recibo::find($id);
        return view('edit.recibo.edit', compact('recibo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recibo=Recibo::find($id);

        $recibo->fill($request->all());

        $recibo->save();
        Session::flash('message','Recibo actualizado correctamente');
        return redirect::to('edit/recibo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}