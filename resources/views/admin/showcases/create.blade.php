@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление витрины</h1>
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
                                <h3 class="card-title">Витрина</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.showcase.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Название</label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                    @error('url')
                                    <div class="text-danger">Поле "Название" обязательно для заполнения</div>
                                    @enderror
                                    <div class="form-group">
                                        <label>Заголовок</label>
                                        <input type="text" class="form-control" name="header" value="">
                                    </div>

                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <div class="form-check">--}}
                                    {{--                                            <input type="checkbox" class="form-check-input" name="active">--}}
                                    {{--                                            <label class="form-check-label">Активный</label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    заккоментированно для того чтобы оставить возможность сделать витрину активной только из одного места--}}

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