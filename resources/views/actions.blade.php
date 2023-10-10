@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">فعالیت ها</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-hover table-inverse">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>عملیات</th>
                                        <th>فیلد</th>
                                        <th>نام</th>
                                        <th>زمان</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($actions as $action)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$action->name}}</td>
                                            <td>
                                                {{$action->field()['key']}}
                                            </td><td>
                                                {{$action->field()['value']->name}}
                                            </td>
                                            <td>{{$action->created_at->diffForHumans()}}</td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
