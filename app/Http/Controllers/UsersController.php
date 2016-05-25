<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;

use Auditoria\Http\Requests;
use Auditoria\Http\Controllers\Controller;
use Auditoria\User;
use Session;
use Redirect;
use Auditoria\Http\Requests\UserRequest;
use Log;
use DB;
use Carbon\Carbon;





class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users =User::where('email','!=',($request->user()->email))->get();
            
            
            //Log::info('El usuar;io: '.$request->user()->name.'  Con ID: '.$request->user()->id.' con email: '.$request->user()->email.' visualisa todos los usuarios ');
            DB::table('logs')
                ->insert(
                    [ 'usuario'=> $request->user()->name,'role'=> $request->user()->role,'accion'=> 'CONSULTA','descripcion'=> 'VISUALIZO EL LISTADO DE USUARIOS','date_time'=>$date = Carbon::now()]

                );
            return view('admin.index',compact('users'));

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request )
    {

        $user = new User ($request->all());
        $user -> password=bcrypt($request->password);
        $user ->role=($request->role);
        $user->save();
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.' creo un nuevo usuario '.'( ID: '.$user->id.' | NOMBRE: '.$user->name.' | EMAIL: '.$user->email.' | TIPO: '.$user->role.' | FECHA CREACION: '.$user->created_at.' | FECHA ULTIMA SESION: '.$user->updated_at.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,'role'=> $request->user()->role,'accion'=> 'CREACION','descripcion'=> 'USUARIO: '.'( ID: '.$user->id.' | NOMBRE: '.$user->name.' | EMAIL: '.$user->email.' | TIPO: '.$user->role.' | FECHA CREACION: '.$user->created_at.' | FECHA ULTIMA SESION: '.$user->updated_at.' )','date_time'=>$date = Carbon::now()]

            );
        Session::flash('message','Usuario creado correctamente');
        return redirect::to('admin/users');
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
    public function edit( Request $request , $id)
    {

        //dd($request->user()->name);
        $user=User::find($id);
        //dd($user->name);
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.' va a editar '.'( '.$user->name.' | '.$user->email.' | '.$user->role.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,'role'=> $request->user()->role,'accion'=> 'EDICION','descripcion'=> 'USUARIO: '.'( ID: '.$user->id.' | NOMBRE: '.$user->name.' | EMAIL: '.$user->email.' | TIPO: '.$user->role.' | FECHA CREACION: '.$user->created_at.' | FECHA ULTIMA SESION: '.$user->updated_at.' )','date_time'=>$date = Carbon::now()]

            );
        return view('admin.edit', compact('user'));
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
        $user=User::find($id);
        $user->fill($request->all());
        $user -> password=bcrypt($request->password);
        $user->role=($request->role);
        $user->save();
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.'  fue editado '.'( '.$user->name.' | '.$user->email.' | '.$user->role.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,'role'=> $request->user()->role,'accion'=> 'ACTULIZACION','descripcion'=> 'USUARIO: '.'( ID: '.$user->id.' | NOMBRE: '.$user->name.' | EMAIL: '.$user->email.' | TIPO: '.$user->role.' | FECHA CREACION: '.$user->created_at.' | FECHA ULTIMA SESION: '.$user->updated_at.' )','date_time'=>$date = Carbon::now()]

            );
        Session::flash('message','Usuario actualizado correctamente');
        return redirect::to('admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,$id)
    {
        $user=User::find($id);
        //Log::info('El Usuario: '. $request->user()->name.' con email: '.$request->user()->email.'  Elimino a: '.'( '.$user->name.' | '.$user->email.' | '.$user->role.' )');
        DB::table('logs')
            ->insert(
                [ 'usuario'=> $request->user()->name,'role'=> $request->user()->role,'accion'=> 'ELIMINACION','descripcion'=> 'USUARIO: '.'( ID: '.$user->id.' | NOMBRE: '.$user->name.' | EMAIL: '.$user->email.' | TIPO: '.$user->role.' | FECHA CREACION: '.$user->created_at.' | FECHA ULTIMA SESION: '.$user->updated_at.' )','date_time'=>$date = Carbon::now()]

            );
        $user->delete();
        Session::flash('message','Usuario eliminado correctamente');
        return redirect::to('admin/users');
    }


}
