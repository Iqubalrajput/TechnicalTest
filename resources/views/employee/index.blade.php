@extends('layout.master')
@section('content')
<section id="page-content">
	<div class="body-content animated fadeIn">
		<div class="row">
			<div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Employee List</h3>
                        </div>
                        <div class="pull-right">
                            <form class="">
		                        <div class="form-group has-feedback" style="margin: 0px;">
		                            <input type="text" class="form-control typeahead rounded" placeholder="Search...">
		                            <button type="submit" class="btn btn-theme fa fa-search form-control-feedback rounded"></button>
		                        </div>
		                    </form>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body no-padding">
                        <div class="table-responsive" style="margin-top: -1px;">
                            <table class="table table-striped table-success">
                                <thead>
                                    <tr>
                                        <th class="text-center border-right" style="width: 1%;">No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th style="width: 20%;">Company</th>
                                        <th class="text-center" style="width: 12%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) > 0)
                                        @php($i = 1)
                                        @foreach ($data as $value)
                                    <tr id="tableRow_{{ $value->id }}">
                                                <td class="text-center border-right">{{ $i }}</td>
                                                <td> {{ $value->firstname }} </td>
                                                <td> {{ $value->lastname }} </td>
                                                <td> {{ $value->email }} </td>
                                                <td> {{ $value->company['name']}} </td>
                                                <td class="text-center">
                                                    <a href="{{url('employee',$value->id)}}/edit" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Delete" aria-hidden="true" onclick="deleteRecord('{{ $value->id}}')"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @php($i++)
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">Record Not Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div>
		</div>
	</div>
</section>

@push('scripts')
<script>
  // DELETE RECORD
    function deleteRecord(id) {
        var recordId = id;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: "GET",
            url: "{{ url('employee/delete') }}/" + recordId,
            data: {'_token': '{{ csrf_token() }}'},
            success: function (data, text) {
                if (data.alertType == 'success') {
                    toastr.success(data.message);
                        setTimeout(function(){
                            window.location.href="{{ url('employee') }}";
                        }, 1000);
                } else {
                    toastr.warning(data.message);
                }
            }
        });
    }
</script>
@endpush
@endsection