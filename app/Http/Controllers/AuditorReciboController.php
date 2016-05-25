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
use DB;
use Carbon\Carbon;

class AuditorReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recibos =Recibo::all();
        //Log::info('El usuario: '.$request->user()->name.'  Con ID: '.$request->user()->id.' con email: '.$request->user()->email.' visualisa todos los recibos ');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,'role'=> $request->user()->role,'accion'=> 'CONSULTA','descripcion'=> 'VISUALIZO EL LISTADO DE RECIBOS','date_time'=>$date = Carbon::now()]

            );
        return view('auditor.recibo.index',compact('recibos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auditor.recibo.create');
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
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,
                    'role'=> $request->user()->role,
                    'accion'=> 'CREACION',
                    'descripcion'=> 'RECIBO: '.
                        ' | CODIGO: '.$recibo->cod.
                        ' | FACTURA: '.$recibo->fac.
                        ' | VALOR: '.$recibo->val.
                        ' | DESCRIPCION: '. $recibo->desc. ' )',
                    'date_time'=>$date = Carbon::now()]
            );
        $recibo->save();
        Session::flash('message','Recibo creado correctamente');

        return redirect::to('auditor/recibo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.' va a editar '.'( '.$recibo->name.' | '.$recibo->email.' | '.$recibo->role.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,
                    'role'=> $request->user()->role,
                    'accion'=> 'EDICION',
                    'descripcion'=> 'RECIBO: '.
                        ' | CODIGO: '.$recibo->cod.
                        ' | FACTURA: '.$recibo->fac.
                        ' | VALOR: '.$recibo->val.
                        ' | DESCRIPCION: '. $recibo->desc. ' )',
                    'date_time'=>$date = Carbon::now()]
            );
        return view('auditor.recibo.edit', compact('recibo'));
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
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.'  fue editado '.'( '.$recibo->name.' | '.$recibo->email.' | '.$recibo->role.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,
                    'role'=> $request->user()->role,
                    'accion'=> 'ACTUALIZACION',
                    'descripcion'=> 'RECIBO: '.
                        ' | CODIGO: '.$recibo->cod.
                        ' | FACTURA: '.$recibo->fac.
                        ' | VALOR: '.$recibo->val.
                        ' | DESCRIPCION: '. $recibo->desc. ' )',
                    'date_time'=>$date = Carbon::now()]
            );
        Session::flash('message','Recibo actualizado correctamente');
        return redirect::to('auditor/recibo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $recibo=Recibo::find($id);
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.'  Elimino a: '.'( '.$user->name.' | '.$user->email.' | '.$user->role.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,
                    'role'=> $request->user()->role,
                    'accion'=> 'ELIMINACION',
                    'descripcion'=> 'RECIBO: '.
                        ' | CODIGO: '.$recibo->cod.
                        ' | FACTURA: '.$recibo->fac.
                        ' | VALOR: '.$recibo->val.
                        ' | DESCRIPCION: '. $recibo->desc. ' )',
                    'date_time'=>$date = Carbon::now()]
            );
        $recibo->delete();
        Session::flash('message','Recibo eliminado correctamente');
        return redirect::to('auditor/recibo');
    }
}
