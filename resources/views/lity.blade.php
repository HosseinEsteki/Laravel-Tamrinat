@extends('layouts.app')
@inject("ahmad",'App\Ahmad')
@section('styles')
    <!-- Lity -->
    <link rel="stylesheet" href="/libraries/lity/dist/lity.css">
    <script src="/libraries/lity/dist/lity.js"></script>

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">فرستادن عکس با استفاده از ajax</div>

                    <div class="card-body">

                        <div class="row">
                            @foreach($photos as $photo)
                                <div class="col-md-3 mb-4">
                                    <a href="{{$photo->path}}"><img src="{{$photo->thumbnail_path}}" alt="" data-lity></a>
                                </div>
                            @endforeach
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
