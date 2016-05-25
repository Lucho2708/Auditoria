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

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recibos =Recibo::all();
        //Log::info('El usuario: '.$request->user()->name.'  Con ID: '.$request->user()->id.' con email: '.$request->user()->email.' visualisa todos los usuarios ');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,'role'=> $request->user()->role,'email'=> $request->user()->email,'accion'=> 'CONSULTA','descripcion'=> 'VISUALIZO EL LISTADO DE RECIBOS','date_time'=>$date = Carbon::now()]

            );
        return view('admin.recibo.index',compact('recibos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recibo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReciboRequest $request)
    {

        $recibo= new Recibo ($request->all());

        //dd($request->all());
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.' creo un nuevo usuario '.'( ID: '.$user->id.' | NOMBRE: '.$user->name.' | EMAIL: '.$user->email.' | TIPO: '.$user->role.' | FECHA CREACION: '.$user->created_at.' | FECHA ULTIMA SESION: '.$user->updated_at.' )');
        $recibo->save();
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,
                    'email'=> $request->user()->email,
                    'role'=> $request->user()->role,
                    'accion'=> 'CREACION',
                    'descripcion'=> 'RECIBO: '.
                        ' | CODIGO: '.$recibo->cod.
                        ' | FACTURA: '.$recibo->fac.
                        ' | VALOR: '.$recibo->val.
                        ' | DESCRIPCION: '. $recibo->desc. ' )',
                    'date_time'=>$date = Carbon::now()]
            );
        Session::flash('message','Recibo creado correctamente');
        return redirect::to('admin/recibo');
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
    public function edit(Request $request, $id)
    {
        $recibo=Recibo::find($id);
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.' va a editar '.'( '.$user->name.' | '.$user->email.' | '.$user->role.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,
                    'email'=> $request->user()->email,
                    'role'=> $request->user()->role,
                    'accion'=> 'EDICION',
                    'descripcion'=> 'RECIBO: '.
                        ' | CODIGO: '.$recibo->cod.
                        ' | FACTURA: '.$recibo->fac.
                        ' | VALOR: '.$recibo->val.
                        ' | DESCRIPCION: '. $recibo->desc. ' )',
                    'date_time'=>$date = Carbon::now()]
            );
        return view('admin.recibo.edit', compact('recibo'));
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
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.'  fue editado '.'( '.$user->name.' | '.$user->email.' | '.$user->role.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,
                    'email'=> $request->user()->email,
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
        return redirect::to('admin/recibo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)

    {

        $recibo=Recibo::find($id);
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.'  Elimino a: '.'( '.$user->name.' | '.$user->email.' | '.$user->role.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,
                    'email'=> $request->user()->email,
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
        return redirect::to('admin/recibo');
    }
}
