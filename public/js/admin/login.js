$(document).ready(function(){
    let base_url = window.location.origin;

    $(document).on("click", "#submit", function(e){
        e.preventDefault();

        $(".alert").remove();
        $(".invalid-feedback").remove();
        $("login-form input").removeClass('is-invalid');

        $("#login-form").submit();
    });
    
    $("#login-form").on("submit",function(e){
        e.preventDefault();

        let data = new FormData(this);
        
        $.ajax({
            url:base_url+"/login",
            type:'POST',
            data:data,
            contentType:false,
            processData:false,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend:function(){
                $("#submit").html('Signing in...').css('font-style','italic');
            },
            success:function(response){
                if(response.status === 201){
                    $('<div class="alert alert-info">Berhasil Login.</div>').insertBefore('#login-form');
                    setTimeout(function(){
                        window.location.href = base_url + '/dashboard'
                    }, 2000);
                }else{
                    $('<div class="alert alert-danger">Gagal Login.</div>').insertBefore('#login-form');
                }
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
                $("#submit").html('Submit').css('font-style','normal');
            }

        });
    }); 
});