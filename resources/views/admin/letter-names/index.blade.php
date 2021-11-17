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
                        <h1 class="m-0">Буквенные имена</h1>
                    </div>
                    <div class="col-2"><a href="{{route('admin.letter-name.create')}}"
                                          class="btn btn-block btn-info">Добавить имя</a>
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
                    <div class="col-3">
                        <div class="card-body table-responsive p-0" style="height: 500px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Активность</th>
                                    <th colspan="2">Действия</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($letter_names as $letter_name)
                                    <tr>
                                        <td>{{$letter_name->name}}</td>
                                        <td>{{$letter_name->active}}</td>
                                        <td><a href="{{route('admin.letter-name.edit', $letter_name->id)}}"><i
                                                        class="fas fa-edit"></i></a>
                                        </td>
                                    <td>
                                            <form action="{{route('admin.letter-name.delete', $letter_name->id)}}"
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
        </section>

        <!-- /.content -->
    </div>

@endsection
