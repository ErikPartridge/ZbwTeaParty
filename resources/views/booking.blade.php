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
            <p><b>ID</b>&nbsp;(put this in your remarks)</p>
            <p>TP-{{$flight->id}}</p>
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
              Yes @else No @endif
            </p>
            </div>
        </div>
        <div class="row">
          <div class="col s12 m6 l6">
            <p><b>Cruise Altitude</b></p>
            <p>{{$flight->altitude}}</p>
          </div>
          <div class="col s12 m6 l6">
            <p><b>Route</b></p>
            <p>{{$flight->route}}</p>
            </div>
        </div>
        @if(!$flight->booked)
        <div class="row">
          <div class="col s12 m12 l12">
            <a href="#pilot-details" class="btn waves waves-collapse modal-trigger">Book</a>
        </div>
        @endif
      </div>
      </div>
      <div id="pilot-details" class="modal">
        <div class="model-content">
          {!!Form::open(array('url' => '/booking/create', 'method' => 'post'))!!}
            <div class="input-field">
              <input name="name"id="name" type="text" class="validate">
              <label for="name">First Name</label>
            </div>
            <div class="input-field">
              <input name="cid"id="cid" type="text" class="validate">
              <label for="cid">CID</label>
            </div>
            <div class="input-field">
              <input name="email"id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
            <div class="input-field">
              <input value="{{$uuid}}"id="name" type="hidden" class="">
            </div>
            <button class="btn submit">Submit</button>
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
          @if(Session::has('success'))
            <script>toastr.success('Your flight has been booked, you will receive an email soon.', 'Success', {timeOut: 50000});</script>
          @endif
          @if(Session::has('failed'))
            <script>toastr.error('Something went wrong, either try again, or go back.', 'Failure!');</script>
          @endif
          <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63783867-1', 'auto');
  ga('send', 'pageview');
</script>
	<script>
		$(document).ready(function(){

			$('select').material_select();
			$(".button-collapse").sideNav();
      $('.modal-trigger').leanModal();
			$('.menu').smint();
		});
	</script>
</html>