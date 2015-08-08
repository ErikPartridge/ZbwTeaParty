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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
  		<link rel="stylesheet" href="/css/main.css">
	</head>
	<body>
		<div class="navbar-fixed">
		<nav class="blue darken-1 menu" role="navigation">
    		<div class="nav-wrapper"><a id="logo-container" href="/" class="brand-logo left" style="margin-left:6%;">Tea Party 2015</a>
      			<ul class="right hide-on-med-and-down" style="margin-right:5%;">
        			<li><a href="/booking">Book a Flight</a></li>
        			<li><a href="#about">About</a></li>
        			<li><a href="#charts">Charts</a></li>
          			<li><a href="/poker">Poker</a></li>
        			<li><a href="#faq">FAQ</a></li>
              <li><a href="#sponsors">Sponsors</a></li>
        			<li><a href="#feedback">Feedback</a></li>

      			</ul>
      			<ul id="nav-mobile" class="side-nav">
        			<li><a href="/booking">Book a Flight</a></li>
        			<li><a href="#about">About</a></li>
        			<li><a href="#charts">Charts</a></li>
        			<li><a href="/poker">Poker</a></li>
        			<li><a href="#faq">FAQ</a></li>
        			<li><a href="#sponsors">Sponsors</a></li>
              <li><a href="#feedback">Feedback</a></li>

      			</ul>
      		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    		</div>
  		</nav>
  		</div>
      <br>
      <div id="slideshow" style="width:90%;height:45%;margin:auto;">
      </div>
  		<div class="container">
  			<div id="about">
  				<h3>About Tea Party</h3>
  				<p>Welcome to the 16th annual Boston Tea Party. For seven hours on August 8th, controllers from vZBW will come together in Nashua, NH for a day of fun for controllers and pilots alike. Not only will Boston Logan staffed to the hilt, but we also plan to staff many of our smaller airports, such as Hartford-Bradley, Providence, Albany, and the variety of airports on the Cape. All airports in the ZBW airspace will have at least center coverage.</p>
  				<p>During Tea Party, you'll be able to share the fun with many pilots. Last year, virtual Boston had more traffic than real Boston did during the same timespan, and numbers were comparable at Bradley International. Where ever you choose to fly during Tea Party rest assured you will not be alone.</p>
  			</div>
  			<hr>

  			<!--- START CHARTS-->
  			<div id="charts">
  				<h3>Charts</h3>
  				<p>Save yourself some time, and get your charts here!</p>
  				<div class="row input-field">
  					<form>
  					<div class="col s8 m8 l8">
  						<select id="airport-select-charts">
  							<option value="KBOS" selected>Boston Logan Int'l</option>
  							<option value="KBDL">Bradley Int'l</option>
  							<option value="KPVD">Providence TF Greenstate</option>
  							<option value="KALB">Albany Int'l</option>
  							<option value="KACK">Nantucket</option>
  							<option value="KSYR">Syracuse Int'l</option>
  							<option value="KBGR">Bangor Int'l</option>
  							<option value="KMVY">Martha's Vineyard</option>
  							<option value="KMHT">Manchester</option>
  							<option value="KBED">Bedford</option>
  							<option value="KHFD">Hartford Downtown</option>
  							<option value="KBTV">Burlington</option>
  							<option value="KPWM">Portland, ME</option>
  							<option value="KEWB">New Bedford</option>
  						</select>
  					</div>
  					<div class="col s4 m4 l4">
  						<a class="btn waves-effect waves-light blue darken-1" id="charts-search" type="submit" name="go" style="margin-left:20%;">Go
    <i class="mdi-content-send right"></i>
  						</a>
  					</div>
  					</form>
  				</div>
  			</div>
  			<!---END CHARTS-->
  			<hr>
  			<!-- START FAQ -->
  			<div id="faq">
  				<h3>FAQ</h3>
  				<p><b>Q:</b>&nbsp;Do I need to make a booking to participate?</p>
  				<p><b>A:</b>&nbsp;No. However, if you can it is recommended. That said, it's better to fly without a booking than not to fly.</p>
  				<p><b>Q:</b>&nbsp;My airliner is not RNAV capable, what should I do?</p>
  				<p><b>A:</b>&nbsp;Try fly as close to the preferred route as possible. At Boston, replace ROBUC1 with ORW6, QUABN3 with GDM4, and OOSHN3 with SCUPP DCT. Also, please file the appropriate equipment suffix.</p>
  				<p><b>Q:</b>&nbsp;I want to fly VFR, is that cool?</p>
  				<p><b>A:</b>&nbsp;Of course! We love VFR here at ZBW, and we'd be glad to serve you. Before you fly, you are strongly encouraged to file an VFR flightplan, and also please be familiar with airspace classes in the United States.</p>
  				<p><b>Q:</b>&nbsp;I have the default scenery at KBOS-- will that be a problem?</p>
  				<p><b>A:</b>&nbsp;Short answer? Yes, it will be a problem. Our controllers will do their best to accommodate you if you notify them but it may result in delays due to missing taxiways. We recommend the <a href="http://www.flytampa.org/kbos.html">FlyTampa KBOS</a> if you are willing to spend money, and there is a nice freeware <a href="http://flyawaysimulation.com/downloads/files/7550/fsx-logan-international-airport-scenery/">here</a>. X-Plane users, don't worry your scenery is up to date.</p>
  				<p><b>Q:</b>&nbsp;What airports will be staffed?</p>
  				<p><b>A:</b>&nbsp;All of ZBW's airports. Approach/Departure will be online and providing top down service at a number of airports, both Bradley (KBDL) and Boston (KBOS) will be fully staffed, and center will provide top down service for all towered airports in ZBW airspace.</p>
  				<p><b>Q:</b>&nbsp;I'm a part of a virtual airline-- should I still make a booking?</p>
  				<p><b>A:</b>&nbsp;If you want to. If you're part of a group flight (5 people or more), please drop our <a href="mailto:events@bostonartcc.net">events coordinator an email</a> so he can best plan.</p>
  				<p><b>Q:</b>&nbsp;I don't have a working microphone, what should I do?</p>
  				<p><b>A:</b>&nbsp;Try to operate in at least voice receive mode, and file as such by putting /r/ in your remarks.</p>
          <p><b>Q:</b>&nbsp;What should I do when a controller says to descend via?</p>
          <p><b>A:</b>&nbsp;Meet all the published altitude, speed, and heading restrictions on the STAR you are on. Also, a runway transition will be issued, enter that runway into your FMC and meet the restrictions for that transition. For example, on the ROBUC1 STAR into Boston, you should cross GIGTY at or above FL210 and at or below FL230 when given the descend via.</p>
          <p><b>Q:</b>&nbsp;What is a PDC and how do I use it?</p>
          <p><b>A:</b>&nbsp;A pre-departure clearance is an IFR clearance via private message and contains all the information contained in a regular voice clearance. However, when calling for taxi be sure to call in with the current ATIS code, your squawk code, and your standard instrument departure.</p>
  			</div>
  			<!-- END FAQ -->
  			<hr>
        <!--- START SPONSORS -->
        <div id="sponsors">
          <h3>Sponsors</h3>
          <p>Be sure to compete in <a href="/poker">airport poker</a> by <a href="/booking">booking, then flying flights during Tea Party</a>. Those with the best hands* will win prizes from our great sponsors.</p>
          <div class= "row">
          <div class="col s12 m6 l6">
            <h6>One (1) License for any Product from Flysimware Simulation Studios</h6>
            <a href="http://www.flysimware.com/FLYSTORE_2015/en/"><img width="90%" src="/flysimware.jpg"></a>
          </div>
          <div class="col s12 m6 l6">
            <h6>One (1) License for the Carenado H850XP</h6>
            <a href="http://www.carenado.com/CarSite/Portal/index.php"><img width="90%" src="/logocarenado.png"></a>
          </div>
          </div>
          <div class="row">
          <div class="col s12 m6 l6">
            <h6>Two (2) licenses of Active Sky products of their choice from HiFi</h6>
            <a href="http://www.hifitechinc.com/"><img src="/hifi.png"></a>
          </div>
          <div class="col s12 m6 l6">
            <h6>One (1) License for any Orbx product</h6>
            <a href="https://fullterrain.com/"><img width="40%" src="/orbx.jpg"></a>
          </div>
          </div>
          <div class="col s12 m6 l6">
            <h6>One (1) License for any product from ATC Simulator </h6>
            <a href="http://www.atcsimulator.com/"><img src="/atcsim2.png"></a>
          </div>
        </div>



  			<!-- START FEEDBACK FORM-->
  			<div id="feedback">
          <h3>Feedback</h3>
          <p>We strive to provide you with the best service possible here at ZBW, and truly your feedback is our paycheck. So, please, take the thirty seconds and fill out the following form letting us know how we did.</p>
          <p>The feedback form is available <b><a href="http://bostonartcc.net/feedback/">here</a></b>, thank you.</p>
            {!!Form::open(array('url' => 'feedback', 'method' => 'POST'))!!}
            <div class="row">
              <div class="input-field col m6 l6 s6">
                    <input id="your_name" name="your_name" type="text" class="validate" required>
                    <label for="your_name">Your Name</label>
                </div>
                <div class="input-field col m6 l6 s6">
                    <input id="cid" name= "cid" type="text" class="validate" required>
                    <label for="cid">Your CID</label>
                </div>
            </div>
            <div class="row">
              <div class="input-field col m12 l12 s12">
                    <input id="email" name="email" type="email" class="validate" required>
                    <label for="email">Your Email</label>
                </div>
            </div>
            <div class="row">
              <div class="input-field col m6 l6 s6">
                    <select name="controller" id="controller">
                      <option value="Everyone">Everyone</option>
                      <option value="All KBOS">All Boston (KBOS)</option>
                      <option value="All KPVD">All Providence (KPVD)</option>
                      <option value="All CTR">All BOS_CTR</option>
                      <option value="BOS_LS_CTR">BOS_LS_CTR</option>
                      <option value="BOS_LN_CTR">BOS_LN_CTR</option>
                      <option value="BOS_H_CTR">BOS_H_CTR</option>
                      <option value="BOS_S_APP">BOS_S_APP</option>
                      <option value="BOS_N_APP">BOS_N_APP</option>
                      <option value="BOS_F_APP">BOS_F_APP</option>
                      <option value="BOS_TWR">BOS_TWR</option>
                      <option value="BOS_GND">BOS_GND</option>
                      <option value="BOS_DEL">BOS_DEL</option>
                      <option value="PVD_APP">PVD_APP</option>
                      <option value="PVD_TWR">PVD_TWR</option>
                      <option value="PVD_GND">PVD_GND</option>
                      <option value="CAPE_APP">CAPE_APP</option>
                      <option value="ACK_TWR">ACK_TWR</option>
                      <option value="BDL_APP">BDL_APP</option>
                      <option value="BDL_TWR">BDL_TWR</option>
                      <option value="BGR_APP">BGR_APP</option>
                      <option value="BGR_TWR">BGR_TWR</option>
                      <option value="PWM_APP">PWM_APP</option>
                      <option value="PWM_TWR">PWM_TWR</option>
                      <option value="BTV_APP">BTV_APP</option>
                      <option value="SYR_APP">SYR_APP</option>
                      <option value="ALB_APP">ALB_APP</option>
                      <option value="MHT_APP">MHT_APP</option>
                      <option value="ALB_TWR">ALB_TWR</option>
                      <option value="MHT_APP">MHT_TWR</option>
                    </select>
                    <label for="controller">The controller(s) who get feedback</label>
                </div>
                <div class="input-field col m6 l6 s6">
                  <select name="rating" id="rating">
                    <option value="Excellent">Excellent</option>
                    <option value="Great">Great</option>
                    <option value="Good">Good</option>
                    <option value="Average">Average</option>
                    <option value="Fair">Fair</option>
                    <option value="Poor">Poor</option>
                  </select>
                  <label for="rating">Quality of the service</label>
                </div>
            </div>
            <div class="row">
                <label for="message">Comments</label>
              <textarea name="message" id="message" class="materialize-textarea"></textarea>
            </div>
            <div class="row">
              <div class="col m6 l6 s6">
              <p>
                  <input type="checkbox" id="response" name="response"/>
                  <label for="response">Would like a response</label>
              </p>
              </div>
              <div class="col m6 l6 s6">
                <button class="btn waves-effect waves-light blue darken-1" id="charts-search" type="submit" name="send" style="margin-left:20%;">Send
                <i class="mdi-content-send right"></i>
                </button>
              </div>
            </div>
          </div>
          {!!Form::close()!!}
        </div>
  			<!-- END FEEDBACK FORM -->
  		</div>
	</body>
	<footer class="page-footer blue darken-1">
	          <div class="container blue darken-1">
	            <div class="row">
	              <div class="col l6 s12">
	                <h5 class="white-text">About</h5>
	                <p class="grey-text text-lighten-4">Sixteen years running, Tea Party has been a staple of the Boston ARTCC. Come and join us in a spectacular afternoon of fun and ATC.</p>
                  <p class="white-text">Credit for <a href="https://www.flickr.com/photos/seandavis/16228683011/in/photolist-qJ5f4v-2LsbmW-y54YE-9NGcbW-9NKoA3-ecq97c-3nUZw5-4RKxJ2-5AVDTY-y55iH-4RKDxc-y55sY-y55DK-y5592-2LnMtT-4RPGwb-4RPX47-4RQ11J-f8xc28-2Ls9rs-4RPWu3-4RKKf6-4RPV6f-4RKKwK-btieF-4RPU49-4RPFdU-2LnQPp-2Ls7PQ-4RPHtJ-4RKvBi-4RPFCf-4RPFYf-4RPF1A-4RKuMP-4RPE4s-2LnHzF-9ieJwp-4RKPQi-7Nqkqf-4RKNXr-4RPFMW-5AVCQo-5AVDoN-4RPJ4S-4RPHdq-4RKx98-5AVEj5-5ARk6H-5AVBCm">"Taxi"</a> image to Sean Davis, and <a href="http://www.flickr.com/photos/flyforfun/5580646962/in/photolist-9v9gV5-7ZkTEb-7ZkUYo-7Zdmpr-7ZhHFz-7ZhH4r-7ZdmbF-7ZkWib-7ZhFHx-9S6x3L-7ZhXtc-6fhU2G-5ihd1f-7ZhJiK-5Yverc-8bL7LC-5eDxYU-94dvps-nGmmfi-4xWEsB-r5DbTf-qqdbgq-9pCNKT-f7R22Z-9vFQo7-epc56q-so4DE-6brjCU-5nuNYM-r5Dccw-qqdb6W-HazkC-5Uq4wN-65q3aT-4y1UfW-4xWEfp-4xWE9Z-4xWEHr-4xWE8k-4y1UMd-4xWEjp-4xWEpt-4y1UHf-4xWEkT-4xWEdn-4xWE6x-4y1Uku-4y1UpQ-4xWEPx-4y1UP3">"Welcome home"</a> to flickr user Kent Wien, Blue Angels to ZBW Member Alec Liberman, all others to ZBW Member Michael Bertolini.</p>
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
	            <p class="white-text">© 2015 Erik Partridge and the Virtual Boston ARTCC</p>
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
      $('#slideshow').backstretch([
        "/bradley.jpg"
        , "/runway.jpg",
        "/rwy4r.jpg",
        "/blue-angels.jpg"
      ], {duration: 2000, fade: 1000});
			$('select').material_select();
			$(".button-collapse").sideNav();
			$('.menu').smint();
		});
		$('#charts-search').click(function(){
			window.open("http://nfdc.faa.gov/nfdcApps/services/airportLookup/airportDisplay.jsp?airportId=" + $("#airport-select-charts option:selected").val());
		});
	</script>
</html>
