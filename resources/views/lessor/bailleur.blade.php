@extends('layouts.app')

@section('content')



<script>
  var total = 0;
  var com2 = -1.2;
  var photo3602 = -2.1;
  var fly2 = -3.3;
  var rdv2 = -4.5;
  var can2 = -5.4;
  var vis2 = -6.7;
  var dos2 = -7.6;
  var bail2 = -9.8;
  var edl2 = -10.9;
  var dosc2 = -11;
  var vod2 = -12;
  var retour = 0;


function inverseOption(idOption){
  switch(idOption) {
    case 'com':
        com2 = com2-2*com2;
        retour = com2;
        break;
    case 'vod':
        vod2 = vod2-2*vod2;
        retour = vod2;
        break;
    case '360':
        photo3602 = photo3602-2*photo3602;
        retour = photo3602;
        break;
    case 'fly':
        fly2 = fly2-2*fly2;
        retour = fly2;
        break;
    case 'rdv':
        rdv2 = rdv2-2*rdv2;
        retour = rdv2;
        break;
    case 'can':
        can2 = can2-2*can2;
        retour = can2;
        break;
    case 'vis':
        vis2 = vis2-2*vis2;
        retour = vis2;
        break;
    case 'dos':
        dos2 = dos2-2*dos2;
        retour = dos2;
        break;
    case 'bail':
        bail2 = bail2-2*bail2;
        retour = bail2;
        break;
    case 'edl':
        edl2 = edl2-2*edl2;
        retour = edl2;
        break;
    case 'dosc':
        dosc2 = dosc2-2*dosc2;
        retour = dosc2;
        break;
    default:
        break;
      }
}


  function price(id){
    inverseOption(id);
    total = total + retour;
    m2();

    }

  function m2(){
      var m22 = document.getElementById("m22").value;
      var para = document.getElementById("prix");
      var inputPrice = document.getElementById("prixOption");
      console.log(total +" "+m22)
      var valeur = m22*total;
      if (valeur >= 399){
        para.innerHTML = "valeur : " + 399;
        inputPrice.value = 399
      }else{
        para.innerHTML = "valeur : " + valeur;
        inputPrice.value = valeur;
      }
      return m22;
    }

</script>



<form method="post" action="/bailleur/pack/save">
  @csrf

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
          
          <input id="prixOption" type="hidden" name="priceOption"  />
          <input type="submit" value="Continuer" />
        </div>
        </div>
</form>
      
      <p id="prix"> VALEUR </p>


@endsection