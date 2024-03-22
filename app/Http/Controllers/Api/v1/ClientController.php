<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$clients = Client::all()) 
            return response()->json(['message' => 'Не удалось получить записи'], 500);

        return response()->json($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if(!$client = Client::create($data))
            return response()->json(['message' => 'Не удалось сохранить запись'], 500);

        return response()->json($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if(!$client = Client::find($id))       
            return response()->json(['message' => 'Запись не найдена'], 404);

        return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        $data = $request->all();

        if(!$client->update($data))
            return response()->json(['message' => 'Не удалось обновить запись'], 500);

        return response()->json($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        if(!$client = Client::find($id))
            return response()->json(['message' => 'Запись не найдена'], 404);

        if(!$client->delete())
            return response()->json(['message' => 'Не удалось удалить запись'], 500);

        return response()->json(['message' => 'Запись успешно удалена']);
    }
}
