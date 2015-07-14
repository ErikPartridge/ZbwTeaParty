<html>

@if($bool)
Flight would've been marked airborne.
@endif
@if(!$bool)
Flight would not have been marked airborne.
@endif
Full output was: {{$bool}}
</html>