<form id="form" method="post">
<div class="row">
        <h1 class="mb-5">Vente de Crédit</h1>
    </div>
    <div class="form-row">
        <div class="col" id="tt">
        <input name="tel" id="tel" type="number" class="form-control" placeholder="Numéro de Tel">
        </div>
        <div class="col">
        <input name="mnt" id="mnt" type="number" class="form-control" placeholder="Montant Crédit">
        </div>
        <button id="btnValider" type="button" class="btn btn-primary">Valider</button>
    </div>
</form>

<script>

    $('#btnValider').click(function(){
        const tel = $('#tel').val();
        const mnt = $('#mnt').val();
        //console.log($('form').serialize());
        if(tel == '' || mnt ==''){
            return false;
        }

        $.ajax({
                type: "POST",
                url: "http://localhost/LIVE_AJAX/data/saveVente.php",
                //data: $('form').serialize(),
                data: {tel:tel,mnt:mnt},
                dataType: "JSON",
                success: function (data) {
                   if(data){
                       $('#table').load('pages/table',{date:1}); 
                      /* 
                      OU BIEN
                      $('#tbody').append(`
                        <tr class="text-center">
                            <td>nouvelleHeure</td>
                            <td>nouveauTel</td>
                            <td>nouveauMont</td>
                        </tr>
                    `)*/
                   }
                }
            });
    })
</script>