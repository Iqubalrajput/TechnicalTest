@extends('layout.master')
@section('content')
<section id="page-content">
	<div class="body-content animated fadeIn">
		<div class="row">
			<div class="col-md-6 col-md-offset-3"> 
		        <div class="panel rounded shadow">
		            <div class="panel-heading">
		                <div class="pull-left">
		                    <h3 class="panel-title">Add New Company Details</h3>
		                </div>
		                <div class="clearfix"></div>
		            </div><!-- /.panel-heading -->
		            <div class="panel-body no-padding">

		                <form class="form-horizontal" id="createcompany" enctype="multipart/form-data">
		                    <div class="form-body">
		                        <div class="form-group no-margin">
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <input type="text" class="form-control mb-15" name="name" placeholder="Company Name"/>
		                                </div>
		                                <div class="col-md-6">
		                                    <input type="text" class="form-control mb-15" name="email" placeholder="Company Email"/>
		                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <input type="File" class="form-control mb-15" name="image" placeholder="Company Image"/>
		                                </div>
		                                <div class="col-md-6">
		                                	<input type="text" name="website" id="url"
									       placeholder="https://example.com">
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="form-footer">
		                        <button type="submit" class="btn btn-success">Submit</button>
		                    </div>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</section>

@push('scripts')
<script>
    $('#createcompany').on('submit', function(event){
        event.preventDefault();

        var name       = $("input[name=name]").val();
        var email       = $("input[name=email]").val();
        var image    = $("input[name=image]").val();
        var website       = $("input[name=website]").val();

        if (name == '') {
            toastr.error('Please Enter Company Name');
            $("input[name=name]").addClass('errorAlert');
            return false;
        } else {
            $("input[name=name]").removeClass('errorAlert');
        }

        if (email == '') {
            toastr.error('Please Enter Company Email');
            $("input[name=email]").addClass('errorAlert');
            return false;
        } else {
            $("input[name=email]").removeClass('errorAlert');
        }

        if (image == '') {
            toastr.error('Please Selec Company Image');
            $("input[name=image]").addClass('errorAlert');
            return false;
        } else {
            $("input[name=image]").removeClass('errorAlert');
        }

        if (website == '') {
            toastr.error('Please Select Company website');
            $("input[name=website]").addClass('errorAlert');
            return false;
        } else {
            $("input[name=website]").removeClass('errorAlert');
        }

        if(name == ''  || email=='' ||  image == '' ||  website=='' ) {
            return false;
        } else {

            formData = new FormData(this)
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url:"{{ url('company') }}",
                method:"POST",
                data: formData,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    if (data.alertType == 'success') {
                        toastr.success(data.message);
                        setTimeout(function(){
                            window.location.href="{{ url('company') }}";
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
@endpush
@endsection