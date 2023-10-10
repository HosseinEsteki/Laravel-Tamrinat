@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">اطلاعات کاربر</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="">
                                    <li>نام کاربر</li>
                                    <li>آدرس ایمیل</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="">
                                    <li>{{$user->name}}</li>
                                    <li>{{$user->email}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
