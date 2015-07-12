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
      <script src="/js/parsley.min.js"></script>
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
              <li><a href="/#sponsors">Sponsors</a></li>
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
      <div class="container">
        <h3>Your Hand</h3>
        <hr>
        <h6>You have {{intval($queued_cards)}} queued cards that will be dealt once you discard cards.</h6>
        <hr>
        <div class="row">
        	@foreach($cards as $card)
        		<div class="col s4 m2 l2">
        		<?php use App\Deck;?>
        			<p>{{Deck::name($card->type)}}</p>
        			<img width="100%" height="200px" src="/public/cards/{{$card->type}}.svg" alt="{{$card->type}}">
        		</div>
        	@endforeach
        </div>
        <div class="row">
        {!!Form::open(array('url' => '/hand/{{$pilot->cid}}/{{$pilot->secure_key}}', 'method' => 'post', 'id' => 'form-details', 'class' => 'col s12 l12 m12'))!!}
          <div class="row">
          <div class="input-field col s12">
             <select id="card-discard" name="card-discard">
               <option value="0" selected>Choose your card</option>
               @foreach($cards as $card)
               <option value="{{$card->id}}">{{Deck::name($card->type)}}</option>
               @endforeach
             </select>
             <label>Card to Discard **OPTIONAL**</label>
           </div>          	
          </div>
          <div class="row">
            <button class="btn waves-effect waves-light blue darken-1" type="submit" name="submit" style="width=100%">Submit Card to Discard</button>
          </div>
        {!!Form::close()!!}
        </div>
      </div>

	</body>
	<footer class="page-footer blue darken-1">
	          <div class="container blue darken-1">
	            <div class="row">
	              <div class="col l6 m6 s12">
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
		$(document).ready(function(){
      $('#form-details').parsley();
			$('select').material_select();
			$(".button-collapse").sideNav();
			$('.menu').smint(); 
		});
	</script>
</html>