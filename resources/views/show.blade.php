<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head></head>
<body>


<h1>{{$tutoringOffer->headline}}</h1>

<p>{{$tutoringOffer->subject}}</p>
<p>{{$tutoringOffer->description}}</p>
<hr/>

<a href="/">Zurück zur Übersicht</a>

</body>
</html>
