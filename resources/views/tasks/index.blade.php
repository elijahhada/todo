@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">События
                        <a href="{{route('tasks.create')}}"><button type="button" class="btn btn-success ml-5">Добавить</button></a>
                    </div>

                    <div class="card-body">
                        @if(count($tasks) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Время</th>
                                    <th scope="col">Выполнено</th>
                                    <th scope="col">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $key => $task)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$task->title}}</td>
                                        <td>{{$task->time}}</td>
                                        <td>@if($task->completed)<span class="text-success">Выполнено</span>@else<span class="text-danger">Не выполнено</span>@endif</td>
                                        <td>
                                            <a href="{{route('tasks.edit', $task->id)}}"><button type="button" class="btn btn-primary float-left">Изменить</button></a>
                                            <form action="{{route('tasks.destroy', $task->id)}}" method="POST" class="float-left">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4>Еще нет ни одного события</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
