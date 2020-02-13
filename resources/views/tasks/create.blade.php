@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание нового события</div>

                    <div class="card-body">
                        <form action="{{route('tasks.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-right">Название</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time" class="col-md-2 col-form-label text-md-right">Время</label>
                                <div class="col-md-6">
                                    <input id="time" type="text" class="form-control" name="time" required autofocus>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
