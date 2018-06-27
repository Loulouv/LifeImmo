@extends('layouts.app')

@section('content')

<form method="post" action="bien.php">
        <select id="choixPack" onclick="pack2()" name="pack">
          <option id="choixdupack">
            Choix du pack
          </option>
          <option id="complet">
            Pack complet
          </option>
          <option id="summer">
            Summer Pack
          </option>
          <option id="carte">
            A la carte
          </option>
        </select>
        <div class="container">
        <div class="6u$ 12u$(3)">
          <input onkeyup="m2()" id="m22" /> m2</br>
          <input onchange="price(this.id)" class="choix"  type="checkbox" name="choixOption[]" value="Communication" id="com"/>                 <label for="com">Communication</label><br />
          <input onchange="price(this.id)" class="choix"  type="checkbox" name="choixOption[]" value="Vidéo" id="vod"/>                         <label for="vod">Vidéo</label><br />
          <input onchange="price(this.id)" class="choix" type="checkbox" name="choixOption[]" value="Photo 360" id="360"/>                      <label for="360">Photo 360</label><br />
          <input onchange="price(this.id)" class="choix"  type="checkbox" name="choixOption[]" value="Flyers" id="fly"/>                        <label for="fly">Flyers</label><br />
          <input onchange="price(this.id)" class="choix" type="checkbox" name="choixOption[]" value="Prise de rdv" id="rdv"/>                   <label for="rdv">Prise de rdv</label><br />
          <input onchange="price(this.id)" class="choix"  type="checkbox" name="choixOption[]" value="Présélection des candidats" id="can"/>    <label for="can">Présélection des candidats</label><br />
          <input onchange="price(this.id)" class="choix" type="checkbox" name="choixOption[]" value="Visites" id="vis"/>                        <label for="vis">Visites</label><br />
          <input onchange="price(this.id)" class="choix"  type="checkbox" name="choixOption[]" value="Constitution des dossiers" id="dos"/>     <label for="dos">Constitution des dossiers</label><br />
          <input onchange="price(this.id)" class="choix" type="checkbox" name="choixOption[]" value="Rédaction du Bail" id="bail"/>             <label for="bail">Rédaction du Bail</label><br />
          <input onchange="price(this.id)" class="choix"  type="checkbox" name="choixOption[]" value="Rédaction de l\'EDL" id="edl"/>           <label for="edl">"Rédaction de l\'EDL"</label><br />
          <input onchange="price(this.id)" class="choix" type="checkbox" name="choixOption[]" value="Remise du dossier complet" id="dosc"/>     <label for="dosc">Remise du dossier complet</label><br />
          ;
          if(isset($_SESSION['token'])){
            echo'
            <input type="hidden" name="userEmail" value="'.$userMail[0].'" />';
          }
      
          echo'
          <input id="prixOption" type="hidden" name="priceOption"  />
          <input type="submit" value="Continuer" />
        </div>
        </div>
          </form>';
      
       ?>
      <p id="prix">
        VALEUR
      </p>


@endsection