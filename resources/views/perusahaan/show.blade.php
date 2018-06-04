@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Perusahaan 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>

			 <div class="panel-body">
        		<div class="form-group">
			  	<label class="control-label">Logo</label>	
			  	<input type="img" name="logo" class="form-control" value="{{ $k->logo }}"  readonly>
			  	</div>

        	<div class="form-group">
			  	<label class="control-label">Kategori</label>	
			  	<input type="text" name="kategori" class="form-control" value="{{ $k->kategori }}"  readonly>
			  	</div>

			<div class="form-group">
			  	<label class="control-label">Subkategori</label>	
			  	<input type="text" name="subkategori" class="form-control" value="{{ $k->subkategori }}"  readonly>
			  	</div>

			<div class="form-group">
			  	<label class="control-label">Judul</label>	
			  	<input type="text" name="judul" class="form-control" value="{{ $k->judul }}"  readonly>
			  	</div>

			<div class="form-group">
			  	<label class="control-label">Gaji</label>	
			  	<input type="text" name="gaji" class="form-control" value="{{ $k->gaji }}"  readonly>
			  	</div>

			<div class="form-group">
			  	<label class="control-label">Tanggal Mulai</label>	
			  	<input type="text" name="tgl_mulai" class="form-control" value="{{ $k->tgl_mulai }}"  readonly>
			  	</div>

			<div class="form-group">
			  	<label class="control-label">Email</label>	
			  	<input type="text" name="email" class="form-control" value="{{ $k->email }}"  readonly>
			  	</div>

			<div class="form-group">
			  	<label class="control-label">Telpon</label>	
			  	<input type="text" name="telpon" class="form-control" value="{{ $k->telpon }}"  readonly>
			  	</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection

