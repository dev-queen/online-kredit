@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1 class="m-0">Офферы</h1>

                    </div>
                    <div class="col-2"><a href="{{route ('admin.offer.create')}}" class="btn btn-block btn-info">Добавить оффер</a>
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
                        <div class="card">
                            <div class="showcases">
                                <ul class="nav nav-tabs" role="tablist">
                                    @if($showcases)
                                        @foreach($showcases as $showcase)
                                            <li class="nav-item">
                                                <a href="{{route('admin.offer.offersbyshowcases', $showcase->id) }}"
                                                   @if($showcase->id ==$showcaseId  )
                                                   class="nav-link active"
                                                   @else
                                                   class="nav-link"
                                                        @endif>
                                                    {{$showcase->name}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                            </div>
                            <div class="card-body table-responsive p-0" style="height: 500px;">
                                <form enctype="multipart/form-data" action="{{route('admin.offer.massupdate')}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Название</th>
                                            <th>Позиция</th>
                                            <th>Лого</th>
                                            <th>Ссылка</th>
                                            <th>Привязка к витрине</th>
                                            <th>Активность</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($offers as $offer)

                                            <tr>
                                                <td><input type="text" class="form-control" name="name[{{$offer->id}}]"
                                                           value="{{$offer->name}}"></td>
                                                @error('name[{{$offer->id}}]')
                                                <div class="text-danger">Поле "Название" обязательно для заполнения</div>
                                                @enderror
                                                <td><input type="text" class="form-control" name="sort[{{$offer->id}}]"
                                                           value="{{$offer->sort}}"></td>
                                                <td>
                                                    @if (isset ($offer->logo))
                                                        <img src="{{ url('storage/' . $offer->logo) }}" alt="logo"
                                                             style="width: 40px">

                                                    @endif
                                                </td>
                                                <td><input type="text" class="form-control" name="url[{{$offer->id}}]"
                                                           value="{{$offer->url}}"></td>
                                                @error('url[{{$offer->id}}]')
                                                <div class="text-danger">Поле "Название" обязательно для заполнения</div>
                                                @enderror

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
                                                <td>
                                                    <a href="{{route ('admin.offer.edit', $offer->id)}}"><i class="fas fa-edit"></i></a>
                                                </td>
{{--                                                <td>--}}
{{--                                                    <button type="submit" action="{{route('admin.offer.delete', $offer->id)}}" name="_method" value="DELETE" id="delete-task">Delete</button>--}}
{{--                                                    <a href="{{route('admin.offer.delete', $offer->id)}}"  type="submit" value="Save()"/> del</a>--}}

{{--                                                    <form action="{{route('admin.offer.delete', $offer->id)}}" method="POST">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('DELETE')--}}
{{--                                                        <button type="submit" class="border-0 bg-transparent">--}}
{{--                                                            <i class="fas fa-trash-alt text-danger" role="button"></i>--}}
{{--                                                        </button>--}}

{{--                                                    </form>--}}
{{--                                                </td>--}}
                                            </tr>
                                        @endforeach

                                        </tbody>


                                    </table>
                            </div>
                                    <div class="card-footer">
                                        <button type="submit"  class="btn btn-primary">Сохранить</button>

{{--                                        <input formaction="{{route('admin.offer.massupdate')}}" formmethod="POST" type="submit" value="Сохранить" />--}}

{{--                                        <button formaction="{{route('admin.offer.massupdate')}}" type="submit" name=_method" value="PATCH" id="save-task">Save</button>--}}



                                    </div>
                                    </form>


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection