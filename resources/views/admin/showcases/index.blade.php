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
                        <h1 class="m-0">Витрины</h1>
                    </div>
                    <div class="col-2"><a href="{{route('admin.showcase.create')}}" class="btn btn-block btn-info">Добавить
                            витрину</a>
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
                        <form action="{{route('admin.showcase.massupdate')}}" method="POST"
                              enctype="multipart/form-data">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" role="tablist">
                                @if($showcases)
                                    @foreach($showcases as $showcase)
                                        <li style="display: inline-block"
                                            @if($showcase->id == $showcaseId)
                                            class="nav-item nav-link active"
                                            @else
                                            class="nav-item nav-link"
                                                @endif>
                                            <a href="{{route('admin.showcase.offersbyshowcases', $showcase->id) }}">

                                                {{$showcase->name}}</a>

                                            <a href="{{route ('admin.showcase.edit', $showcase->id)}}"><i
                                                        class="fas fa-pencil-alt"></i></a>

                                            <input type="checkbox" class="rambo" name="active[{{$showcase->id}}]"
                                                   @if ($showcase->active!=NULL)
                                                   checked
                                                    @endif>

                                            {{--                                            @if($showcase->id != 1)--}}
                                            {{--                                                <form action="{{route('admin.showcase.delete', $showcase->id)}}"  method="POST">--}}
                                            {{--                                                    @csrf--}}
                                            {{--                                                    @method('DELETE')--}}

                                            {{--                                                    <button type="submit" class="border-0 bg-transparent">--}}
                                            {{--                                                        <i class="far fa-trash-alt text-danger" role="button"></i>--}}
                                            {{--                                                    </button>--}}
                                            {{--                                                </form>--}}
                                            {{--                                            @endif--}}
                                        </li>
                                        @endforeach
                                        @endif
                                        </ul>
                            </div>

                            <div class="card-body table-responsive p-0" style="height: 500px;">

                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Сортировка</th>
                                        <th>Качество</th>
                                        <th>Привязка к витрине</th>
                                        <th>Цвет кнопки</th>
                                        <th>Цвет плашки</th>
                                        <th>Активность</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($offers as $offer)
                                        @csrf
                                        @method('PATCH')
                                        <tr>
                                            <td><input type="text" class="form-control" name="name[{{$offer->id}}]"
                                                       value="{{$offer->name}}"></td>
                                            @error('name[{{$offer->id}}]')
                                            <div class="text-danger">Поле "Название" обязательно для заполнения</div>
                                            @enderror
                                            <td><input type="text" class="form-control" name="sort[{{$offer->id}}]"
                                                       value="{{$offer->sort}}"></td>
                                            <td>
                                                <select class="form-control" name="quality[{{$offer->id}}]"
                                                        value="{{$offer->quality}}">
                                                    <option value="{{$offer->quality}}"> {{$offer->quality}}</option>
                                                    <option>Хороший</option>
                                                    <option>Нормальный</option>
                                                    <option>Плохой</option>
                                                </select>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <select name="id_showcase[{{$offer->id}}]" class="form-control">
                                                        @foreach($showcases as $showcase)
                                                            <option value="{{$showcase->id}}" {{$showcase->id == $offer->id_showcase?  'selected' : ''}}>
                                                                {{$showcase->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group field-offer-2298-color_for_button has-success">

                                                    <input type="color"
                                                           class="form-control" name="color[{{$offer->id}}]"
                                                           value="{{$offer->color}}">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group field-offer-2298-color_for_button has-success">

                                                    <input type="color"
                                                           class="form-control" name="colorfordice[{{$offer->id}}]"
                                                           value="{{$offer->color_for_dice}}">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="hidden" class="form-check-input"
                                                           name="display[{{$offer->id}}]"
                                                           id="display[{{$offer->id}}]" value="0">
                                                    <input type="checkbox" class="form-check-input"
                                                           name="display[{{$offer->id}}]"
                                                           id="display[{{$offer->id}}]" value="1"
                                                           @if ($offer->display!=NULL)
                                                           checked>
                                                    @endif


                                                    <label class="form-check-label">Активный</label>

                                                </div>
                                            </td>
                                            <td><a href="{{route ('admin.offer.edit', $offer->id)}}"><i
                                                            class="fas fa-edit"></i></a>
                                            
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>


                                </table>

                            </div>

                            <!-- /.card-body -->
                            <!-- /.card -->
                            <div class="card-footer">
                                <button type="submit" formaction="{{route('admin.showcase.massupdate')}}"
                                        formmethod="POST" class="btn btn-primary">Сохранить
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>

@endsection
