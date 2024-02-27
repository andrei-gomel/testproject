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
                    <div class="card-body col-md-12">

                            <form method="get" action="{{ route('find') }}">
                            @csrf
                            Поиск по фамилии:
                            <input type="text" id="last_name" name="last_name"
                                   value="@if(isset($last_name)){{$last_name}}@endif">
                            <button type="submit" class="btn btn-primary">Найти</button>
                            </form>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bs-add-record-modal-sm">Создать запись</button>
                    </div>

                        <br>
                        @if($items)
                        <table class="table table-striped table-hover" id="clients_table">
                            <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Возраст</th>
                                <th>Профессия</th>
                                @auth('web')
                                <th>Действия</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr id="{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->profession }}</td>
                                    @auth('web')
                                    <td>
                                    <!--<button type="button" class="btn btn-primary btn-sm btnEdit" data-toggle="modal" data-target=".bs-edit-record-modal-sm" data-id="{{ $item->id }}">
                                        Редактировать
                                        </button>-->
                                    <a data-id="{{ $item->id }}" class="btn btn-primary btn-sm btnEdit" data-toggle="modal" data-target=".bs-edit-record">Редактировать</a>
                                    <!-- <button data-id="{{ $item->id }}" type="button" class="btn btn-primary btn-sm btnEdit" data-toggle="modal" data-target=".bs-edit-record">Редактировать</button>-->

                                        <a href="{{ route('destroy', $item->id) }}" class="btn btn-danger btn-sm delete" data-id="{{ $item->id }}">Удалить</a></td>
                                    @endauth
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    @else
                    <h3>Записи не найдены</h3>
                    @endif
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

