@extends('layouts.app')
@inject("ahmad",'App\Ahmad')
@section('styles')
    <!-- Dropzone -->
    <script src="/libraries/dropzone/dropzone.min.js"></script>
    <link rel="stylesheet" href="/libraries/dropzone/dropzone.min.css" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">فرستادن عکس با استفاده از ajax</div>

                    <div class="card-body">

                        <div class="row">
                            <form action="/send" id="myDropzone" enctype="multipart/form-data" method="post" class="dropzone">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        Dropzone.options.myDropzone = { // camelized version of the `id`
            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            acceptedFiles:".jpg, .jpeg, .png, .bmp"
        };
    </script>
@endsection
