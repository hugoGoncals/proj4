<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\User;


class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        if($id == null){
            return Provider::orderBy('id','asc')->get();
        }else{
            return $this->show($id); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $provider = new Provider;
       $provider->name = $request->input('name');
       $provider->iban = $request->input('iban');
       $provider->password = bcrypt($request->input('password'));
       $provider->email = $request->input('email');
       $provider->save();

       return User::create([
       'name' => $request->input('name'),
       'email' => $request->input('email'),
       'password' => bcrypt($request->input('password')),
       'typeuser' => '2', ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return Provider::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $provider = Provider::find($id);
        $provider->name = $request->input('name');
        $provider->iban = $request->input('iban');
        $provider->email = $request->input('email');
        $provider->password = '123456';
        $provider->save();
        return 'Provider record updated' .$provider->id;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id)->delete();
        //return 'Provider record deleted' .$provider->id;
    }
}
