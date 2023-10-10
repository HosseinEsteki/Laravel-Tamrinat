@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">کاربران</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-hover table-inverse">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام کاربر</th>
                                        <th>ایمیل</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td><a href="#" class="text-decoration-none">{{$user->email}}</a>
                                            </td>
                                            <td>
                                                <a class="btn rounded btn-outline-info"
                                                   href="{{route('users.show',['user'=>$user->name])}}"><i
                                                        class="fa-solid fa-square-info"></i></a>
                                            </td>
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
