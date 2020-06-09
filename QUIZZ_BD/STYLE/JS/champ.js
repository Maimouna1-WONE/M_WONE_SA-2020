var nbr = 0;
var btnAdd = document.getElementById("btn");

btnAdd.addEventListener("click", () => {
    nbr++;
    var choix = document.getElementById('type_rep');

    var divInputs = document.getElementById("reponse");
    var newInput = document.createElement("div");
    newInput.setAttribute('id', 'plus' + nbr);
    //newInput.setAttribute('class', 'row');
    if (choix.value == "cs") {
        newInput.innerHTML += `REPONSE ${(nbr)} <input type="text" style="width:200px; height:30px;" name="fichiercs[${nbr}]"> <input type="radio" value="${nbr}" name="fichs"> <button style="width:16px;height:20px;" onclick="onDelete(${nbr})" type ="button" style="border:none;"><img style="margin-top:-12px;margin-left:-7px;" src="./STYLE/icones/ic-supprimer.png"/></button>`;
    }
    if (choix.value == "cm") {
        newInput.innerHTML += `REPONSE ${(nbr)} <input type="text" style="width:200px; height:30px" name="fichiercm[${nbr}]"> <input type="checkbox" value="${nbr}" name="fichm[${nbr}]"> <button style="width:16px;height:20px;" onclick="onDelete(${nbr})" type ="button" style="border:none;"><img style="margin-top:-12px;margin-left:-7px;" src="./STYLE/icones/ic-supprimer.png"/></button>`;
    }
    if (choix.value == "ct") {
        if (nbr == 1) {
            newInput.innerHTML += `REPONSE <input style="width:200px; height:100px" type="text" name="fichierct"> <button style="width:16px;height:20px;" onclick="onDelete(${nbr})" type ="button" style="border:none;"><img style="margin-top:-12px;margin-left:-7px;" src="./STYLE/icones/ic-supprimer.png"/></button>`;
        } else {
            alert("Une seule reponse possible");
        }
    }
    divInputs.appendChild(newInput);
});


function onDelete(n) {
    var target = document.getElementById('plus' + n);
    target.remove();
}