@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                @if(session('success'))
                    <div class="row justify-content">
                        <div class="col-md-11">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                {{ session()->get('success')}}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                    <form method="get" action="{{ route('find') }}">
                            @csrf
                            Поиск по фамилии:
                            <input type="text" id="last_name" name="last_name"
                                   value="@if(isset($last_name)){{$last_name}}@endif">
                            <button type="submit" class="btn btn-primary">Найти</button>
                        </form>
                        <br>
                        <table class="table table-striped" id="clients_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Возраст</th>
                                @auth('web')
                                <th colspan="2">Действия</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->age }}</td>
                                    @auth('web')
                                    <td><a href="{{ route('edit', $item->id) }}" class="btn btn-primary btn-sm">Редактировать</a></td>
                                    <td><a href="{{ route('destroy', $item->id) }}" class="btn btn-danger btn-sm delete" id="{{ $item->id }}">Удалить</a></td>
                                    @endauth
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($items->total() > $items->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

