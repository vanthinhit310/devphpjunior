var Address = {

    /**
     * This function is used to get District of a City by id of City*/
    getListDistrictProfile: function () {
        if (jQuery('.basic-info').length) {
            jQuery('#city_profile').on('change', function () {
                jQuery('#district_profile').children('option').remove();
                var cityValue = jQuery(this).val();
                jQuery.ajax({
                    url: get_district_url,
                    data: {
                        id: cityValue
                    },
                    method: 'GET',
                    success: function (data) {
                        var array_data = data.districts;
                        array_data.forEach(function (element) {
                            jQuery('#district_profile').append('<option value="' + element.id + '" selected="selected">' + element.name + '</option>');
                        });
                    },
                    error: function (data) {
                        Swal.fire('Have an error', data.error, 'error');
                    }

                });
            });
        }
    },
    /**
     * This function is used to get Ward of a District by id of district
     * */
    getListWardProfile: function () {
        if (jQuery('.basic-info').length) {
            jQuery('#district_profile').on('change', function () {
                jQuery('#ward_profile').children('option').remove();
                var districtValue = jQuery(this).val();
                jQuery.ajax({
                    url: get_ward_url,
                    data: {
                        id: districtValue
                    },
                    method: 'GET',
                    success: function (data) {
                        var array_data = data.wards;
                        array_data.forEach(function (element) {
                            jQuery('#ward_profile').append('<option value="' + element.id + '" selected="selected">' + element.name + '</option>');
                        });
                    },
                    error: function (data) {
                        Swal.fire('Have an error', data.error, 'error');
                    }

                });
            });
        }
    }
};

var App_Image = {
    /**
     * Upload image with plugins CroppieJS. If you want to uses this plugins
     * you should be coppy two file is public/css/croppie.css and
     * public/js/croppie.js and read the documentation to understanding about
     * it. You can update custom option in function
     * jQuery('#divPreview').croppie.
     **/
    imageCroppieJS: function () {
        if (jQuery('.crop-image-wrapper').length) {
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            var resize = jQuery('#upload-demo').croppie({
                enableExif: true,
                enableOrientation: true,
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 200,
                    height: 200,
                    type: 'circle' //square
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });
            jQuery('#image_file').on('change', function () {
                jQuery('.validate-notify').html('');
                if (App_Image.validateImageBeforeUpload()) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        resize.croppie('bind', {
                            url: e.target.result
                        }).then(function () {
                            console.log('jQuery bind complete');
                        });
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
            jQuery('.upload-image').on('click', function (ev) {
                if (App_Image.validateImageBeforeUpload()) {
                    resize.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'   // can custom size :{width: 400,
                                           // height: 600}
                    }).then(function (img) {
                        jQuery.ajax({
                            url: uploadCropImage,
                            type: "POST",
                            data: {"image": img},
                            success: function (data) {
                                if (typeof (data.error) !== 'undefined' && data.error === false) {
                                    html = '<img src="' + data.imagePath + '" />';
                                    jQuery("#preview-crop-image").html(html);
                                    Swal.fire({
                                        position: 'center',
                                        type: 'success',
                                        title: data.message,
                                        showConfirmButton: false,
                                        timer: 800
                                    });
                                }
                            },
                            error: function (data) {
                                if (typeof (data.error) !== 'undefined' && data.error === true) {
                                    Swal.fire({
                                        position: 'center',
                                        type: 'error',
                                        title: data.message,
                                        showConfirmButton: false,
                                        timer: 800
                                    });
                                }
                            }
                        });
                    });
                }
            });
        }
    },

    /**
     * Validate image before upload to server. Include size of image and
     * extendsion of image.
     **/
    validateImageBeforeUpload: function () {
        if (jQuery('.crop-image-wrapper').length) {
            var image = document.getElementById('image_file');
            var imageUploadPath = image.value;
            if (imageUploadPath === '') {
                jQuery('.validate-notify').html("Please upload an image");
                return false;
            }
            else {
                var Extension = imageUploadPath.substring(imageUploadPath.lastIndexOf('.') + 1).toLowerCase();
                if (Extension === "gif" || Extension === "png" || Extension === "jpeg" || Extension === "jpg") {
                    if (image.files && image.files[0]) {
                        var size = image.files[0].size;
                        if (size > 2048000) {
                            jQuery('.validate-notify').html("Image size should be smaller than 2048 byte");
                            return false;
                        }
                        else {
                            return true;
                        }
                    }
                }
                else {
                    jQuery('.validate-notify').html("Photo only allows file types of GIF, PNG, JPG, JPEG. ");
                    return false;
                }
            }
        }
    }
};
var App_Comment = {
    addSubComment: function () {
        if (jQuery('.comment-sub').length) {
            jQuery('.add-sub-comment').on('click', function () {
                jQuery.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: add_sub_comment_url,
                    data: {
                        id_parent: jQuery('#id_comment_parent').val(),
                        id_post: jQuery('#id_post').val(),
                        comment: jQuery('.commentSub').val()
                    },
                    method: "POST",
                    success: function (response) {
                        jQuery('.commentSub').val('');
                        if (typeof (response.error) !== 'undefined' && response.error === false) {
                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                title: response.messageComment,
                                showConfirmButton: false,
                                timer: 800
                            });
                        }
                    },
                    error: function (response) {
                        if (typeof (response.error) !== 'undefined' && response.error === true) {
                            Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: response.messageComment,
                                showConfirmButton: false,
                                timer: 800
                            });
                        }
                    }
                });
            });
        }
    }
};
jQuery(document).ready(function () {
    App_Image.imageCroppieJS();
    App_Comment.addSubComment();

    Address.getListDistrictProfile();
    Address.getListWardProfile();
});

window.onload = function () {

};
