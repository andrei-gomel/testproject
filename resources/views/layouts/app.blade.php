<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="nds-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <!-- Script -->

    <script src="{{ asset('/js/app.js')}}" type="text/javascript"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

    <!-- Client Add Modal content-->
        <div id="addModal" class="modal fade bs-add-record-modal-sm" role="dialog">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="gridSystemModalLabel"><b>Новая запись</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hide" id="response"></div>
                            <form id="addRecordForm" action="{{ URL::to('/client') }}" method="post" name="addRecordForm">
                                @csrf
                              <div class="form-group">
                                <label for="labelEmail">Имя</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Имя" required>
                              </div>
                              <div class="form-group">
                                <label for="labelPhone">Фамилия</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Фамилия" required>
                              </div>
                              <div class="form-group">
                                <label for="labelText">Возраст</label>
                                <input type="text" class="form-control" name="age" id="age" placeholder="Возраст" required>
                              </div>
                              <div class="form-group">
                                <label for="labelText">Профессия</label>
                                <input type="text" class="form-control" name="profession" id="profession" placeholder="Профессия" required>
                              </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>

        <!-- Client Edit Modal content-->
            <div id="editModal" class="modal fade bs-edit-record" role="dialog">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title" id="gridSystemModalLabel"><b>Редактирование записи</b></h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hide" id="response"></div>
                            <form method="POST" action="/client/update" id="editRecordForm" name="editRecordForm">
                               @csrf
                                <input type="hidden" name="id" id="id">
                              <div class="form-group">
                                <label for="labelEmail">Имя</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Имя" required>
                              </div>
                              <div class="form-group">
                                <label for="labelPhone">Фамилия</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Фамилия" required>
                              </div>
                              <div class="form-group">
                                <label for="labelText">Возраст</label>
                                <input type="text" class="form-control" name="age" id="age" placeholder="Возраст" required>
                              </div>
                                <div class="form-group">
                                    <label for="labelText">Профессия</label>
                                    <input type="text" class="form-control" name="profession" id="profession" placeholder="Профессия" required>
                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>

                                </div>
                            </form>
                        </div>

                    </div>
                    </div>
                </div>
              </div>
            </div>

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script>
    // Добавление новой записи

    $('#addRecordForm').on('submit',function(event){
        event.preventDefault();
        var form_action = $("#addRecordForm").attr("action");
        $.ajax({
            data: $('#addRecordForm').serialize(),
            url: form_action,
            type: "POST",
            dataType: "json",
            success: function (response) {
                var client = '<tr>';
                client += '<td>' + response.data.id + '</td>';
                client += '<td>' + response.data.first_name + '</td>';
                client += '<td>' + response.data.last_name + '</td>';
                client += '<td>' + response.data.age + '</td>';
                client += '<td>' + response.data.profession + '</td>';
                client += '</tr>';
                $('#clients_table tbody').prepend(client);
                $('#addRecordForm')[0].reset();
                $('#addModal').modal('hide');
            },
        });
    });

    // Когда нажимаешь редактировать запись
    $('body').on('click', '.btnEdit', function () {
        var id = $(this).attr('data-id');
        $.get('/client/edit/' + id +'', function (data) {
            $('#editRecordForm').modal('show');
            $('#editRecordForm #id').val(data.id);
            $('#editRecordForm #first_name').val(data.first_name);
            $('#editRecordForm #last_name').val(data.last_name);
            $('#editRecordForm #age').val(data.age);
            $('#editRecordForm #profession').val(data.profession);
        });
    });

    // Редактирование записи

    $('#editRecordForm').on('submit',function(event){
        event.preventDefault();
        var form_action = $("#editRecordForm").attr("action");
            $.ajax({
                data: $('#editRecordForm').serialize(),
                url: form_action,
                type: "post",
                dataType: 'json',
                success: function (response) {
                    if(response.status == 200) {
                        var client = '<td>' + response.data.id + '</td>';
                        client += '<td>' + response.data.first_name + '</td>';
                        client += '<td>' + response.data.last_name + '</td>';
                        client += '<td>' + response.data.age + '</td>';
                        client += '<td>' + response.data.profession + '</td>';
                        client += '<td>';
                        client += '<a data-id="' + response.data.id + '" class="btn btn-primary btn-sm btnEdit" data-toggle="modal" data-target=".bs-edit-record-modal-sm">Редактировать</a>';
                        client += '&nbsp;';
                        client += '<a href="#" class="btn btn-danger btn-sm delete" data-id="' + response.data.id + '">Удалить</a>';
                        client += '</td>';
                        $('#clients_table tbody #' + response.data.id).html(client);
                        $('#editRecordForm')[0].reset()
                        $('#editModal').modal('hide')
                        location.reload()
                    }
                }
            });
    });

    // Удаление записи
        $(document).on('click', '.delete', function () {
        var id = $(this).attr('id');
            confirm("Вы действительно хотите удалить запись?");
        $.ajax({
            url:'/clients/destroy/{id}',
            method: 'get',
            data:{id:id},
            success:function (data) {
                $('#clients_table').DataTable().ajax.reload();
            },
        });
    });

</script>
</body>
</html>
