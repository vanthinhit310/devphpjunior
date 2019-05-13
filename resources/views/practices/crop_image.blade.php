<script>
    var uploadCropImage = '{{route('practice.cropImages')}}';
    var uploadWifeImage = '{{route('practice.cropWifeImages')}}';
</script>
@extends('layouts.master')
@section('content')
    <section class="crop-image-wrapper">
        <div class="container">
            <div class="main-content">
                <div class="panel panel-info">
                    <div class="panel-heading">Laravel - Crop and upload an image with jQuery Croppie plugin using
                        Ajax
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 text-center image-zone">
                                <div id="upload-demo"></div>
                                <img src="{{asset('images/frame.png')}}" alt="Frame">
                            </div>
                            <div class="col-md-4 info">
                                <strong>Choose image to crop:</strong>
                                <input type="file" id="image_file">
                                <button class="btn btn-primary btn-block upload-image">Upload
                                    Image
                                </button>
                                <div class="validate-notify text-danger"></div>
                            </div>
                            <div class="col-md-4 preview-zone">
                                <div id="preview-crop-image"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="panel wife-panel-info">
                    <div class="panel-heading">Laravel - Crop and upload an image with jQuery Croppie plugin using
                        Ajax
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 text-center image-zone">
                                <div id="wife-upload-demo"></div>
                            </div>
                            <div class="col-md-4 info">
                                <strong>Choose image to crop:</strong>
                                <input type="file" id="wife_image_file">
                                <button class="btn btn-primary btn-block wife-upload-image">Upload
                                    Image
                                </button>
                                <div class="wife-validate-notify text-danger"></div>
                                <div style="display: none" id="wife-loading" class="dot-loading"><img src="{{asset('images/dot.svg')}}" alt="Loading"><span class="fs-10"> Please wait...</span></div>
                            </div>
                            <div class="col-md-4 wife-preview-zone">
                                <div id="preview-wife-crop-image"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
