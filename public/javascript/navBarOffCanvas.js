// Tableau contenant les liens de la navbar
    let buttonsCanvas = [document.querySelector('#buttonToggleDog'), 
                        document.querySelector('#buttonToggleCat'), 
                        document.querySelector('#buttonToggleRat'), 
                        document.querySelector('#buttonToggleFish'), 
                        document.querySelector('#buttonToggleBird'), 
                        document.querySelector('#buttonToggleSnake')
                    ];

// Tableau contenant les offcanvas
    let offcanvas = [document.querySelector('.dofOffcanvaBg'),
                    document.querySelector('.catOffcanvaBg'),
                    document.querySelector('.ratOffcanvaBg'),
                    document.querySelector('.fishOffcanvaBg'),
                    document.querySelector('.birdOffcanvaBg'),
                    document.querySelector('.snakeOffcanvaBg')
                ];

/**
 * fonction qui ouvre le offcanva sur le quel on a cliqué
 * Si on a cliqué sur un autre lien, on ferme le offcanva précédent et on ouvre le nouveau
 * Si on reclique sur le même lien, on ferme le offcanva
 * @param {string} offcanva le nom de la classe du offcanva à ouvrir
 */
function toggleOffCanva(offcanva) {

    let isOffcanvaOpen = document.querySelector('.offcanvaIsActived');
    
    if (offcanva.classList.contains('offcanvaIsActived')) {
        offcanva.classList.remove('offcanvaIsActived');
        offcanva.style.top = '-700px';
    }else if (isOffcanvaOpen) {
        isOffcanvaOpen.classList.remove('offcanvaIsActived');
        isOffcanvaOpen.style.top = '-700px';
        if (!offcanva.classList.contains('offcanvaIsActived')) {
            offcanva.classList.add('offcanvaIsActived');
            offcanva.style.top = '-57px';
        }
    }else {
        offcanva.classList.add('offcanvaIsActived');
        offcanva.style.top = '-57px';
    }
}


/**
 * Fontion qui ferme le offcanva ouvert lorsqu'on clique en dehors du offcanva
 */
function closeModal() {
    let offcanvaToClose = document.querySelector('.offcanvaIsActived');
    if (offcanvaToClose) {
        offcanvaToClose.classList.remove('offcanvaIsActived');
        offcanvaToClose.style.top = '-700px';
    }
  }


// On ajoute un évènement click sur chaque bouton de la navbar
    for (let i = 0; i < buttonsCanvas.length; i++) {
        buttonsCanvas[i].addEventListener('click', (e) => {
            toggleOffCanva(offcanvas[i]);   // on lançe la fonction toggleOffCanva avec le nom de la classe du offcanva correspondant
            e.stopImmediatePropagation();   // on empêche le comportement par défaut du lien
        })
    }

// On ajoute un évènement click sur le document pour fermer le offcanva
    document.addEventListener('click', function(event) {
        // Si on clique en dehors du offcanva on lance la fonction closeModal
            if ( !event.target.closest('.offcanvas-body')) {
                closeModal()
            }
            },
            false   
    )
  
  