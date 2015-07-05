<html>
	<head>
		<title>Tea Party 2015</title>

		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<!-- Compiled and minified CSS -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">

  		<!-- Compiled and minified JavaScript -->
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
  		<script src="/js/jquery.smint.js"></script>
  		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Open+Sans' rel='stylesheet' type='text/css'>
  		<link rel="stylesheet" href="/css/main.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	</head>
	<body>
		<div class="navbar-fixed">
		<nav class="blue darken-1 menu" role="navigation">
    		<div class="nav-wrapper"><a id="logo-container" href="/" class="brand-logo left" style="margin-left:6%;">Tea Party 2015</a>
      			<ul class="right hide-on-med-and-down" style="margin-right:5%;">
        			<li><a href="/booking">Book a Flight</a></li>
        			<li><a href="/#about">About</a></li>
        			<li><a href="/#charts">Charts</a></li>
          		<li><a href="/poker">Poker</a></li>
        			<li><a href="/#faq">FAQ</a></li>
              <li><a href="#sponsors">Sponsors</a></li>
        			<li><a href="/#feedback">Feedback</a></li>

      			</ul>
      			<ul id="nav-mobile" class="side-nav">
        			<li><a href="/booking">Book a Flight</a></li>
        			<li><a href="/#about">About</a></li>
        			<li><a href="/#charts">Charts</a></li>
        			<li><a href="/poker">Poker</a></li>
        			<li><a href="/#faq">FAQ</a></li>
              <li><a href="/#sponsors">Sponsors</a></li>
        			<li><a href="/#feedback">Feedback</a></li>

      			</ul>
      		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    		</div>
  		</nav>
  		</div>
      <div class="container booking-center">
        <h3>Create Your Booking</h3>
        <hr>
        <h6>Flight Details</h6>
        <hr>
        <div class="row">
        {!!Form::open(array('url' => '/booking/create/', 'method' => 'post', 'class' => 'col s12 l12 m12'))!!}
          <div class="row">
          <div class="input-field col s6 m6 l6">
            <input name="callsign" id="callsign" type="text" class="validate">
            <label for="callsign">Callsign</label>
          </div>
          <div class="input-field col s6 m6 l6">
            <input name="aircraft" id="aircraft" type="text" class="validate">
            <label for="aircraft">Aircraft Type</label>
          </div>
          </div>
          <div class="row">
          <div class="input-field col s6 m6 l6">
              <input name="departs"id="departs" type="text" class="validate">
              <label for="departs">Departure Field</label>
          </div>
          <div class="input-field col s6 m6 l6">
              <input name="arrives"id="arrives" type="text" class="validate">
              <label for="arrives">Arrival Field</label>
          </div>
          </div>
          <div class="row">
          <div class="input-field col s6 m6 l6">
              <input name="depttime" id="depttime" type="number" class="validate">
              <label for="depttime">Departure Time (ZULU/UTC)</label>
          </div>
          <div class="input-field col s6 m6 l6">
              <input name="arrtime" id="arrtime" type="number" class="validate">
              <label for="arrtime">Arrival Time (ZULU/UTC)</label>
          </div>
          </div>
          <div class="row">
          <div class="input-field col s6 m6 l6">
              <input name="cruise" id="cruise" type="text" class="validate">
              <label for="cruise">Cruise Altitude</label>
          </div>
          <div class="input-field col s6 m6 l6">
              <input name="poker" type="checkbox" class="filled-in" id="poker" checked="checked" />
              <label for="poker">I would like to participate in airport poker (<a href="/poker">more info</a>)</label>
          </div>
          </div>
          <div class="row">
          <div class="input-field col s12 m12 l12">
              <input name="route" type="text" id="route" class="validate"/>
              <label for="route">Flightplan Route</label>
          </div>
          </div>
          <div class="row">
            <button class="btn waves-effect waves-light blue darken-1" type="submit" name="submit" style="width=100%">File Booking</button>
          </div>
        {!!Form::close()!!}
        </div>
      </div>

	</body>
	<footer class="page-footer blue darken-1">
	          <div class="container blue darken-1">
	            <div class="row">
	              <div class="col l6 s12">
	                <h5 class="white-text">About</h5>
	                <p class="grey-text text-lighten-4">Sixteen years running, Tea Party has been a staple of the Boston ARTCC. Come and join us in a spectacular afternoon of fun and ATC.</p>
	              </div>
	              <div class="col l4 offset-l2 s12">
	                <h5 class="white-text">Links</h5>
	                <ul>
	                  <li><a class="grey-text text-lighten-3" href="http://bostonartcc.net">Boston ARTCC</a></li>
	                  <li><a class="grey-text text-lighten-3" href="http://forums.bostonartcc.net/">Forums</a></li>
	                  <li><a class="grey-text text-lighten-3" href="http://vatusa.net">VATUSA</a></li>
	                  <li><a class="grey-text text-lighten-3" href="http://vatsim.net">VATSIM</a></li>
	                </ul>
	              </div>
	            </div>
	          </div>
	          <div class="footer-copyright blue darken-6">
	            <div class="container">
	            © 2015 Erik Partridge and the Virtual Boston ARTCC
	            </div>
	          </div>
	        </footer>
          <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63783867-1', 'auto');
  ga('send', 'pageview');
</script>
<script>
$('#departs').on('input', function() {
          var departs = $('#departs').val();
          var arrives = $('#arrives').val();
          $("#route").val("Searching...");
          if(departs.length === 4 && arrives.length === 4){
            $.ajax({
              url:"https://www.kimonolabs.com/api/ondemand/71j7qufk?&origin=" + departs + "&destination=" + arrives,
              crossDomain: true,
              dataType: "jsonp",
              success: function (response) {
                var pref = response['results']["collection1"][0]['preferred'];
                $('#route').val(pref);
              },
              error: function (xhr, status) {
                $('#route').val('DCT')
              }
            
          });
          }
      }); 
      $('#arrives').on('input', function() {
          var departs = $('#departs').val();
          var arrives = $('#arrives').val();
          $("#route").val("Searching...");
          if(departs.length === 4 && arrives.length === 4){
            $.ajax({
              url:"https://www.kimonolabs.com/api/ondemand/71j7qufk?&origin=" + departs + "&destination=" + arrives,
              crossDomain: true,
              dataType: "jsonp",
              success: function (response) {
                var pref = response['results']["collection1"][0]['preferred'];
                $('#route').val(pref);
              },
              error: function (xhr, status) {
                $('#route').val('DCT')
              }
            
          });
          }
      });
      </script>
	<script>
		$(document).ready(function(){

			$('select').material_select();
			$(".button-collapse").sideNav();
			$('.menu').smint(); 
		});
	</script>
</html>