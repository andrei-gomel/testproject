<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametr extends Model
{
    public function showAll()
    {
        return \DB::table('parametrs')->orderBy('id')->paginate(1000);
    }
}
