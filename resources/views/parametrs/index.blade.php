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
                                <th>Фамилия</th>
                                <th>Цвет глаз</th>
                                <th>Профессия</th>
                                <th>Телефон</th>
                                <th>Страна</th>
                                <th>Улица</th>
                                <th>Возраст</th>
                                <th>Вес</th>
                                <th>Рост</th>
                                <th>Размер</th>
                                <th>Номер</th>
                                <th>val1</th>
                                <th>val2</th>
                                <th>val3</th>
                                <th>val4</th>
                                <th>val5</th>
                                <th>Создано</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->eye_color }}</td>
                                    <td>{{ $item->profession }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->country }}</td>
                                    <td>{{ $item->street }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->ves }}</td>
                                    <td>{{ $item->rost }}</td>
                                    <td>{{ $item->razmer }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>{{ $item->val1 }}</td>
                                    <td>{{ $item->val2 }}</td>
                                    <td>{{ $item->val3 }}</td>
                                    <td>{{ $item->val4 }}</td>
                                    <td>{{ $item->val5 }}</td>
                                    <td>{{ $item->created_at }}</td>
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

