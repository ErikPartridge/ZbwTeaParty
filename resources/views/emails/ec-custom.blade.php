<?php namespace App; $flight = Flight::find($flight_id);?>
<html>
<p>Dear Camden,</p><br>

<p>{{$name}} has booked the flight {{$flight->callsign}} through the Tea Party website. As this is a custom booking, you'll need to manually approve it (though, if something goes wrong, we'll blame the computer).</p>

			<p><b>Flight Number</b></p>
            <p>{{$flight->callsign}}</p>
            
          
            <p><b>Departure Airport</b></p>
            <p>{{$flight->departs}}</p>
          
          
            <p><b>Arrival Airport</b></p>
            <p>{{$flight->arrives}}</p>
            
       
            <p><b>Departure Time</b></p>
            <p>{{substr($flight->departure, 0, 5)}}z</p>
          
          
            <p><b>Arrival Time</b></p>
            <p>{{substr($flight->arrival, 0, 5)}}z</p>
            
          
            <p><b>Aircraft Type</b></p>
            <p>{{$flight->aircraft_type}}</p>
               
          
            <p><b>Cruise Altitude</b></p>
            <p>{{$flight->altitude}}</p>
          
          
            <p><b>Route</b></p>
            <p>{{$flight->route}}</p>

            <h3><a href="http://teaparty.bostonartcc.net/booking/approve/{{$flight->hash}}/181/1">APPROVE POKER</a></h3>
            <br>
            <h3><a href="http://teaparty.bostonartcc.net/booking/approve/{{$flight->hash}}/181/0">REJECT POKER</a></h3>
            <br>
            <h3><a href="mailto:{{$email}}">Contact the pilot</a></h3>

<p>Sincerely,</p>
<br>
<p>Your Favorite Server #{{rand(100,999)}}</p>
