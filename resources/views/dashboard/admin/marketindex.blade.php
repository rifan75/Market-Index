@extends('app')
{{-- page level styles --}}
@section('header_styles')
<style>
.box-header {background-color: #F89A14;}
.box-title {float: left;display: inline-block;font-size: 18px;line-height: 18px;font-weight: 400;margin: 0;
	          padding: 0;margin-bottom: 8px;color: #fff
          }
</style>
@stop
@section('content')
<section class="content-header">
  <h1>Index Bursa<small>&nbsp;<span id="waktu"></span></small></h1>
     <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="#">Index Bursa</a></li>
		</ol>
</section>
<!--section ends-->
<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Daftar Index Bursa</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="post" id="formmarketindex">
						<meta id="token" name="token" content="{{ csrf_token() }}">
          <table id="marketindextable" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
							<th ></th>
              <th style="text-align:center">No</th>
							<th style="text-align:center">Id</th>
							<th style="text-align:center">Symbol</th>
              <th style="text-align:center">Index Symbol</th>
              <th style="text-align:center">Name</th>
              <th style="text-align:center">Web Url</th>
              <th style="text-align:center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </form>
        </div>
      </div>
    </div>
    <!-- /.another-column -->
    <div class="col-md-4">
      <div class="box">
        <div class="box-header">
          <h3 id="judulmarketindex" class="box-title">Input Market Index</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid">
          <form id="marketindexform" action="{{ url('marketindexstore') }}" method="post" data-toggle="validator">
            {{csrf_field()}}
            <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
							<div class="form-group col-md-12">
              	<label for="symbol" class=" control-label">Kode Bursa : </label>
              	<input id="symbol" type="text" class="form-control" name="symbol" value="{{ old('symbol') }}" required>
                <p style="color:red">{{ $errors->first('symbol') }}</p>
              </div>
							<div class="form-group col-md-12">
              	<label for="index_symbol" class=" control-label">Kode  Index Bursa : </label>
              	<input id="index_symbol" type="text" class="form-control" name="index_symbol" value="{{ old('index_symbol') }}" required>
                <p style="color:red">{{ $errors->first('index_symbol') }}</p>
              </div>
              <div class="form-group col-md-12">
              	<label for="index_name" class=" control-label">Nama Bursa : </label>
              	<input id="index_name" type="text" class="form-control" name="index_name" value="{{ old('index_name') }}" required>
                <p style="color:red">{{ $errors->first('marketindex_name') }}</p>
              </div>
							<div class="form-group col-md-12">
              	<label for="address" class=" control-label">Alamat : </label>
              	<textarea id="address"  cols="30" rows="2" class="form-control" name="address" value="{{ old('address') }}"></textarea>
                <p style="color:red">{{ $errors->first('address') }}</p>
              </div>
							<div class="form-group col-md-12">
              	<label for="province" class=" control-label">Provinsi : </label>
              	<input id="province" type="text" class="form-control" name="province" value="{{ old('province') }}">
                <p style="color:red">{{ $errors->first('marketindex_province') }}</p>
              </div>
							<div class="form-group col-md-12">
              	<label for="district" class=" control-label">Kabupaten/District : </label>
              	<input id="district" type="text" class="form-control" name="district" value="{{ old('district') }}">
                <p style="color:red">{{ $errors->first('marketindex_district') }}</p>
              </div>
							<div class="form-group col-md-12">
              	<label for="state" class=" control-label">Negara/State : </label>
              	<input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}">
                <p style="color:red">{{ $errors->first('marketindex_state') }}</p>
              </div>
							<div class="form-group col-md-12">
								<label for="poscode">Kode Pos</label>
								<input id="poscode" type="text" class="form-control" name="poscode" value="{{ old('poscode') }}">
							</div>
							<div class="form-group col-md-12">
              	<label for="weburl" class=" control-label">Web Url : </label>
              	<input id="weburl" type="text" class="form-control" name="weburl" value="{{ old('weburl') }}">
                <p style="color:red">{{ $errors->first('marketindex_url') }}</p>
              </div>
							<div class="form-group col-md-12">
              	<label for="note" class=" control-label">Note : </label>
              	<textarea id="note"  cols="30" rows="2" class="form-control" name="note" value="{{ old('note') }}"></textarea>
                <p style="color:red">{{ $errors->first('note') }}</p>
              </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
          	    <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="Tambah Index Bursa">
                </div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@stop

{{-- page level scripts --}}
@section('scripts')
<script type="text/javascript" src="/js/handlebars-v4.0.11.js" ></script>
<script id="details-template" type="text/x-handlebars-template">
	      <tr><td colspan="2">Address </td><td>:</td><td colspan="4">@{{4}}</td></tr>
        <tr><td colspan="2">Note </td><td>:</td><td colspan="4">@{{7}}</td></tr>
				<tr><td colspan="2">Perekam</td><td>:</td><td colspan="4">@{{6}}</td></tr>
</script>
<script type="text/javascript">
var template = Handlebars.compile($("#details-template").html());
var table = $('#marketindextable').DataTable({
    processing: true,
    serverSide: true,
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf', 'print'],
    ajax: {"url" : "/getmarketindex1"},
    columns: [
        {"className":'details-control',"orderable":false,"searchable":false,"data":null,"defaultContent": ''},
        {data: 0, className: 'dt-center'},{data: 1, visible:false},{data: 9},{data: 2},
				{data: 3},{data: 5},{data: 8, orderable: false, className: 'dt-center'},
    ],
        order: [1, 'desc']
});
// Add event listener for opening and closing details
$('#marketindextable tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row( tr );
    if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
    }
    else {
        // Open this row
        row.child( template(row.data()) ).show();
        tr.addClass('shown');
    }
});
// Showing add product Form
function editForm(id){
    $('#inputhidden').val('PATCH');
    $('#marketindexform')[0].reset();
    $.ajax({
      url : "/marketindex/"+id+"/edit",
      type : "GET",
      dataType : "JSON",
      success : function(data){
        $('#judulmarketindex').text('Edit Market Index');
        $('#submit').val('Edit Market Index');
				$('#symbol').val(data.symbol);
				$('#index_symbol').val(data.index_symbol);
        $('#index_name').val(data.index_name);
				$('#address').val(data.address);
				$('#province').val(data.province);
				$('#district').val(data.district);
				$('#state').val(data.state);
				$('#poscode').val(data.poscode);
				$('#weburl').val(data.weburl);
				$('#note').val(data.note);
        $('#marketindexform').attr('action', '/marketindex/'+id+'/update');
      },
      error : function() {
        swal("Error","Tidak dapat menampilkan data !","error");
      },
    });
  }
//Menghapud data
  function deleteForm(id) {
    swal({
      title: 'Apakah, anda yakin ?',
      text: "Data yg dihapus, tidak bisa dikembalikan",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
            $.ajax({
              url : "/marketindex/"+id,
              type : "POST",
              data: {_method: 'DELETE'},
              beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
              success : function(data){
              table.ajax.reload();
              swal("Sukses","Data berhasil dihapus","success");
            },
              error : function(data) {
              swal("Error","Tidak dapat menghapus data !","error");
            }
            });
          });
}

</script>
@include('flash')

@stop
