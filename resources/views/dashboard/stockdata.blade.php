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
  <h1>Stock Data</h1><br><small><span id="waktu"></span></small>
     <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="#">Stock Data</a></li>
		</ol>
</section>
<!--section ends-->
<section class="content">
  <div class="row">
    <!-- /.another-column -->
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 id="judulmarketindex" class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

					<div class="row">
						<table class="table">
							@foreach ($json[0] as $key=>$value)
							<tr>
								<td class="col-md-4">{{$key}}</td>
								<td class="col-md-4">{{$value}}</td>
								<td class="col-md-4">{{$json[1][$key]}}</td>
							</tr>
							@endforeach
						</table>
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
