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
  <h1>Upload Stock Data<small>&nbsp;<span id="waktu"></span></small></h1>
     <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="#">Upload Stock Data</a></li>
		</ol>
</section>
<!--section ends-->
<section class="content">
  <div class="row">
    <!-- /.another-column -->
    <div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h3 id="judulmarketindex" class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container-fluid">
          <form id="marketindexform" action="{{ url('marketindexstore') }}" method="post" data-toggle="validator">
            {{csrf_field()}}
            <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
							<div class="form-group col-md-12">
              	<label for="id_marketindex" class=" control-label">Tabel : </label>
								<select name="id_marketindex" id="id_marketindex" class="form-control">
								<option>Pilih Tabel</option>
                @foreach($marketindex as $marketindex)
          			<option value="{{$marketindex->id}}" id="{{$marketindex->id}}">{{$marketindex->symbol}} - {{$marketindex->index_name}}</option>
                @endforeach
        	    	</select>
                <p style="color:red">{{ $errors->first('symbol') }}</p>
              </div>
							<div class="form-group col-md-12">
                  <label for="inputfile">CSV input</label>
                  <input type="file" name="inputfile" id="inputfile">
									<output id="list"></output>
              </div>
							<div class="row">
                <div class="form-group col-md-12">
          	    <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="Tambah Index Bursa">
                </div>

              </div>
							<div class="row">
							<div class="form-group col-md-12" id="divcsv">

              </div>
              </div>
						</row>

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
<script type="text/javascript">
function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
		var output = [];
  for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
								}
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('inputfile').addEventListener('change', handleFileSelect, false);


	 $("#inputfile").change(function () {
			 var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv|.txt)$/;
			 if (regex.test($("#inputfile").val().toLowerCase())) {
					 if (typeof (FileReader) != "undefined") {
							 var reader = new FileReader();
							 reader.onload = function (e) {
									 var table = $("<table />");
									 var rows = e.target.result.split("\n");
									 for (var i = 0; i < rows.length; i++) {
											 var row = $("<tr />");
											 var cells = rows[i].split(",");
											 for (var j = 0; j < cells.length; j++) {
													 var cell = $("<td />");
													 cell.html(cells[j]);
													 row.append(cell);
											 }
											 table.append(row);
									 }
									 $("#divcsv").html('');
									 $("#divcsv").append(table);
							 }
							 reader.readAsText($("#inputfile")[0].files[0]);
					 } else {
							 alert("This browser does not support HTML5.");
					 }
			 } else {
					 alert("Please upload a valid CSV file.");
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

$('#id_marketindex').change(function(){
	var id = $(this).children(':selected').attr('id');
		if(id){
		$.ajax({
					type:"GET",
					url:"/getstock/"+id,
					success:function(d){
						if(d){
								$.each(d,function(){
									var stock_name = this.name;
									var stock_symbol = this.symbol;
																$("#symbol").append('<option value="'+stock_symbol+'" id="'+stock_symbol+'">'+stock_symbol+' '+'-'+' '+stock_name+'</option>');
								});

							}else{
								 $("#symbol").empty();
							}
					}
			});
		}else{$("#symbol").empty();}
});

</script>
@include('flash')

@stop
