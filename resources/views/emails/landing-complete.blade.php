<html>

<p>Dear {{$first}},</p>

<p>{{$callsign}} has been logged as landed and completed. If this was your first flight, two cards have been dealt to you, otherwise, one card has been dealt to you.</p>
<hr>
<p>This makes your entire hand:</p>
@foreach(explode(' ', $cardList) as $newCard)
	<img src="http://teaparty.bostonartcc.net/cards/{{$newCard}}.svg" alt="{{$newCard}}" style="width:150px;height:250px;">
@endforeach
<p>There are {{$queuedCards}} that will be dealt to you once you discard a card (only discard a card if you have 5 in your hand, discarding is completely optional). You may manage your hand at http://teaparty.bostonartcc.net/hand/{{$cid}}/{{$secure_key}}/manage</p>

<p>On behalf of everyone at the Boston ARTCC, thanks for flying with us.</p>
</html>