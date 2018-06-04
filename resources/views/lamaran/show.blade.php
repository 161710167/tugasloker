@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Lamaran
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>

			 <div class="panel-body">
        		<div class="form-group">
			  	<label class="control-label">File CV</label>	
			  	<input type="text" name="file_cv" class="form-control" value="{{ $k->file_cv }}"  readonly>
			  	</div>

        	<div class="form-group">
			  	<label class="control-label">Status</label>	
			  	<input type="text" name="status" class="form-control" value="{{ $k->status }}"  readonly>
			  	</div>

			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection

