let closeOffcanvas = document.querySelector('.offcanvasCloseBtn');
let windowOffcanva = document.querySelector('#offcanvasRight');

// je récupère les boutton qui toggle les sous catégories dans un objet relié au nom de la class du ogffcanvas de la sous catégorie
let secondOffcanvas = [{
        id: '.offcanvasDog',
        name: document.querySelector('#toggleDog')
    },
    {
        id: '.offcanvasCat',
        name: document.querySelector('#toggleCat')
    },
    {
        id: '.offcanvasRat',
        name: document.querySelector('#toggleRat')
    },
    {
        id: '.offcanvasFish',
        name: document.querySelector('#toggleFish')
    },
    {
        id: '.offcanvasSnake',
        name: document.querySelector('#toggleSnake')
    },
    {
        id: '.offcanvasBird',
        name: document.querySelector('#toggleBird')
    }
];

/**
 * Fonction qui ouvre les offcanvas contenant les sous catégories
 * si on clique sur le boutton d'une autre sous catégorie, on ouvre le offcanvas correspondant et on ferme l'ancien
 * si on clique sur le même boutton, on ferme le offcanvas
 * @param {string} canvas 
 */
function toggleCanvas(canvas) {
    let canvastoToggle = document.querySelector(canvas); // je récupère le offcanvas à ouvrir grace à sa class
    let offcanvasActivated = document.querySelector('.isActivated'); // je récupère le offcanvas actif

    if (offcanvasActivated === canvastoToggle) { // si le offcanvas à ouvrir est le même que celui actif, on ferme le offcanvas
        canvastoToggle.style.right = '-250px';
        canvastoToggle.classList.remove('isActivated');
    } else if (offcanvasActivated) { // si un offcanvas est actif, on ferme le offcanvas actif
        offcanvasActivated.classList.remove('isActivated');
        offcanvasActivated.style.right = '-250px';
        if (canvastoToggle) { // si on a fermé un offcanva et qu'on a cliqué sur un autre, on ouvre le nouveau
            canvastoToggle.style.right = '0';
            canvastoToggle.classList.add('isActivated');
        }
    } else { // si aucun offcanvas n'est actif, on ouvre le offcanvas à ouvrir
        canvastoToggle.style.right = '0';
        canvastoToggle.classList.add('isActivated');
    }
}



/**
 * Fontion qui ferme le offcanva ouvert lorsqu'on clique en dehors du offcanva
 */
function closeMobileSecondOffcanvas() {
    let offcanvaToClose = document.querySelector('.isActivated');
    if (offcanvaToClose) {
        offcanvaToClose.classList.remove('isActivated');
        offcanvaToClose.style.right = '-250px';
    }
}


// je fais une boucle pour ajouter un évènement click sur chaque boutton de la sous catégorie
secondOffcanvas.forEach(element => {
    element.name.addEventListener('click', function () {
        toggleCanvas(element.id);
    })
})


// Fonction qui ferme les offcanvas contenant les sous catégories lorsque l'on clique sur le boutton close
closeOffcanvas.addEventListener('click', function () {
    let offcanvasActivated = document.querySelector('.isActivated');
    if (offcanvasActivated) {
        offcanvasActivated.classList.remove('isActivated');
        offcanvasActivated.style.right = '-250px';
    }
});

// On ajoute un évènement click sur le document pour fermer le offcanva
windowOffcanva.addEventListener('click', function (event) {
        // Si on clique en dehors du offcanva on lance la fonction closeMobileSecondOffcanvas
        if (!event.target.closest('.toClosejsOffcanvas') && !event.target.closest('.secondCanvas')) {
            closeMobileSecondOffcanvas();
        }
    },
    false
)