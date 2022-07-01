let compteToggle = document.querySelector(".lna_header_icon");
let compte = document.querySelector(".gestionDeCompteModal");

compteToggle.addEventListener("click", (e) => {
    if (compte.classList.contains("d-none")){
        compte.classList.remove("d-none");
        compte.classList.add("is-activated");
    }else if (compte.classList.contains("is-activated")){   // Si on clique sur le boutton alors que la modal est ouverte, redirection vers la page gestion de compte
        window.location.href = "monComtpe.php";
    }else {
        compte.classList.add("d-none");
        compte.classList.remove("is-activated");
     }
    e.stopImmediatePropagation();
});

// On ajoute un évènement click sur le document pour fermer le offcanva
document.addEventListener('click', function(event) {
    // Si on clique en dehors du offcanva on lance la fonction closeModal
        if (!event.target.closest('.is-activated')) {
            let compteToggle = document.querySelector(".is-activated");
            if (compteToggle){
                compteToggle.classList.add('d-none');
            }
        }
    },
    false   
)