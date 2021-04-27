<!DOCTYPE html>
 <html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>SIGN IN | ADMIN</title>
        <script src="{{ URL::to('assets/global/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <link href="{{ URL::to('assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <link href="{{ URL::to('assets/admin/css/reset.css') }}" rel="stylesheet">
        <link href="{{ URL::to('assets/admin/css/themes/default.theme.css') }}" rel="stylesheet" id="theme">
        <link href="{{ URL::to('assets/admin/css/pages/sign.css') }}" rel="stylesheet">
        <style>
            #adminSignin small{
                display: table-caption;
                color: red;
            }
        </style>
    </head>
    <body class="page-sound">
        <div id="sign-wrapper">
            <div class="brand">
                <img src="{{ asset('images/demo_logo.png') }}" style="width: 100%;" alt="brand logo"/>
            </div>
            <form id="adminSignin">
                <div class="sign-header">
                    <div class="form-group">
                        <div class="sign-text">
                            <span>Admin Area</span>
                        </div>
                    </div>
                </div>
                <div class="sign-body">
                    <div class="form-group">
                        <div class="input-group input-group-lg rounded no-overflow">
                            <input type="email" class="form-control input-sm" placeholder="Username or email " name="email" value="admin@demo.com">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <small id="mail_error"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg rounded no-overflow">
                            <input type="password" class="form-control input-sm" placeholder="Password" name="password" value="12345678">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <small id="password_error"></small>
                        </div>
                    </div>
                </div>
                <div class="sign-footer">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">

                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="#" title="lost password">Lost password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Sign In</button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            $('#adminSignin').on('submit', function(event){
                event.preventDefault();

                var emailReg    = /^([\w-\.+]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var email       = $("input[name=email]").val();
                var password    = $("input[name=password]").val();

                if (email == '') {
                    $('#mail_error').html("This field is required.");
                    return false;

                } else if(!emailReg.test(email)) {
                    $('#mail_error').html("please enter a valid email.");
                    return false;
                } 
                 else {
                    $('#mail_error').html("");
                }

                if (password == '') {
                    $('#password_error').html("This field is required.");
                    return false;

                } else {
                    $('#password_error').html("");
                }

                if(email == '' || password == '' ) {
                    return false;
                } else {

                    formData = new FormData(this)
                    // formData.append('l_description1', $('#l_description').val());
                    formData.append('_token', '{{ csrf_token() }}');
                    $.ajax({
                        url:"{{ url('login') }}",
                        method:"POST",
                        data: formData,
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data){
                            if (data.alertType == 'success') {
                                toastr.success(data.message);
                                setTimeout(function(){
                                    window.location.href = "{{ url('/') }}";
                                }, 1000);
                            } else {
                                toastr.error(data.message);
                            }
                        },
                        error: function (request, status, error) {
                            var responseMessage = JSON.parse(request.responseText)
                            var errors = responseMessage.errors;
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    toastr.error(errors[key]);
                                }
                            }
                        }
                    });  
                }
            });
        </script>
    </body>
</html>