<script>
    var uploadCropImage = '{{route('practice.cropImages')}}'
</script>
@extends('layouts.master')
@section('content')
    <section class="crop-image-wrapper">
        <div class="container">
            <div class="main-content">
                <div class="panel panel-info">
                    <div class="panel-heading">Laravel - Crop and upload an image with jQuery Croppie plugin using Ajax</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div id="upload-demo"></div>
                            </div>
                            <div class="col-md-4" style="padding:5%;">
                                <strong>Choose image to crop:</strong>
                                <input type="file" id="image_file">
                                <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Upload Image</button>
                                <div class="validate-notify text-danger" style="font-size: 12px"></div>
                                <div class="alert alert-success" id="upload-success" style="display: none;margin-top:10px;"></div>
                            </div>
                            <div class="col-md-4">
                                <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:30px 30px;height:450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
