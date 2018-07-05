<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Une nouvelle commande est arrivée</h2>
    <p>Le client :</p>
    <ul>
      <li><strong>Prénom</strong> : {{ $user['fname'] }}</li>
      <li><strong>Nom</strong> : {{ $user['sname'] }}</li>
      <li><strong>Email</strong> : {{ $user['email'] }}</li>
      <li><strong>tel</strong> : {{ $user['phone'] }}</li>
    </ul>

    <h2> Sa commande </h2>

    <p>Pack : {{$demande['pack']}} </p>
    <p>Services </p>
    @foreach($demande['choixOption'] as $key => $value)
    <p> {{$value}} </p>
    @endforeach

  </body>
</html>