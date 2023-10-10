@extends('layouts.app')
@inject("ahmad",'App\Ahmad')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">فراخوانی یک کلاس بدون پاس آن به ویو</div>

                    <div class="card-body">

                        <div class="row">
                            <h3>مقدار زیر از ما گرفته شده است</h3>
                            {{$ahmad->getVar()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
