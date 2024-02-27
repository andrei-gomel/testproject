<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\ClientUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ClientController
{
    public function index()
    {
        //$items = Client::take(25)->get();
        //$items = Client::take(25)->skip(25)->get();

        $client = new Client();

        $items = $client->showAll();

        return view('clients.index', compact('items'));
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $items = \DB::table('clients')->orderBy($sort_by, $sort_type)->paginate(20);
            return view('clients.index', compact('items'))->render();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function find(Request $request)
    {
        //dd(__METHOD__, $request->all());

        $last_name = $request->input('last_name');

        $val = $request->validate([
            'last_name' => ["string"],
        ]);

        $items = \DB::table('clients')->where('last_name', '=', $val)->orderBy('last_name')->paginate(20)->appends($request->query());

        return view('clients.index', compact('items', 'last_name'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id = (int)$id;

        $item = Client::find($id);

        //$item = \DB::table('clients')->where('id', '=', $id)->find($id, $columns = ['*']);

        if (empty($item)){
            abort(404);
        }
        return response()->json($item);
        //return view('clients.edit', compact('item'));
    }

    public function save(Request $request)
    {
        $client = new Client([
            'first_name' => $request->post('name'),
            'last_name' => $request->post('last_name'),
            'profession' => $request->post('profession'),
            'age' => $request->post('age'),
        ]);

        $client->save();

        return response()->json(['code'=>200, 'data' => $client], 200);

    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'   => 'required|min:4|max:50',
            'last_name'    => 'required|min:5|max:50',
            'age'          => 'required|numeric|min:12|max:72',
            'profession'   => 'required|min:5|max:100',
        ]);

        $data = $validator->getData();
        //dd($data);

        $item = Client::find($data['id']);

        if (empty($item))
        {
            return back()
                ->withErrors(['msg'=>"Запись id=[{$data['id']}] не найдена."])
                ->withInput();
        }

        $data = [
            'id' => $data['id'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'age' => $data['age'],
            'profession' => $data['profession']
        ];

        $result = $item->update($data);

        if ($result)
        {
            return response()->json(['status'=>200, 'data' => $data]);
        }
        else
        {
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения.'])
                ->withInput();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //dd(__METHOD__, $id);
        $result = Client::find($id)->forceDelete();

        if ($result) {
            return response()->json(['success'=>'Запись успешно удалена']);
        }
        else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
