@extends('layout.master')
@section('content')
<section id="page-content">
	<div class="body-content animated fadeIn">
		<div class="row">
			<div class="col-md-8 col-md-offset-2"> 
		        <div class="panel rounded shadow">
		            <div class="panel-heading">
		                <div class="pull-left">
		                    <h3 class="panel-title">Add New Employee Details</h3>
		                </div>
		                <div class="clearfix"></div>
		            </div><!-- /.panel-heading -->
		            <div class="panel-body no-padding">

		                <form class="form-horizontal" id="createEmployee">
		                    <div class="form-body">
		                        <div class="form-group no-margin">
		                            <div class="row">
		                                <div class="col-md-6">
                                        <label class="control-label">Employee First Name </label>
		                                    <input type="text" class="form-control mb-15" name="firstname" placeholder="Employee First Name"/>
		                                </div>
		                                <div class="col-md-6">
                                        <label class="control-label">Employee Last Name </label>
		                                    <input type="text" class="form-control mb-15" name="lastname" placeholder="Employee Last Name"/>
		                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-6">
                                        <label class="control-label">Employee Email</label>
		                                    <input type="email" class="form-control mb-15" name="email" placeholder="Employee Email"/ >
		                                </div>
		                                <div class="col-md-6">
                                        <label class="control-label">Select Comapny</label>
			                            <select class="form-control" name="company">
				                        @if(count($data) > 0)
				                        @foreach ($data as $value)
			                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                        @endif
			                            </select>
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
    $('#createEmployee').on('submit', function(event){
        event.preventDefault();

        var firstname = $("input[name=firstname]").val();
        var lastname  = $("input[name=lastname]").val();
        var email     = $("input[name=email]").val();
        var company   = $("input[name=company]").val();

        if (firstname == '') {
            toastr.error('Please Enter Employee First Name');
            $("input[name=firstname]").addClass('errorAlert');
            return false;
        } else {
            $("input[name=firstname]").removeClass('errorAlert');
        }

        if (lastname == '') {
            toastr.error('Please Enter Employee Last Name');
            $("input[name=lastname]").addClass('errorAlert');
            return false;
        } else {
            $("input[name=lastname]").removeClass('errorAlert');
        }

        if (email == '') {
            toastr.error('Please Enter Employee Email');
            $("input[name=email]").addClass('errorAlert');
            return false;
        } else {
            $("input[name=email]").removeClass('errorAlert');
        }

        if (company == '') {
            toastr.error('Please Select Company ');
            $("input[name=company]").addClass('errorAlert');
            return false;
        } else {
            $("input[name=company]").removeClass('errorAlert');
        }

        if(firstname == ''  || lastname=='' ||  email == '' ||  company=='' ) {
            return false;
        } else {

            formData = new FormData(this)
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url:"{{ url('employee') }}",
                method:"POST",
                data: formData,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    if (data.alertType == 'success') {
                        toastr.success(data.message);
                        setTimeout(function(){
                            window.location.href="{{ url('employee') }}";
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