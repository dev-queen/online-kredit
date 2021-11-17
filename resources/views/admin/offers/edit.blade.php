@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-10">
                        <h1 class="m-0">Редактирование оффера {{$offer->name}}</h1>
                    </div>
                    <div class="col-2">
                        <a href="#myModal" class="btn btn-danger" data-toggle="modal">Удалить оффер</a>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Оффер</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.offer.update', $offer->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Название</label>
                                        <input type="text" class="form-control" name="name" value="{{$offer->name}}">
                                    </div>
                                    @error('name')
                                    <div class="text-danger">Поле "Название" обязательно для заполнения</div>
                                    @enderror
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" class="form-control" name="url" value="{{$offer->url}}">
                                    </div>
                                    @error('url')
                                    <div class="text-danger">Поле "URL" обязательно для заполнения</div>
                                    @enderror
                                    <div class="form-group">
                                        <label>Логотип</label>
                                        <img src="{{ url('storage/' . $offer->logo)}}" alt="logo" style="width: 40px">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="logo"
                                                       value="{{$offer->logo}}">
                                                <label class="custom-file-label">Выберите файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Текст плашки</label>
                                        <input type="text" class="form-control" name="dice_text"
                                               value="{{$offer->dice_text}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Текст кнопки</label>
                                        <input type="text" class="form-control" name="text_button"
                                               value="{{$offer->text_button}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Возраст</label>
                                        <input type="text" class="form-control" name="age" value="{{$offer->age}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Сумма</label>
                                        <input type="text" class="form-control" name="sum" value="{{$offer->sum}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Качество</label>
                                        <select class="form-control" name="quality">
                                            <option value="{{$offer->quality}}"> {{$offer->quality}}</option>
                                            <option>Хороший</option>
                                            <option>Нормальный</option>
                                            <option>Плохой</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Сортировка</label>
                                        <input type="text" class="form-control" name="sort" value="{{$offer->sort}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Витрина</label>
                                        <select name="id_showcase" class="form-control">
                                            @foreach($showCases as $showcase)
                                                <option value="{{$showcase->id}}" {{$showcase->id == $offer->id_showcase?  'selected' : ''}}>
                                                    {{$showcase->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Рейтинг</label>
                                            <input type="text" class="form-control" name="rating"
                                                   value="{{$offer->rating}}">
                                            <p>Введите число от 0 до 5.</p>
                                        </div>
                                        @error('rating')
                                        <div class="text-danger">Рейтинг может быть только от 0 до 5 (дробную часть указывать через точку 4.7)</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="display"
                                                   @if ($offer->display!=null)
                                                   checked>
                                            @endif
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
        <div id="myModal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подтверждение</h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <p>Вы точно хотите удалить оффер?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        @if($showcase->id != 1)
                            <form action="{{route('admin.offer.delete', $offer->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Удалить оффер
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