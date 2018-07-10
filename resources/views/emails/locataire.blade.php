<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Votre demande de rendez-vous</h2>
    <p>Vos coordonnées</p>
    <ul>
      <li><strong>Prénom</strong> : {{ $user['fname'] }}</li>
      <li><strong>Nom</strong> : {{ $user['sname'] }}</li>
      <li><strong>Email</strong> : {{ $user['email'] }}</li>
      <li><strong>tel</strong> : {{ $user['phone'] }}</li>
    </ul>

    <h2> Votre demande </h2>
    <p>Vous avez demandé un rendez-vous pour le : {{$demande['date']}} à {{$demande['time']}}</p>
    <p>Vos autres disponibilités : </p>
    <p>{{$demande['disponibility']}}</p>
    <p> Informations sur le bien qui vous intéresse </p>      
            <a class="nav-link" href="{{$bien->link}}">@lang('Notre site principal')</a><br>
            <a class="nav-link" href="http://127.0.0.3/bien/{{$bien->id}}">@lang('Notre site spécial location')</a>

  </body>
</html>