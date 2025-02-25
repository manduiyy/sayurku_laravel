$(document).ready(function(){
    let base_url = window.location.origin;

    $(document).on("click", "#submit", function(e){
        e.preventDefault();

        $(".invalid-feedback").remove();
        $("order-form input,textarea").removeClass('is-invalid');

        $("#order-form").submit();
    });
    
    $("#order-form").on("submit",function(e){
        e.preventDefault();

        let data = new FormData(this);
        
        $.ajax({
            url:base_url+"/submit-order",
            type:'POST',
            data:data,
            contentType:false,
            processData:false,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend:function(){
                $("#submit").val('Sending Order...').css('font-style','italic');
            },
            success:function(){
                $('<div class="alert alert-info">Pesanan Anda berhasil dikirim. Tunggu konfirmasi dari kami untuk proses selanjutnya.</div>').insertAfter('#order-form');
            },
            error:function(response){
                if(response.status === 422){
                    let errors = response.responseJSON.errors;
                    $.each(errors, function(key, value){
                        $("#"+key).addClass('form-control is-invalid');
                        $('<div class="invalid-feedback">'+value+'</div>').insertAfter("#"+key);
                    });

                }
            },
            complete:function(){
                $("#submit").val('Submit').css('font-style','normal');
            }

        });
    });

    
});