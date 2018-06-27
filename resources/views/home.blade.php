<meta name="viewport" content="width=device-width, initial-scale=1">
@extends('layouts.app')

@section('content')

<div class="videoetbouton">
    <video width="100%" autoplay loop>
      <source src="Media/VideoPAMute.mp4" type="video/mp4">
    </video>
    <a class="btn-decouvre" href="">Je découvre</a>
  </div>      

  <div style="text-align:center; margin-top:50px;">
    <p>Loc’ By Life Immo est une agence spécialisée dans le domaine de la location. <br> Elle propose différents services allant de la location de bien immobilier à la proposition de packs pour les bailleurs, avec des services <strong> ne dépassant pas les 399 € !</strong><br><br><br></p>
   <h1>Pour vous bailleurs …</h1>
    <p>Choisissez le pack correspondant à vos besoins, sans dépasser les 399 € ! *</p> 
    <br>
  </div>

  <div></div>

  <div class="introbailleur">
    
    <img src="Media/fondpa.jpg" width="100%" height="500px">
    <div class="container intropack" style="text-align:center;">
      <div class="row intropackrow">
        <div class="col-md-4">
          <img src="Media/packcomp.png" width="90%">
          <br>
          <br>
          <h1 style="color:white;">PACK <br> COMPLET</h1>
          <p>Un service professionnel complet à un prix imbattable.</p>
        </div>
        <div class="col-md-4">
          <img src="Media/summerpack.png" width="90%">
          <br>
          <br>
          <h1 style="color:white;">SUMMER <br> PACK</h1>
          <p>Le service professionnel de base à un prix imbattable.</p>
        </div>
        <div class="col-md-4">
          <img src="Media/packàlacarte.png" width="90%">
          <br>
          <br>
          <h1 style="color:white;">PACK À<br> LA CARTE</h1>
          <p>Choix des services en fonction de vos besoins.</p>
        </div>
      </div>
    </div>

  </div>

   <div style="text-align:center; margin-top:50px; margin-bottom:50px;">
    <h1>Pour vous locataires …</h1>
  </div>

  <div class="introlocataire" style="text-align:center;">
    <img src="Media/fondpa.jpg" width="100%" height="160px">
    <p>Trouvez l’appartement ou la maison de vos rêves chez Loc’ By Life Immo !</p>
    <a class="voirannonce" href="locataire-biens.php">Voir les annonces</a>
  </div>

  <p style="margin-top:50px; margin-bottom:50px;"><span style="color:grey;"> * Rassurez-vous, il sera toujours possible de changer d’avis lors du rendez-vous avec le conseiller. Pas de paiements en ligne.</span></p>

  @endsection
