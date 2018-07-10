<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Nouvelle demande de rendez-vous</h2>
    <p>coordonnées du client</p>
    <ul>
      <li><strong>Prénom</strong> : {{ $user['fname'] }}</li>
      <li><strong>Nom</strong> : {{ $user['sname'] }}</li>
      <li><strong>Email</strong> : {{ $user['email'] }}</li>
      <li><strong>tel</strong> : {{ $user['phone'] }}</li>
    </ul>

    <h2> Sa demande </h2>
    <p> Un rendez-vous pour le : {{$demande['date']}} à {{$demande['time']}}</p>
    <p> Ses autres disponibilités : </p>
    <p>{{$demande['disponibility']}}</p>
    <p> Informations sur le bien qui l intéresse </p>
            <a class="nav-link" href="http://127.0.0.3/bien/{{$bien->id}}">@lang('Le site spécial location')</a><br>
            <a class="nav-link" href="{{$bien->link}}">@lang('Le site principal')</a>

  </body>
</html>