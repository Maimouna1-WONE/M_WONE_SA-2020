
const URL_ROOT="index.php?action";

$(function(){
     
     const  $error_message=$("#error_message")
     const $btn_deconnexion=$("#btn_deconnexion")

      //Au chargement on cache le div  Message d'erreur d'un formulaire
        $error_message.hide()

   //Traitement de la Connexion 
   $("#form-connexion").submit((event)=>{ 
            event.preventDefault();
            $form=$("#form-connexion")
            url = $form.attr("action" );
            //Faire ici la Validation du Formulaire

            $.post(url,  $form.serialize() ,
               function(data, status){
                     if(data.trim()!="error"){
                        window.location.replace(`${URL_ROOT}=${data}`)
                     }else{
                        $error_message.show();
                     }
               // 
              });     
    })
    //Page d'inscription du Joueur
    $("#inscription").on("click",function(){
          //Chargent de la vue Inscription dans le fichier layout.php
      const container=$("#container"); 
        container.load(`${URL_ROOT}=inscription`);
    })

    //Traitement de Déconnexion
    $btn_deconnexion.on("click",()=>{
      $.get(`${URL_ROOT}=deconnexion`, (data, status)=>{
               window.location.replace("index.php")
          });
    })


    //Traitement au niveau du Menu Admin

    $(".nav-link").on("click",function(){
       //Récuperation du lien sur lequel l'admin à cliquer
           $lien_encour=$(this);
      //Récuperation de l'url sauvegarder dans l'attribut lien
           const url= $lien_encour.attr("lien");
      //Récuperation de la partie droite de la page layout_admin.php      
           const $container=$("#container-admin"); 
           //Vider le Condenu avant de Faire le Load
             $container.html("")
             $container.load(`${url}`);

})
     

  
});