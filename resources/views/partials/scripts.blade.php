<!-- Scripts -->

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/bootstrap-slider.min.js"></script>
<script src="/js/jquery.marquee.min.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/accounting.min.js"></script>
<script src="/js/jquery.rotate.js"></script>

<script src="/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" ></script>
<script src="/js/jClocksGMT.js"></script>
<script type="text/javascript" src="/DataTables/datatables.js" ></script>
<script type="text/javascript" src="/DataTables/Buttons-1.5.0/js/dataTables.buttons.js" ></script>
<script src="/js/app.min.js"></script>

@yield('js')
<script>
  //moment.locale('id');
  // var tanggaljam =  moment().format('Do MMMM YYYY, h:mm:ss a');
  // setInterval(tanggaljam, 1000);
  // document.getElementById("waktu").innerHTML = tanggaljam;
  function update() {
  moment.locale('id');
  $('#waktu').html(moment().format('dddd, Do MMMM YYYY [Jam] H:mm:ss a'));
  }
  setInterval(update, 1000);

</script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-16515493-3', 'auto');
	ga('send', 'pageview');
</script>

<script type="text/javascript">
  $("#clock0").jClocksGMT({title:"Jakarta",dst:!0,offset:"7",skin:4,date:!0,timeformat: 'hh:mm:ss A', dateformat:"DD MMM YYYY"});
	$("#clock1").jClocksGMT({title:"New York",dst:!0,offset:"-4",skin:4,date:!0,timeformat: 'hh:mm:ss A',dateformat:"DD MMM YYYY"});
	$("#clock2").jClocksGMT({title:"Singapore",dst:!0,offset:"8",skin:4,date:!0,timeformat: 'hh:mm:ss A',dateformat:"DD MMM YYYY"});
	$("#clock3").jClocksGMT({title:"Hongkong",dst:!0,offset:"8",skin:4,date:!0,timeformat: 'hh:mm:ss A',dateformat:"DD MMM YYYY"});
	$("#clock4").jClocksGMT({title:"Sydney",dst:!0,offset:"10",skin:4,date:!0,timeformat: 'hh:mm:ss A',dateformat:"DD MMM YYYY"});
</script>

<script type="text/javascript">
$(document).ready(function(){
		$.ajax({
			type: "GET",
			url:"http://rss.detik.com/index.php/inet_bisnis",
			dataType:"xml",
			success:xmlParser,
		});
		function xmlParser(xml){
				  $(xml).find("item").each(function(){
					$("#news").append('<div class="row"><a target="_blank" href='+$(this).find("link").text()+
					'><h5><i class="fa fa-check-square-o"></i>&nbsp;'+$(this).find("title").text()+'</h5></a>'+
					$(this).find("description").text()+'</div>');
				});
		}
});

$(document).ready(function(){
		$.ajax({
			type: "GET",
			url:"http://feeds.reuters.com/reuters/businessNews",
			dataType:"xml",
			success:xmlParser,
		});
		function xmlParser(xml){
				  $(xml).find("item").each(function(){
					$("#news").append('<div><a target="_blank" href='+$(this).find("link").text()+
					'><h5><i class="fa fa-check-square-o"></i>&nbsp;'+$(this).find("title").text()+'</h5></a></div>');
				});
		}
});

</script>

@yield('scripts')
