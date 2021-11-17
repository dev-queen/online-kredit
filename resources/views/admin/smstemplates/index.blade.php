@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1 class="m-0">Шаблоны СМС</h1>
                    </div>
                    <div class="col-2"><a href="{{route('admin.sms-template.create')}}" class="btn btn-block btn-info">Добавить шаблон</a>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body table-responsive p-0" style="height: 700px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Название</th>
                                    <th>Текст сообщения</th>
                                    <th>Задержка</th>
                                    <th>Буквенное имя</th>
                                    <th>Активно</th>
                                    <th colspan="2">Действия</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sms_templates as $sms_template)
                                    <tr>
                                        <td>{{$sms_template->id}}</td>
                                        <td>{{$sms_template->name}}</td>
                                        <td>{{$sms_template->template}}</td>
                                        <td>{{$sms_template->delay_time}}</td>
                                        <td>{{$sms_template->letter_name}}</td>
                                        <td>{{$sms_template->active}}</td>

                                        <td><a href="{{route('admin.sms-template.edit', $sms_template->id)}}"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.sms-template.delete', $sms_template->id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash-alt text-danger" role="button"></i>
                                                </button>

                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
            {{$sms_templates->links()}}
        </section>

        <!-- /.content -->
    </div>

@endsection
