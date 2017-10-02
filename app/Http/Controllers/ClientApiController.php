<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = \DB::table('clients');

        if (request()->has('q')) {
            $query
                ->where('name', 'like', '%' . request('q') . '%')
                ->orWhere('nickname', 'like', '%' . request('q') . '%');
        }

        if (request()->has('sort')) {
            $sortParam = explode('|', request('sort'));

            $query
                ->orderBy($sortParam[0], $sortParam[1]);
        }

        return $query->paginate(request()->has('paginate') ? request('paginate') : 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Client::create(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Client::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $client = Client::find($id);

        $client->update(request()->all());

        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Client::destroy($id);
    }
}
