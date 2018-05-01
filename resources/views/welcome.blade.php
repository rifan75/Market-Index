<!DOCTYPE html>
<html lang="en">
<head>@include('partials.head')</head>
<style>
text {fill: #000;}
path.candle {stroke: #000000;}
path.candle.body {stroke-width: 0;}
path.candle.up {fill: #00AA00;stroke: #00AA00;}
path.candle.down {fill: #FF0000;stroke: #FF0000;}
</style>
<body>
	@include('partials.nav')

	<div id="wrapper">
		@section('alerts')
			@include('alerts')
		@show

		<br><br>

		@yield('top-content')

		<div class="container-fluid" style="width:90%">
			<div class="row">
				<div class="col-sm-12">
        	<div class="row">
            <div class="col-sm-4 text-center">
        			<div class="jumbotron">
        				<h1>Byvest
        					<span class="badge">alpha</span></h1>
        			</div>
        			@if (!Auth::user())
        			<p><a class="btn btn-success btn-lg" href="/login" role="button">Sign In</a></p>
        			@endif
        		</div>
            <div class="col-sm-4 text-center">
        			<div class="jumbotron">
        				<h1>Byvest
        					<span class="badge">alpha</span></h1>
        			</div>
        			@if (!Auth::user())
        			<p><a class="btn btn-success btn-lg" href="/login" role="button">Sign In</a></p>
        			@endif
        		</div>
            <div class="col-sm-4 text-center">
        			<div class="jumbotron">
        				<h1>Byvest
        					<span class="badge">alpha</span></h1>
        			</div>
        			@if (!Auth::user())
        			<p><a class="btn btn-success btn-lg" href="/login" role="button">Sign In</a></p>
        			@endif
        		</div>
        	</div>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-sm-6">
          <h2 class="header">Bursa</h2>
          <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-3">
                <div id="clock0" class="clock centered"></div>
              </div>
              <div class="col-sm-5">
                <div id="idxz"></div>
              </div>
              <div class="col-sm-4">
                <div id="Stocks">
									  <span class="Symbol">
									    <b class="Kode"><i data-replace='StockExchange'>IHSG</i></b>
									  </span><br>
									  <span class="Price"><b class="Stat"><i id="harga"></i></b></span>
									  <span class="Change"><b class="Selisih"><i id="selisih"></i></b> <b class="Percent">(<i id='percent'></i>)</b></span>
									  <span class="Volume"> <b class="Volume" id='volume'></b></span>

                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="col-sm-3">
                <div id="clock1" class="clock centered"></div>
              </div>
              <div class="col-sm-5">
                <div id="nya"></div>
              </div>
							<div class="col-sm-4">
                <div id="Stocks">
									  <span class="Symbol">
									    <b class="Kode"><i data-replace='StockExchange'>NYSE</i></b>
									  </span><br>
									  <span class="Price"><b class="Stat"><i id="harga1"></i></b></span>
									  <span class="Change"><b class="Selisih"><i id="selisih1"></i></b> <b class="Percent">(<i id='percent1'></i>)</b></span>
									  <span class="Volume"> <b class="Volume" id='volume1'></b></span>

                </div>
              </div>
            </div>
            <div  class="col-sm-12">
              <div class="col-sm-3">
                <div id="clock2" class="clock centered"></div>
              </div>
              <div class="col-sm-5">
                <div id="sti"></div>
              </div>
							<div class="col-sm-4">
                <div id="Stocks">
									  <span class="Symbol">
									    <b class="Kode"><i data-replace='StockExchange'>STI Index</i></b>
									  </span><br>
									  <span class="Price"><b class="Stat"><i id="harga2"></i></b></span>
									  <span class="Change"><b class="Selisih"><i id="selisih2"></i></b> <b class="Percent">(<i id='percent2'></i>)</b></span>
									  <span class="Volume"> <b class="Volume" id='volume2'></b></span>

                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="col-sm-3">
                <div id="clock3" class="clock centered"></div>
              </div>
              <div class="col-sm-5">
                <div id="hsi"></div>
              </div>
							<div class="col-sm-4">
                <div id="Stocks">
									  <span class="Symbol">
									    <b class="Kode"><i data-replace='StockExchange'>HangSeng</i></b>
									  </span><br>
									  <span class="Price"><b class="Stat"><i id="harga3"></i></b></span>
									  <span class="Change"><b class="Selisih"><i id="selisih3"></i></b> <b class="Percent">(<i id='percent3'></i>)</b></span>
									  <span class="Volume"> <b class="Volume" id='volume3'></b></span>

                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="col-sm-3">
                <div id="clock4" class="clock centered"></div>
              </div>
              <div class="col-sm-5">
                <div id="asx"></div>
              </div>
							<div class="col-sm-4">
                <div id="Stocks">
									  <span class="Symbol">
									    <b class="Kode"><i data-replace='StockExchange'>ASX(AORD)</i></b>
									  </span><br>
									  <span class="Price"><b class="Stat"><i id="harga4"></i></b></span>
									  <span class="Change"><b class="Selisih"><i id="selisih4"></i></b> <b class="Percent">(<i id='percent4'></i>)</b></span>
									  <span class="Volume"> <b class="Volume" id='volume4'></b></span>

                </div>
              </div>
            </div>
         </div>
       </div>
       <div class="col-sm-6">
        <h2 class="header">Berita</h2>
        <div id="news" class="col-sm-12" style="color: #6435C9">

        </div>
       </div>
      </div>

        </div>
			</div>


	@include('partials.footer')

	@include('partials.scripts')
</script>
<script src="http://d3js.org/d3.v4.min.js"></script>
<script src="/js/techan.js"></script>
<script>
function loadindex(){
$.ajax({
	url : "/getmarketindex",
	type : "GET",
	dataType : "JSON",
	success : function(data){
		var hargaidx = data.closeidx0-0;
		$('#harga').text(hargaidx.toFixed(2));
		$('#volume').text(data.volumeidx0);
		var selisihidx = data.closeidx0-data.closeidx1;
		$('#selisih').text(selisihidx.toFixed(2));
		var percentageidx = (selisihidx / data.closeidx1)*100;
		$('#percent').text(percentageidx.toFixed(2)+' %');
		if( selisihidx < 0) {
			$("#selisih").css({"color": "red"});
      $("#harga").append('&nbsp;<img src="../images/reddown.png" height="24px" width="24px"></img>');
		}else {
			$("#selisih").css({"color": "green"});
			$("#harga").append('&nbsp;<img src="../images/greenup.png" height="24px" width="24px"></img>');
		}
		var harganya = data.closenya0-0;
		$('#harga1').text(harganya.toFixed(2).toLocaleString());
		var volumenya = data.volumenya0-0;
		$('#volume1').text(volumenya.toLocaleString());
		var selisihnya = data.closenya0-data.closenya1;
		$('#selisih1').text(selisihnya.toFixed(2));
		var percentagenya = (selisihnya / data.closenya1)*100;
		$('#percent1').text(percentagenya.toFixed(2).toLocaleString()+' %');
		if( selisihnya < 0) {
			$("#selisih1").css({"color": "red"});
      $("#harga1").append('&nbsp;<img src="../images/reddown.png" height="24px" width="24px"></img>');
		}else {
			$("#selisih1").css({"color": "green"});
			$("#harga1").append('&nbsp;<img src="../images/greenup.png" height="24px" width="24px"></img>');
		}
		var hargasti = data.closesti0-0;
		$('#harga2').text(hargasti.toFixed(2).toLocaleString());
		var volumesti = data.volumesti0-0;
		$('#volume2').text(volumesti.toLocaleString());
		var selisihsti = data.closesti0-data.closesti1;
		$('#selisih2').text(selisihsti.toFixed(2));
		var percentagesti = (selisihsti / data.closesti1)*100;
		$('#percent2').text(percentagesti.toFixed(2).toLocaleString()+' %');
		if( selisihsti < 0) {
			$("#selisih2").css({"color": "red"});
      $("#harga2").append('&nbsp;<img src="../images/reddown.png" height="24px" width="24px"></img>');
		}else {
			$("#selisih2").css({"color": "green"});
			$("#harga2").append('&nbsp;<img src="../images/greenup.png" height="24px" width="24px"></img>');
		}
		var hargahsi = data.closehsi0-0;
		$('#harga3').text(hargahsi.toFixed(2).toLocaleString());
		var volumehsi = data.volumehsi0-0;
		$('#volume3').text(volumehsi.toLocaleString());
		var selisihhsi = data.closehsi0-data.closehsi1;
		$('#selisih3').text(selisihhsi.toFixed(2));
		var percentagehsi = (selisihhsi / data.closehsi1)*100;
		$('#percent3').text(percentagehsi.toFixed(2).toLocaleString()+' %');
		if( selisihhsi < 0) {
			$("#selisih3").css({"color": "red"});
      $("#harga3").append('&nbsp;<img src="../images/reddown.png" height="24px" width="24px"></img>');
		}else {
			$("#selisih3").css({"color": "green"});
			$("#harga3").append('&nbsp;<img src="../images/greenup.png" height="24px" width="24px"></img>');
		}
		var hargaasx = data.closeasx0-0;
		$('#harga4').text(hargaasx.toFixed(2).toLocaleString());
		var volumeasx = data.volumeasx0-0;
		$('#volume4').text(volumeasx.toLocaleString());
		var selisihasx = data.closeasx0-data.closeasx1;
		$('#selisih4').text(selisihasx.toFixed(2));
		var percentageasx = (selisihasx / data.closeasx1)*100;
		$('#percent4').text(percentageasx.toFixed(2).toLocaleString()+' %');
		if( selisihasx < 0) {
			$("#selisih4").css({"color": "red"});
      $("#harga4").append('&nbsp;<img src="../images/reddown.png" height="24px" width="24px"></img>');
		}else {
			$("#selisih4").css({"color": "green"});
			$("#harga4").append('&nbsp;<img src="../images/greenup.png" height="24px" width="24px"></img>');
		}
	}
});
}
loadindex()

setInterval(function(){
    loadindex()
}, 7000);

var margin = {top: 5, right: 5, bottom: 5, left: 5},
	width = 200 - margin.left - margin.right,
	height = 155 - margin.top - margin.bottom;

var parseDate = d3.timeParse("%Y-%m-%d");

var x = techan.scale.financetime().range([0, width]);

var y = d3.scaleLinear().range([height, 0]);

var candlestick = techan.plot.candlestick().xScale(x).yScale(y);

var xAxis = d3.axisBottom().scale(x);

var yAxis = d3.axisLeft().scale(y);

d3.json("/getmarketindexstockidx", function(error, data) {
	var accessor = candlestick.accessor();
	var filtered = data.filter(function(data) {
	   return data.close !== "0.0000";
	})

	data = filtered.slice(0, 30).map(function(d) {
			return {
				date: parseDate(d.tanggal),
				open: +d.open,
				high: +d.high,
				low: +d.low,
				close: +d.close
			};
	}).sort(function(a, b) { return d3.ascending(accessor.d(a), accessor.d(b)); });

	var svg = d3.select("#idxz").append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
		.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
	svg.append("g").attr("class", "candlestick");

	svg.append("g").attr("class", "x axis").attr("transform", "translate(0," + height + ")");

	svg.append("g")
					.attr("class", "y axis")
					.append("text")
					.attr("transform", "rotate(-90)")
					.attr("y", 6)
					.attr("dy", ".71em");

	draw(data.slice(0, data.length));
	function draw(data) {
			x.domain(data.map(candlestick.accessor().d));
			y.domain(techan.scale.plot.ohlc(data, candlestick.accessor()).domain());

			svg.selectAll("g.candlestick").datum(data).call(candlestick);
			svg.selectAll("g.x.axis").call(xAxis);
			svg.selectAll("g.y.axis").call(yAxis);
	}
});

d3.json("/getmarketindexstocknyse", function(error, data) {
		var accessor = candlestick.accessor();
		var filtered = data.filter(function(data) {
		   return data.close !== "0.0000";
		})

		data = filtered.slice(0, 30).map(function(d) {
				return {
					date: parseDate(d.tanggal),
					open: +d.open,
					high: +d.high,
					low: +d.low,
					close: +d.close
				};
		}).sort(function(a, b) { return d3.ascending(accessor.d(a), accessor.d(b)); });
		var svg = d3.select("#nya").append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
		.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
		svg.append("g")
						.attr("class", "candlestick");

		svg.append("g")
						.attr("class", "x axis")
						.attr("transform", "translate(0," + height + ")");

		svg.append("g")
						.attr("class", "y axis")
						.append("text")
						.attr("transform", "rotate(-90)")
						.attr("y", 6)
						.attr("dy", ".71em")
						.style("text-anchor", "end")
						.text("");

		draw(data.slice(0, data.length));
		function draw(data) {
				x.domain(data.map(candlestick.accessor().d));
				y.domain(techan.scale.plot.ohlc(data, candlestick.accessor()).domain());

				svg.selectAll("g.candlestick").datum(data).call(candlestick);
				svg.selectAll("g.x.axis").call(xAxis);
				svg.selectAll("g.y.axis").call(yAxis);
		}
});

		d3.json("/getmarketindexstocksti", function(error, data) {
				var accessor = candlestick.accessor();
				var filtered = data.filter(function(data) {
				   return data.close !== "0.0000";
				})

				data = filtered.slice(0, 30).map(function(d) {
						return {
							date: parseDate(d.tanggal),
							open: +d.open,
							high: +d.high,
							low: +d.low,
							close: +d.close
						};
				}).sort(function(a, b) { return d3.ascending(accessor.d(a), accessor.d(b)); });
		var svg = d3.select("#sti").append("svg")
				.attr("width", width + margin.left + margin.right)
				.attr("height", height + margin.top + margin.bottom)
				.append("g")
				.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
				svg.append("g")
								.attr("class", "candlestick");

				svg.append("g")
								.attr("class", "x axis")
								.attr("transform", "translate(0," + height + ")");

				svg.append("g")
								.attr("class", "y axis")
								.append("text")
								.attr("transform", "rotate(-90)")
								.attr("y", 6)
								.attr("dy", ".71em")
								.style("text-anchor", "end")
								.text("");



				// Data to display initially
				draw(data.slice(0, data.length));
				// Only want this button to be active if the data has loaded
				//d3.select("button").on("click", function() { draw(data); }).style("display", "inline");
				function draw(data) {
						x.domain(data.map(candlestick.accessor().d));
						y.domain(techan.scale.plot.ohlc(data, candlestick.accessor()).domain());

						svg.selectAll("g.candlestick").datum(data).call(candlestick);
						svg.selectAll("g.x.axis").call(xAxis);
						svg.selectAll("g.y.axis").call(yAxis);
				}
		});

		d3.json("/getmarketindexstockhsi", function(error, data) {
				var accessor = candlestick.accessor();
				var filtered = data.filter(function(data) {
				   return data.close !== "0.0000";
				})

				data = filtered.slice(0, 30).map(function(d) {
						return {
							date: parseDate(d.tanggal),
							open: +d.open,
							high: +d.high,
							low: +d.low,
							close: +d.close
						};
				}).sort(function(a, b) { return d3.ascending(accessor.d(a), accessor.d(b)); });
		var svg = d3.select("#hsi").append("svg")
				.attr("width", width + margin.left + margin.right)
				.attr("height", height + margin.top + margin.bottom)
				.append("g")
				.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
				svg.append("g")
								.attr("class", "candlestick");

				svg.append("g")
								.attr("class", "x axis")
								.attr("transform", "translate(0," + height + ")");

				svg.append("g")
								.attr("class", "y axis")
								.append("text")
								.attr("transform", "rotate(-90)")
								.attr("y", 6)
								.attr("dy", ".71em")
								.style("text-anchor", "end")
								.text("");



				// Data to display initially
				draw(data.slice(0, data.length));
				// Only want this button to be active if the data has loaded
				//d3.select("button").on("click", function() { draw(data); }).style("display", "inline");
				function draw(data) {
						x.domain(data.map(candlestick.accessor().d));
						y.domain(techan.scale.plot.ohlc(data, candlestick.accessor()).domain());

						svg.selectAll("g.candlestick").datum(data).call(candlestick);
						svg.selectAll("g.x.axis").call(xAxis);
						svg.selectAll("g.y.axis").call(yAxis);
				}
		});

		d3.json("/getmarketindexstockasx", function(error, data) {
				var accessor = candlestick.accessor();
				var filtered = data.filter(function(data) {
				   return data.close !== "0.0000";
				})

				data = filtered.slice(0, 30).map(function(d) {
						return {
							date: parseDate(d.tanggal),
							open: +d.open,
							high: +d.high,
							low: +d.low,
							close: +d.close
						};
				}).sort(function(a, b) { return d3.ascending(accessor.d(a), accessor.d(b)); });
		var svg = d3.select("#asx").append("svg")
				.attr("width", width + margin.left + margin.right)
				.attr("height", height + margin.top + margin.bottom)
				.append("g")
				.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
				svg.append("g")
								.attr("class", "candlestick");

				svg.append("g")
								.attr("class", "x axis")
								.attr("transform", "translate(0," + height + ")");

				svg.append("g")
								.attr("class", "y axis")
								.append("text")
								.attr("transform", "rotate(-90)")
								.attr("y", 6)
								.attr("dy", ".71em")
								.style("text-anchor", "end")
								.text("");



				// Data to display initially
				draw(data.slice(0, data.length));
				// Only want this button to be active if the data has loaded
				//d3.select("button").on("click", function() { draw(data); }).style("display", "inline");
				function draw(data) {
						x.domain(data.map(candlestick.accessor().d));
						y.domain(techan.scale.plot.ohlc(data, candlestick.accessor()).domain());

						svg.selectAll("g.candlestick").datum(data).call(candlestick);
						svg.selectAll("g.x.axis").call(xAxis);
						svg.selectAll("g.y.axis").call(yAxis);
				}
		});

</script>
</body>
</html>
