@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Клиенты</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 500px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Телефон</th>
                                    <th>ФИО</th>
                                    <th>Дата регистрации</th>
                                    <th>Дата обновления</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->phone}}</td>
                                        <td><a href="{{route('admin.client.edit', $client->id)}}">{{$client->name}} {{$client->last_name}} {{$client->middle_name}}</a></td>
                                        <td>{{$client->created_at}}</td>
                                        <td>{{$client->updated_at}}</td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>

                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </div><!-- /.container-fluid -->
        {{$clients->links()}}
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection