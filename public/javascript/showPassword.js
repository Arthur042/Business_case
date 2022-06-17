let togglePassword = document.querySelector("#togglePassword");
let password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    // change le type de l'input pour afficher le mdp en clair ou caché
    let type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    
    // change la classe du boutton pour changer l'icone
    if (this.classList.contains('hide')) {
        this.classList.remove('hide');
        this.classList.toggle('see');
    } else{
        this.classList.remove('see');
        this.classList.toggle('hide');
    }
});