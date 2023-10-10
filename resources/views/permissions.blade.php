@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">نقش ها</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-hover table-inverse">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام نقش</th>
                                        <th>سازنده</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td><a href="#" class="text-decoration-none">{{$permission->creator->name}}</a></td>
                                        <td>
                                            <a class="btn rounded btn-outline-warning" href="{{route('permissions.edit',['permission'=>$permission->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a class="btn rounded btn-outline-danger" href="{{route('permissions.destroy',['permission'=>$permission->id])}}"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <form action="{{route('permissions.store')}}" method="post" class="col-md-6">
                                <input type="hidden" name="permission_id" value="@isset($permissionEdit){{$permissionEdit->id}}@endisset">
                                <div class="form-group">
                                    <label for="permission" class="col-form-label">نام</label>
                                    <input type="text" class="form-control" name="name" id="permission"
                                           placeholder="نام نقش را وارد کنید" value="@isset($permissionEdit){{$permissionEdit->name}}@endisset">
                                </div>
                                <button type="submit"
                                        class="btn btn-success mt-3">ارسال
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
