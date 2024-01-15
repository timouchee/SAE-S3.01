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
            ) {
                // Autorisez le drop dans ce container
                console.log('true')
                return true;
            } else{

                console.log('false')
                return false
            }
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

function soummetreForm(){
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "test.php"); // Remplacez par le chemin de votre page de traitement

    // Ajoutez des champs au formulaire
    var inputUsername = document.createElement("input");
    inputUsername.setAttribute("type", "hidden");
    inputUsername.setAttribute("name", "login");
    inputUsername.setAttribute("value", username);

    var inputPassword = document.createElement("input");
    inputPassword.setAttribute("type", "hidden");
    inputPassword.setAttribute("name", "pwd");
    inputPassword.setAttribute("value", password);

    // Ajoutez les champs au formulaire
    form.appendChild(inputUsername);
    form.appendChild(inputPassword);

    // Ajoutez le formulaire à la page et soumettez-le
    document.body.appendChild(form);
    form.submit();
}
