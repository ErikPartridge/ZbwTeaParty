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
        			<li><a href="/#feedback">Feedback</a></li>

      			</ul>
      			<ul id="nav-mobile" class="side-nav">
        			<li><a href="/booking">Book a Flight</a></li>
        			<li><a href="/#about">About</a></li>
        			<li><a href="/#charts">Charts</a></li>
        			<li><a href="/poker">Poker</a></li>
        			<li><a href="/#faq">FAQ</a></li>
        			<li><a href="/#feedback">Feedback</a></li>

      			</ul>
      		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    		</div>
  		</nav>
  		</div>
      <div class="container booking-center">
        <div class="row">
          <div class="col s12 m6 l6">
            <p><b>Flight Number</b></p>
            <p>{{$flight->callsign}}</p>
          </div>
          <div class="col s12 m6 l6">
            <p><b>UUID</b>&nbsp;(put this in your remarks)</p>
            <p>{{strtoupper($uuid)}}</p>
            </div>
        </div>
        <div class="row">
          <div class="col s12 m6 l6">
            <p><b>Departure Airport</b></p>
            <p>{{$flight->departs}}</p>
          </div>
          <div class="col s12 m6 l6">
            <p><b>Arrival Airport</b></p>
            <p>{{$flight->arrives}}</p>
            </div>
        </div>
        <div class="row">
          <div class="col s12 m6 l6">
            <p><b>Departure Time</b></p>
            <p>{{substr($flight->departure, 0, 5)}}z / {{(substr($flight->departure, 0, 2) - 4).substr($flight->departure, 2, 3)}} EDT</p>
          </div>
          <div class="col s12 m6 l6">
            <p><b>Arrival Time</b></p>
            <p>{{substr($flight->arrival, 0, 5)}}z / {{(substr($flight->arrival, 0, 2) - 4).substr($flight->departure, 2, 3)}} EDT</p>
            </div>
        </div>
        <div class="row">
          <div class="col s12 m6 l6">
            <p><b>Aircraft Type</b></p>
            <p>{{$flight->aircraft_type}} or similar</p>
          </div>
          <div class="col s12 m6 l6">
            <p><b>Poker Qualifing</b></p>
            <p>@if($flight->poker)
              yes @else no @endif
            </p>
            </div>
        </div>
        <div class="row">
          <div class="col s12 m4 l4">
            <p><b>Cruise Altitude</b></p>
            <p>{{$flight->altitude}}</p>
          </div>
          <div class="col s12 m8 l8">
            <p><b>Route</b></p>
            <p>{{$flight->route}}</p>
            </div>
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
		$(document).ready(function(){

			$('select').material_select();
			$(".button-collapse").sideNav();
			$('.menu').smint();
		});
	</script>
</html>