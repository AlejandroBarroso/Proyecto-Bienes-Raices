
document.addEventListener("DOMContentLoaded", function() {

    eventListeners();

    darkMode();
});


function darkMode() {

    const prefieredarkMode = window.matchMedia("(prefers-color-scheme: dark)");

    //console.log(prefiereDarkMode.matches);

    if (prefieredarkMode.matches) {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }

    prefieredarkMode.addEventListener("change", function() {
        if (prefieredarkMode.matches) {
            document.body.classList.add("dark-mode");
        } else {
            document.body.classList.remove("dark-mode");
        }
    });

    const botonDarkMode = document.querySelector(".dark-mode-boton");

    botonDarkMode.addEventListener("click", function() {
        document.body.classList.toggle("dark-mode");
    }); 
 
}

function eventListeners() {
    const mobileMenu = document.querySelector(".mobile-menu");
    mobileMenu.addEventListener("click", navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector(".navegacion");

    navegacion.classList.toggle("mostrar");
} 
