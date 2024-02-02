function allowDrop(event) {
    //console.log('est appele');
    event.preventDefault();
    const draggedElement = document.getElementById(event.dataTransfer.getData("text"));
    const dropTarget = event.target;

    // Assurez-vous que dropTarget est un élément valide avec des classes
    if (dropTarget.classList.contains('zone-depot')) {
        // Obtenez le parent de la zone de dépôt pour vérifier la correspondance
        const parentContainer = dropTarget.parentElement;

        // Assurez-vous que draggedElement et parentContainer existent
        if (draggedElement && parentContainer) {
            // Vérifiez si le type d'élément correspond au container parent
            if ((draggedElement.classList.contains('musique') && dropTarget.id == 'container1') ||
                (draggedElement.classList.contains('sport') && dropTarget.id == 'container2') ||
                (draggedElement.classList.contains('actCultur') && dropTarget.id == 'container3') ||
                (draggedElement.classList.contains('actOrg') && dropTarget.id == 'container4') ||
                (draggedElement.classList.contains('resto') && dropTarget.id == 'container5') ||
                (draggedElement.classList.contains('musique') && dropTarget.id.includes('zoneDepotMusique')) ||
                (draggedElement.classList.contains('sport') && dropTarget.id.includes('zoneDepotSport')) ||
                (draggedElement.classList.contains('actCultur') && dropTarget.id.includes('zoneDepotActCultur')) ||
                (draggedElement.classList.contains('actOrg') && dropTarget.id.includes('zoneDepotActOrga')) ||
                (draggedElement.classList.contains('resto') && dropTarget.id.includes('zoneDepotResto')) 
            ) 
            {
                if(dropTarget.id.includes("container")){
                    return true;
                }else{
                    //Faire en sorte que l'utilisateur doivent respecter l'ordre de réponse
                    var ZonedepotRep = document.getElementsByClassName("reponses");
                                    
                    var i=0;
                    while(dropTarget.id.slice(0,-1)!=ZonedepotRep[i].childNodes[1].id.slice(0,-1)&& i<5){
                        i+=1;
                        
                    }

                    var longueurIdTarget = dropTarget.id.length;
                    var longueurIdZone = ZonedepotRep[i].childNodes[1].id.length;

                    var y =1;

                    while(dropTarget.id.charAt(longueurIdTarget - 1)!=ZonedepotRep[i].childNodes[y].id.charAt(longueurIdZone - 1)&& y<10){
                        y+=2;
                    }
                    if(y==1){
                        if(ZonedepotRep[i].childNodes[3].childElementCount==1 || dropTarget.childElementCount>0 && dropTarget.classList.contains('rep')){
                            return false;
                        }else{
                            return true;
                        }
                    }else{
                        if(ZonedepotRep[i].childNodes[y-2].childElementCount==0 || dropTarget.childElementCount>0 && dropTarget.classList.contains('rep')){
                            return false;
                        }else{
                            return true;
                        }
                    }
                }  
            } else{return false;}
        }
    }
    return false;
}

function drag(event) {
    event.dataTransfer.setData("text", event.target.id);
}

function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("text");
    var draggedElement = document.getElementById(data);
    var dropTarget = event.target;

    // Assurez-vous que l'élément est déposé dans un conteneur
    if (dropTarget.classList.contains('zone-depot') && allowDrop(event)) {
        dropTarget.appendChild(draggedElement); // Déplacer l'élément vers la zone de réponse
    }
}

var zoneDepot = document.getElementsByClassName("zone-depot");
for (let i = 0; i < zoneDepot.length; i++) {
    // Fonction appelée lorsque l'élément draggable entre dans la zone de dépôt
    zoneDepot[i].addEventListener("dragenter", function(event) {
        event.preventDefault();
        zoneDepot[i].style.backgroundColor = "red";
    });
    
    zoneDepot[i].addEventListener('dragover', allowDrop);
    zoneDepot[i].addEventListener('drop', drop);
    
    // Fonction appelée lorsque l'élément draggable quitte la zone de dépôt
    zoneDepot[i].addEventListener("dragleave", function(event) {
        event.preventDefault();
        zoneDepot[i].style.backgroundColor = ""; // Réinitialise la couleur par défaut
    });
    
    // Annulation de l'événement dragover pour permettre l'événement drop
    zoneDepot[i].addEventListener("dragover", function(event) {
        event.preventDefault();
    });
}

function submit_le_tout()
{
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "page5.php"); // Remplacez par le chemin de votre page de traitement
 
    var lst_div_contenaire = document.querySelectorAll(".reponses");


    //console.log("haya");
    lst_div_contenaire.forEach(function (contenaire)
    {

        //contenaire = divi_lst_div_contenant_reponse
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", contenaire.children[0].id);
        var la_lst_value = [];
        for (let index = 0; index < 5; index++) 
        {               
            //divi_contenant_reponse ?
            //console.log(contenaire.children[index]);
            if(contenaire.children[index].childElementCount != 0)
            {
                la_lst_value.push(contenaire.children[index].children[0].textContent);
            }
            //la_lst_value.push(contenaire.children[index].textContent)
        }
        input.setAttribute("value", la_lst_value);
        //console.log(la_lst_value);
        form.appendChild(input);
        //console.log(contenaire.textContent);
         
    });
    var shadow_post = document.querySelector("#shadow_post");
    for (let index = 0; index < 8; index++) 
        {    
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", shadow_post.children[index].id);
        input.setAttribute("value", shadow_post.children[index].value);
        form.appendChild(input);
        }
    // Ajoutez le formulaire à la page et soumettez-le
    document.body.appendChild(form);
    form.submit();




}