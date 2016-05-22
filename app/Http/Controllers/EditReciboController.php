<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;

use Auditoria\Http\Requests;
use Auditoria\Http\Controllers\Controller;
use Auditoria\Recibo;
use Session;
use Redirect;
use Auditoria\Http\Requests\ReciboRequest;
use Log;
class EditReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recibos =Recibo::all();
        Log::info('El usuario: '.$request->user()->name.'  Con ID: '.$request->user()->id.' con email: '.$request->user()->email.' visualisa todos los usuarios ');
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
        Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.' creo un nuevo usuario '.'( ID: '.$user->id.' | NOMBRE: '.$user->name.' | EMAIL: '.$user->email.' | TIPO: '.$user->role.' | FECHA CREACION: '.$user->created_at.' | FECHA ULTIMA SESION: '.$user->updated_at.' )');
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
    public function edit(Request $request,$id)
    {
        $recibo=Recibo::find($id);
        Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.' va a editar '.'( '.$user->name.' | '.$user->email.' | '.$user->role.' )');
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
        Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.'  fue editado '.'( '.$user->name.' | '.$user->email.' | '.$user->role.' )');
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
