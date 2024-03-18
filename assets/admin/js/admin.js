/***************************************************************************
 * Modal View Modal
 **************************************************************************/

$(document).on('click', '.btn-modal-view', function () {
    var $this = $(this);
    var url = $this.data('url');
    var originalHtml = $this.html();

    $.ajax({
        url : url,
        method : 'GET',
        success : function (data) {
            $this.prop('disabled',false).html(originalHtml);
            $('#common-modal').modal('show').html(data);
        }
    });
});

var bar = $('.bar');
var percent = $('.percent');

$('.ajax-form').ajaxForm({

    beforeSend: function() {
        // status.text('');
        var percentVal = '0%';
        var posterValue = $('input[name=file]').fieldValue();
        $('.progress-wrap').fadeIn();
        bar.width(percentVal);
        percent.html(percentVal);
        $('.load-spinner').fadeIn();
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function(response) {
        $('.load-spinner').fadeOut();
        $('.progress-wrap').fadeOut();

        if (response.status === "success") {
            bar.width(0);
            percent.html('0%');

            if (response.html){
                $('.table-responsive').html(response.html);
                $(".ajax-form")[0].reset();
            }
        } else if (response.status === "error") {
            $('#delete-user').modal('show');
            var errors = response.data;
            $('.error-messages').html('');
            $.each(errors, function( index, error ) {
                $('.error-messages').append('<p>'+error+'</p>');
            });
        }

    },
    complete: function(xhr) {
        // status.html(xhr.responseText);
    }
});

//submit edit forms forms
$(document).on('submit',".edit-form",function(e){
    var form = $(this);
    var url = form.attr('action');
    var formData = new FormData(form[0]);

    if ($(document).find('.tiny-editor').length) {
        for (var i = 0; i < tinymce.editors.length; i++) {
            formData.append('desc' + (i + 1), tinymce.editors[i].getContent());
        }
    }

    $('.load-spinner').fadeIn();

    $.ajax({
        url : url,
        method : 'POST',
        dataType: 'json',
        data : formData,
        contentType:false,
        cache: false,
        processData:false,
        success : function (response) {
            $('.load-spinner').fadeOut();
            $('.progress-wrap').fadeOut();

            if (response.status === "success") {

                $('#common-modal').modal('hide');

                if (response.html){
                    $('.table-responsive').html(response.html);
                }

            } else if (response.status === "error") {
                $('#common-modal').modal('hide');
                $('#delete-user').modal('show');
                var errors = response.data;
                $('.error-messages').html('');
                $.each(errors, function( index, error ) {
                    $('.error-messages').append('<p>' + error + '</p>');
                });
            }
        }
    });
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });
    return false;
});
// --------------------------Trigger File upload browsing Section ---------------------------
$(document).on('click', '.btn-product-image', function () {
    var btn = $(this);
    var uploadInp = btn.next('input[type=file]');
    uploadInp.change(function () {
        if (validateImgFile(this)) {
            btn.html('');
            previewURL(btn, this);
        }
    }).click();
});

function previewURL(btn, input) {
    if (input.files && input.files[0]) {
        // collecting the file source
        var file = input.files[0];
        // preview the image
        var reader = new FileReader();
        reader.onload = function (e) {
            var src = e.target.result;
            btn.attr('src', src);
        };
        reader.readAsDataURL(file);
    }
}
//validating the file
function validateImgFile(input) {
    if (input.files && input.files[0]) {
        // collecting the file source
        var file = input.files[0];
        // validating the image name
        if (file.name.length < 1) {
            alert("File must not be empty");
            return false;
        }
        return true;
    }
}


////Delete method
$(document).on('click' ,'.deleteBTN',function () {
    var url = $(this).data('url');

    var button = $('.modalDLTBTN');

    button.attr('href' ,url);
});

$('.checkout-form').on('submit' ,function () {
    var form = $(this);
    var url = form.attr('action');


    $.ajax({
        url : url,
        method : 'POST',
        dataType: 'json',
        data : form.serialize(),
        success : function (response) {
            $('#checkout').html(response.html);
        }
    });
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });
    return false;
});