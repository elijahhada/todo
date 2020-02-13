@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание нового события</div>

                    <div class="card-body">
                        <form action="{{route('tasks.update', $task->id)}}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-right">Название</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{$task->title}}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time" class="col-md-2 col-form-label text-md-right">Время</label>
                                <div class="col-md-6">
                                    <input id="time" type="text" class="form-control" name="time" value="{{$task->time}}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="completed" class="col-md-2 col-form-label text-md-right">Готовность</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="completed" name="completed">
                                        <option value="1" @if($task->completed){{'selected'}}@endif>Готово</option>
                                        <option value="0" @if(!$task->completed){{'selected'}}@endif>Не готово</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
