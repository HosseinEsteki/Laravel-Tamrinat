@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">سطح دسترسی {{$role->name}}</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('role.permissions.store',['role'=>$role->id])}}" method="post">
                                    @csrf
                                    <div class="row">
                                        @foreach($permissions as $permission)
                                            @php
                                                $isCheck=false;
                                                foreach ($role_permissions as $p)
                                                {
                                                if($permission->id==$p)
                                                    {
                                                    $isCheck=true;
                                                    break;
                                                    }
                                                }
                                            @endphp
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{$permission->name}}
                                                        <input type="checkbox" class="form-check-input"
                                                               name="permissions[]"
                                                               id=""
                                                               value="{{$permission->id}}" @if($isCheck) checked @endif>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">ذخیره
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
