<html>

<body>
<?php use App\Pilot; use App\Flight; $pilot = Pilot::find($pid); $flight= Flight::find($fid)?>
<p>Dear {{$pilot->first}},</p>
<p>The scent of jet fuel is wafting through the air, and we're getting our radar scopes ready for your arrival. That's right-- today is Tea Party.</p>
<p>This is just a friendy reminder that your flight departs in a couple of hours, so bot #{{rand(10,99)}} gathered some resources to help you prepare for your flight.</p>
<p>Without further ado, here's your <a href="https://cert.vatsim.net/fp/file.php?
2={{$flight->callsign}}&amp;3={{$flight->aircraft_type}}&amp;4=300&amp;5={{$flight->departs}}&amp;6={{$flight->departure}}&amp;7={{$flight->altitude}}&amp;8={{str_replace(' ', '+', $flight->route)}}&amp;9={{$flight->arrives}}&amp;10a=0&amp;10b=0&amp;11=Boston+Tea+Party+2015+TP-{{$flight->id}}&amp;12a=0&amp;12b=0&amp;13=KBED&amp;14={{$pilot->first}}+{{$pilot->last}}">VATSIM Pre-File Link</a>which will be valid for two hours after you file it.</p>
@if($flight->poker)
<p>Here's also the <a href="http://teaparty.bostonartcc.net/hand/{{$pilot->cid}}/secure_key/manage">link to your poker hand</a>, where you can keep tabs on your hand and discard cards at any given time. Do not share this link.</p>
<p>You can check the status of this flight according to our servers at any time <a href="http://teaparty.bostonartcc.net/poker/TP-{{$flight->id}}/">here.</a>
@endif
<p>Charts for your <a href="http://flightaware.com/resources/airport/{{$flight->departs}}/procedures">departure airport</a> and <a href="http://flightaware.com/resources/airport/{{$flight->arrives}}/procedures">arrival airport</a> are available at the given links.</p>
<p>Lastly, if you have a fun time flying today, we'd love to know. You can give us feedback <a href="http://teaparty.bostonartcc.net/#feedback">here</a>, or through a form we'll be sending out sometime tomorrow.</p>
<br>
<p>Again, thanks for flying with us, you'll be hearing from us once or twice more before everything's all closed up, so until then, safe flying.</p>

<p>Sincerely,</p>

<p>Camden Bruno- BostonARTCC Events Coordinator</p>

</body>

</html>