let dogClicked = document.querySelector('#toggleDog');
let catClicked = document.querySelector('#toggleCat');
let ratClicked = document.querySelector('#toggleRat');
let fishClicked = document.querySelector('#toggleFish');
let snakeClicked = document.querySelector('#toggleSnake');
let birdClicked = document.querySelector('#toggleBird');
let closeOffcanvas = document.querySelector('.offcanvasCloseBtn');


dogClicked.addEventListener('click', function() {
    toggleCanvas('.offcanvasDog');
});
catClicked.addEventListener('click', function() {
    toggleCanvas('.offcanvasCat');
});
ratClicked.addEventListener('click', function() {
    toggleCanvas('.offcanvasRat');
});
fishClicked.addEventListener('click', function() {
    toggleCanvas('.offcanvasFish');
});
snakeClicked.addEventListener('click', function() {
    toggleCanvas('.offcanvasSnake');
});
birdClicked.addEventListener('click', function() {
    toggleCanvas('.offcanvasBird');
});

closeOffcanvas.addEventListener('click', function() {
    let offcanvasActivated = document.querySelector('.isActivated');
    offcanvasActivated.classList.remove('isActivated');
    offcanvasActivated.style.right = '-250px';
});

function toggleCanvas(canvas) {
    let canvastoToggle = document.querySelector(canvas);

    let offcanvasActivated = document.querySelector('.isActivated');
        
    if (offcanvasActivated && offcanvasActivated.classList.contains('isActivated')) {
        offcanvasActivated.classList.remove('isActivated');
        offcanvasActivated.style.right = '-250px';
    }

    if (!canvastoToggle.style.right || canvastoToggle.style.right === '-250px') {
        canvastoToggle.style.right = '0';
        canvastoToggle.classList.add('isActivated');
    }
}