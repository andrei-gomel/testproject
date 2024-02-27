<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'profession',
        'age',
    ];

    public function showAll()
    {
        return \DB::table('clients')->orderBy('id', 'desc')->paginate(20);
    }
}
