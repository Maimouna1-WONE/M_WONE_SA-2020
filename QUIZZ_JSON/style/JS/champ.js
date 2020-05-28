document.getElementById("type").addEventListener("click", create_champ(i));
function create_champ(i) {
  var choix = document.getElementById('type').value;
  if(choix =="cs"){
    var i2 = i + 1;
    document.getElementById('leschamps['+i+']').innerHTML = 
    '<span id="ligne['+i+']">REP'+(i-1)+'<input style="width:400px; height:30px" type="text" name="fichier['+i+']" id="fichier['+i+']"><input type="radio" name="fich" id="fichier1['+i+']" value="'+(i-1)+'" ><button type=submit style="width:16px;height:20px;" onclick="suppr('+i+')"><img style="margin-top:-3px;margin-left:-7px;border:none;" src="./style/icone/ic-supprimer.png"/></button><br/></span>'; 
    document.getElementById('leschamps['+i+']').innerHTML +=
    '<span id="leschamps['+i2+']"><button type=submit style="width:38px;height:38px;border-radius:1px;border:none; margin-left:2px;" onclick="create_champ('+i2+');"><img style=" margin-top:-2px; margin-left:-7px;" src="./style/icone/ic-ajout-reponse.png"/></button></span>';
  } 
  if(choix =="cm"){
    var i2 = i + 1;
    document.getElementById('leschamps['+i+']').innerHTML = 
    '<span id="ligne['+i+']">REP'+(i-1)+'<input style="width:400px; height:30px" type="text" name="fichier1['+i+']" id="fichier['+i+']"><input type="checkbox" name="fich1['+i+']" id="fichier1['+i+']" value="'+(i-1)+'" ><button type=submit style="width:16px;height:20px;" onclick="suppr('+i+')"><img style="margin-top:-3px;margin-left:-7px;border:none;" src="./style/icone/ic-supprimer.png"/></button><br /></span>'; 
    document.getElementById('leschamps['+i+']').innerHTML +=
    '<span id="leschamps['+i2+']"><button type=submit style="width:38px;height:38px;border-radius:1px;border:none; margin-left:2px;" onclick="create_champ('+i2+');"><img style=" margin-top:-2px; margin-left:-7px;" src="./style/icone/ic-ajout-reponse.png"/></button></span>'; 
  }
  if(choix =="ct"){
    var i2 = i + 1;
    document.getElementById('leschamps['+i+']').innerHTML = 
    '<span id="ligne['+i+']">REP<input style="width:400px; height:100px" type="text" name="fichierT" id="fichierT['+i+']"><button type=submit style="width:16px;height:20px;" onclick="suppr('+i+')"><img style="margin-top:-3px;margin-left:-7px;border:none;" src="./style/icone/ic-supprimer.png"/></button><br /></span>'; 
  }
}
function suppr(i){ 
  document.getElementById("ligne["+i+"]").innerHTML="";
} 