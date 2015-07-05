<html>
<p>Dear {{$name}},</p>
<br>
<p>Thanks for booking a flight for the Boston Tea Party. On behalf of all the controllers at ZBW, we look forward to seeing you.</p>
<p>As you created this flight yourself, we'll need to confirm that it is eligible for poker if you were in fact interested in participating in poker. If you marked your interest on the form, you should receive a follow up email in the next couple of days with that confirmation.</p>
<p>Below are the details for your flight, as well as a link to cancel your booking at any time. You will also receive an email 8-12 hours before Tea Party with a final reminder as well as a link to prefile your flightplan.</p>


            <p><b>Flight Number</b></p>
            <p>{{$flight->callsign}}</p>
          
          
            <p><b>ID</b>&nbsp;(put this in your remarks)</p>
            <p>TP-{{$flight->id}}</p>
            
          
            <p><b>Departure Airport</b></p>
            <p>{{$flight->departs}}</p>
          
          
            <p><b>Arrival Airport</b></p>
            <p>{{$flight->arrives}}</p>
            
        
        
          
            <p><b>Departure Time</b></p>
            <p>{{substr($flight->departure, 0, 5)}}z / {{(substr($flight->departure, 0, 2) - 4).substr($flight->departure, 2, 3)}} EDT</p>
          
          
            <p><b>Arrival Time</b></p>
            <p>{{substr($flight->arrival, 0, 5)}}z / {{(substr($flight->arrival, 0, 2) - 4).substr($flight->arrival, 2, 3)}} EDT</p>
            
        
        
          
            <p><b>Aircraft Type</b></p>
            <p>{{$flight->aircraft_type}} or similar</p>
        
        
          
            <p><b>Cruise Altitude</b></p>
            <p>{{$flight->altitude}}</p>
          
          
            <p><b>Route</b></p>
            <p>{{$flight->route}}</p>
<br>
<p>Should you wish to cancel your flight, please send me an email.</p>
<p>Again, thanks for flying with us.</p>

<p>Sincerely,</p>

<p>Camden Bruno, Events Coordinator, Virtual Boston ARTCC</p>

<a href="mailto:events@bostonartcc.net">events@bostonartcc.net</a>

<small>Feel free to reply to this email, we're not big on no-reply</small>