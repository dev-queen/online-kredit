@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Клиент {{$client->id}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Редактировать информацию о клиенте</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route ('admin.client.update', $client->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Телефон</label>
                                    <input type="text" class="form-control" name="phone" value="{{$client->phone}}">
                                    @error('phone')
                                    <div class="text-danger">Это обязательное поле</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Фамилия</label>
                                    <input type="text" class="form-control" name="last_name" value="{{$client->last_name}}">
                                    @error('last_name')
                                    <div class="text-danger">Это обязательное поле</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Имя</label>
                                    <input type="text" class="form-control"  name="name" value="{{$client->name}}">
                                    @error('name')
                                    <div class="text-danger">Это обязательное поле</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Отчество</label>

                                    <input type="text" class="form-control"  name="middle_name" value="{{$client->middle_name}}">
                                    @error('middle_name')
                                    <div class="text-danger">Это обязательное поле</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection