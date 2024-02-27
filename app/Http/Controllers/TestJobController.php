<?php


namespace App\Http\Controllers;

use App\Models\Parametr;


class TestJobController
{
    public function index()
    {
        //$items = Client::take(25)->get();
        //$items = Client::take(25)->skip(25)->get();

        //$items = \DB::table('parametrs')->orderBy('id')->paginate(20);
        //$items = \DB::table('parametrs')->orderBy('id')->paginate(100000);

        $param = new Parametr;
        $items = $param->showAll();

        return view('parametrs.index', compact('items'));
    }
}
