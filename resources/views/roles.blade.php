@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">سطوح دسترسی</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-hover table-inverse">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام سطح</th>
                                        <th>سازنده</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$role->name}}</td>
                                            <td><a href="#" class="text-decoration-none">{{$role->creator->name}}</a>
                                            </td>
                                            <td>
                                                <a class="btn rounded btn-outline-info"
                                                   href="{{route('role.permissions',['role'=>$role->id])}}"><i
                                                        class="fa-solid fa-square-info"></i></a>
                                                @can('update-role')
                                                    <a class="btn rounded btn-outline-warning"
                                                       href="{{route('roles.edit',['role'=>$role->id])}}"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                @endcan
                                                @can('delete-role')
                                                    <form action="{{route('roles.destroy',['role'=>$role->id])}}"
                                                          method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="role" value="{{$role->id}}">
                                                        <button type="submit" class="btn rounded btn-outline-danger"><i
                                                                class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <form action="{{route('roles.store')}}" method="post" class="col-md-6">
                                @csrf
                                <input type="hidden" name="role_id" value="@isset($roleEdit){{$roleEdit->id}}@endisset">
                                <div class="form-group">
                                    <label for="role" class="col-form-label">نام</label>
                                    <input type="text" class="form-control" name="name" id="role"
                                           placeholder="نام سطح دسترسی را وارد کنید"
                                           value="@isset($roleEdit){{$roleEdit->name}}@endisset">
                                    @error('name')
                                        <label for="role" class="text-danger">{{$errors->first('name')}}</label>
                                    @enderror
                                </div>

                                @can('create-role')

                                    <button type="submit"
                                            class="btn btn-success mt-3">ارسال
                                    </button>
                                @endcan

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
