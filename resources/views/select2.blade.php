@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">نمونه select2</div>

                    <div class="card-body">

                        <div class="row">

                            <select class="js-example-basic-single form-group form-select" name="state[]" multiple>
                                <option value="AL">Alabama</option>
                                <option value="dd">fdfdf</option>
                                <option value="ss">Alhgghfgabama</option>
                                <option value="aa">Alavbnvnbama</option>
                                <option value="ff">bvgh</option>

                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
