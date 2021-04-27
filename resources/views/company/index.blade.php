@extends('layout.master')
@push('style')
<style>
.box{
  background: transparent;
  height: 200px;
  width: 200px;
  margin: 20px auto;
  position: relative;
  border: 1px solid #000;
}

.box i{
  position: absolute;
  right: 0;
  margin: 5px;
  font-size: 30px;
  cursor: pointer;
  color: red;
}

.box i:hover{
  color: gray;
}

.box img{
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.box h4{
  position: absolute;
  z-index: 100;
  top: 10px;
  color: #81b71a;
  text-transform: capitalize;
}
.box h5{
  position: absolute;
  z-index: 100;
  bottom: 0px;
  color: #81b71a;
  width: 100%;
  padding: 10px;
  background: #fff;
  margin: 0px;
  text-align: center;
}
</style>
@endpush
@section('content')
<section id="page-content">
	<div class="body-content animated fadeIn">
		<div class="row">
			<div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Company List</h3>
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
                      @if(count($data) > 0)
                      @foreach ($data as $value)
                        <div class="col-md-4">
                        	<div class="box">
                              <h4>{{ $value->name }} </h4>
                              <h5><a href="{{ $value->website}} ">{{ $value->website}}</a></h5>
              							  <i class="fa fa-window-close" onclick="deleteRecord('{{ $value->id}}')"></i>
              							  <img src="{{asset('upload_img/company/'. $value->image)}}" alt="Company Pic">
              						</div>
                        </div>
                        @endforeach
                        @endif
                        <div class="paginationContainer">
                             {!! $data->links() !!}
                        </div>
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
            url: "{{ url('company/delete') }}/" + recordId,
            data: {'_token': '{{ csrf_token() }}'},
            success: function (data, text) {
                if (data.alertType == 'success') {
                    toastr.success(data.message);
                        setTimeout(function(){
                            window.location.href="{{ url('company') }}";
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