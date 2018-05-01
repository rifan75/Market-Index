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
  <h1>Upload Financial Statement & General Information</h1><br><small><span id="waktu"></span></small>
     <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="#">Upload Financial Statement & General Information</a></li>
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
          <form id="uploadstatform" action="{{ url('uploadstatstore') }}" enctype="multipart/form-data" method="post" data-toggle="validator">
            {{csrf_field()}}
            <input id="inputhidden" type='hidden' name='_method' value='POST'>
              <div class="row">
							<div class="form-group col-md-12">
              	<label for="id_marketindex" class=" control-label">Market : </label>
								<select name="id_marketindex" id="id_marketindex" class="form-control">
								<option>Choose Market</option>
                @foreach($marketindex as $marketindex)
          			<option value="{{$marketindex->id}}" id="{{$marketindex->id}}">{{$marketindex->symbol}} - {{$marketindex->index_name}}</option>
                @endforeach
        	    	</select>
                <p style="color:red">{{ $errors->first('id_marketindex') }}</p>
              </div>
							<div class="form-group col-md-12">
              	<label for="company_id" class=" control-label">Company : </label>
								<select name="company_id" id="company" class="form-control">
								<option>Choose Company</option>
        	    	</select>
                <p style="color:red">{{ $errors->first('company_id') }}</p>
              </div>
							<div class="form-group col-md-12">
              	<label for="id_company" class=" control-label">Statement Report : </label>
								<select name="statement" id="company" class="form-control">
								<option value="geninf">General Information</option>
								<option value="finpos">Financial Position</option>
								<option value="statproloss">Statement of Profit or Loss</option>
								<option value="equitypos">Statement of Changes in Equity</option>
								<option value="cashflow">Statement of Cash Flows</option>
        	    	</select>
                <p style="color:red">{{ $errors->first('statement') }}</p>
              </div>
							<div class="row">
								<div class="form-group col-md-8">
	              	<label for="period" class=" control-label">Period : </label>
									<select name="period" id="period" class="form-control">
									<option value="Kuartal I">Kuartal I</option>
									<option value="Kuartal II">Kuartal II</option>
									<option value="Kuartal III">Kuartal III</option>
									<option value="Kuartal IV Non Audit">Kuartal IV Non Audit</option>
									<option value="Kuartal IV Audited">Kuartal IV Audited</option>
	        	    	</select>
	                <p style="color:red">{{ $errors->first('period') }}</p>
	              </div>
								<div class="form-group col-md-4">
	              	<label for="id_company" class=" control-label">Year : </label>
									<input type="text" name="tahun" id="tahun">
								</div>
							</div>
							<div class="form-group col-md-12">
                  <label for="inputfile">CSV input</label>
                  <input type="file" name="filecsv" id="inputfile">
									<!-- <output id="list"></output> -->
              </div>
							<div class="row">
                <div class="form-group col-md-12">
          	    <input id="submit" type="submit" class="form-control btn btn-primary prod-submit" value="Tambah Index Bursa">
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
	<div id="divcsv">
	</div>
</section>
<!-- /.content -->
@stop

{{-- page level scripts --}}
@section('scripts')
<script type="text/javascript">
$('#tahun').datetimepicker({format:'YYYY'});
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
									 var table = $('<table class="table"/>');
									 var rows = e.target.result.split("\n");
									 for (var i = 0; i < rows.length; i++) {
											 var row = $('<td class="col-md-7" />');
											 var cells = rows[i].split(",");
											 console.log(cells);
											 for (var j = 0; j < cells.length; j++) {
													 var cell = $('<tr height="10" />');
													 if(cells[j]==""){
														 cells[j]="-";
													 }
													 cell.html(cells[j]);
													 row.append(cell);
													 console.log(cells[1]);
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


$('#id_marketindex').change(function(){
	var id = $(this).children(':selected').attr('id');
		if(id){
		$.ajax({
					type:"GET",
					url:"/getstock/"+id,
					success:function(d){
						if(d){
								$("#company").empty();
								$("#company").append('<option>Choose Company</option>');
								$.each(d,function(){
									var id_company = this.id;
									var stock_name = this.name;
									var stock_symbol = this.symbol;
																$("#company").append('<option value="'+id_company+'" id="'+stock_symbol+'">'+stock_symbol+' '+'-'+' '+stock_name+'</option>');
								});

							}else{
								 $("#company").empty();
							}
					}
			});
		}else{$("#company").empty();}
});

</script>
@include('flash')

@stop
