let panierToggle = document.querySelector(".lna_shop");
let panier = document.querySelector(".myModal");

panierToggle.addEventListener("click", (e) => {

    if (panier.classList.contains("d-none")){
        panier.classList.remove("d-none");
        panier.classList.add("is-activated");
    }else {
        panier.classList.add("d-none");
        panier.classList.remove("is-activated");
     }
    e.stopImmediatePropagation();
});

// On ajoute un évènement click sur le document pour fermer le offcanva
document.addEventListener('click', function(event) {
    // Si on clique en dehors du offcanva on lance la fonction closeModal
        if (!event.target.closest('.is-activated')) {
            let panierToggle = document.querySelector(".is-activated");
            if (panierToggle){
                panierToggle.classList.add('d-none');
            }
        }
        },
        false   
)