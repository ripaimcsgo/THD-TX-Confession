$(document).ready(function () {
    $('#noti').hide();
    function uploadForm() {
        var file_data = $('#fileToUpload').prop('files')[0];
        var form_data = new FormData();
        form_data.append('fileToUpload', file_data);
        form_data.append('content', $('#content').val());

        $.ajax({
            url: 'src/FormDataHandler.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function (data) {
                $('#content').val("")
                $('#noti').html(data);
                $('#noti').show();
                $('.custom-file-input').siblings(".custom-file-label").html('Chọn file tải lên');
                $('.custom-file-input').removeClass('selected');
                $('.custom-file-input').val('');
                BtnReset('.btn');
            }
        });
    }

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('.btn').click(function (e) {
        e.preventDefault();
        $('#noti').hide();
        $("#cfsform").valid();
        if ($("#cfsform").valid()) {
            BtnLoading('.btn');
            uploadForm();
        }
    });

    $("#cfsform").validate({
        rules: {
            content: "required"
        },
        messages: {
            content: "Đi thi không làm được bài cũng phải viết tên. Viết confession cũng phải có nội dung nhé bạn iu 😒"
        },
    })

    function BtnLoading(elem) {
        $(elem).attr("data-original-text", $(elem).html());
        $(elem).prop("disabled", true);
        $(elem).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang gửi bài...');
    }
    
    function BtnReset(elem) {
        $(elem).prop("disabled", false);
        $(elem).html($(elem).attr("data-original-text"));
    }

});
