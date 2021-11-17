@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1 class="m-0">Редактирование витрины {{$showcase->name}}</h1>
                    </div><!-- /.col -->
                    <div class="col-2">
                        @if($showcase->id != 1)
                            <a href="#myModal" class="btn btn-danger" data-toggle="modal">Удалить витрину</a>
                        @endif

                    </div>
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
                            <form action="{{route ('admin.showcase.update', $showcase->id)}}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Название</label>
                                        <input type="text" class="form-control" name="name" value="{{$showcase->name}}">
                                    </div>
                                    @error('name')
                                    <div class="text-danger">Поле "Название" обязательно для заполнения</div>
                                    @enderror
                                    <div class="form-group">
                                        <label>Заголовок</label>
                                        <input type="text" class="form-control" name="header"
                                               value="{{$showcase->header}}">
                                    </div>
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <div class="form-check">--}}
                                    {{--                                            <input type="checkbox" class="form-check-input" name="active"--}}
                                    {{--                                                   @if ($showcase->active!=null)--}}
                                    {{--                                                   checked>--}}
                                    {{--                                            @endif--}}
                                    {{--                                            <label class="form-check-label">Активный</label>--}}

                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
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
    <div id="myModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Подтверждение</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <p>Вы точно хоите удалить витрину?</p>
                    <p class="text-secondary"><small>При удалении витрины все офферы, находящиеся в ней, будут
                            удалены</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    @if($showcase->id != 1)
                        <form action="{{route('admin.showcase.delete', $showcase->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Удалить витрину
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- /.content-wrapper -->
@endsection