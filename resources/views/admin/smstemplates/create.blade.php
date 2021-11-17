@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создание шаблона SMS</h1>
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
                                <h3 class="card-title">Шаблон</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.sms-template.store')}}" method="POST"
                                  enctype="multipart/form-data" id="user-form">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Название шаблона</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    @error('name')
                                    <div class="text-danger">Поле "Название" обязательно для заполнения</div>
                                    @enderror
                                    <div class="form-group">
                                        <label>Текст сообщения</label>
                                        <p> Для добавления ссылки, вставьте {LINK} в текст.</p>
                                        <input type="text" class="form-control" name="template" value="">
                                    </div>
                                    @error('template')
                                    <div class="text-danger">Поле "Текст" обязательно для заполнения</div>
                                    @enderror
                                    <div class="form-group">
                                    <label>Ссылки (если есть {link} в сообщении)</label>

                                    <input type="text" class="form-control col-4" name="links" placeholder="http://example.com">
</div>
{{--                                    <a class="btn btn-warning template_sms">Добавить ссылку</a>--}}
{{--                                    <div class="alert-links-container lend_link links">--}}
{{--                                        <ul id="sortable1" class="connectedSortables ui-helper-reset">--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


                                    <div class="form-group">
                                        <label>Буквенные имена</label>
                                        <select name="letter_name" class="form-control">
                                            @foreach($LetterNames as $LetterName)
                                                <option value="{{$LetterName->name}}" {{$LetterName->name == old('id_showcase') ? 'selected' : ''}}>
                                                    {{$LetterName->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <hr>
                                    <h3>Задержки по времени</h3>

                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control col-1 mx-2" name="delay_time">
                                        <p> Время задержки с момента совершения события (в минутах)</p>
                                    </div>
                                    <label>Временной диапазон</label>
                                    <div class="form-group d-flex">
                                        <label class="pr-2">С</label>
                                        <input type="text" class="form-control col-1" name="time_from" placeholder="00:00">
                                        <label class="px-2">По </label>
                                        <input type="text" class="form-control col-1" name="time_to" placeholder="23:59">
                                    </div>

                                    @error('time_from')
                                    <div class="text-danger">Поле "C" необходимо заполнить в формате ЧЧ:ММ</div>
                                    @enderror
                                    @error('time_to')
                                    <div class="text-danger">Поле "По" необходимо заполнить в формате ЧЧ:ММ</div>
                                    @enderror

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="check_time_zone">
                                            <label class="form-check-label">Учитывать часовой пояс абонента</label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Событиe пользователя</label>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="event_type">
                                            <label class="form-check-label">Регистрация</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Активновсть шаблона</label>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="active">
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