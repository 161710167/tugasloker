@extends('layouts.admin')
@section('content')

	<div class="row">
	<div class="container">
	<div class="col-md-16">
	 <br>
			  <br>
			<div class="panel panel-danger">
			  <div class="panel-heading"><font color ="blue">Data User</font>
			  	<div class="panel-title pull-right"><a href="{{ route('user.create') }}">Tambah</a>
			  	</div>
			  </div>

			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>

			  		  <th>No</th>
					  <th>Name</th>
					  <th>Email</th>
					  <th>Password</th>
					  <th>Nama Member</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($a as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->name }}</td>
				    	<td>{{ $data->email }}</td>
				    	<td>{{ $data->password }}</td>
				    	
<td>
	<a class="btn btn-warning" href="{{ route('user.edit',$data->id) }}">Edit</a>
</td>
<td>
	<a href="{{ route('user.show',$data->id) }}" class="btn btn-success">Show</a>
</td>
<td>
	<form method="post" action="{{ route('user.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection