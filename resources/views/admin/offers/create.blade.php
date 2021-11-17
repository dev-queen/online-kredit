@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление оффера</h1>
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
                                <h3 class="card-title">Оффер</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.offer.store')}}" method="POST" enctype="multipart/form-data">
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
                                        <label>URL</label>
                                        <input type="text" class="form-control" name="url" value="">
                                    </div>
                                    @error('url')
                                    <div class="text-danger">Поле "URL" обязательно для заполнения</div>
                                    @enderror
                                    <div class="form-group">
                                        <label>Логотип</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="logo">
                                                <label class="custom-file-label">Выберите файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Текст плашки</label>
                                        <input type="text" class="form-control" name="dice_text" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Текст кнопки</label>
                                        <input type="text" class="form-control" name="text_button" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Возраст</label>
                                        <input type="text" class="form-control" name="age" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Сумма</label>
                                        <input type="text" class="form-control" name="sum" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Качество</label>
                                        <select class="form-control" name="quality">
                                            <option>Хороший</option>
                                            <option>Нормальный</option>
                                            <option>Плохой</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Сортировка</label>
                                        <input type="text" class="form-control" name="sort" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Витрина</label>
                                        <select name="id_showcase" class="form-control">
                                            @foreach($showCases as $showcase)
                                            <option value="{{$showcase->id}}" {{$showcase->id == old('id_showcase') ? 'selected' : ''}}>
                                                {{$showcase->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Рейтинг</label>
                                            <input type="text" class="form-control" name="rating">
                                            <p>Введите число от 0 до 5.</p>
                                        </div>
                                        @error('rating')
                                        <div class="text-danger">Рейтинг может быть только от 0 до 5 (дробную часть указывать через точку 4.7)</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="display">
                                            <label class="form-check-label">Активный</label>

                                        </div>
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