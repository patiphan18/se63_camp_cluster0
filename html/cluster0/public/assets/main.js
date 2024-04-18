function openNav() {

    document.getElementById("sidenav").style.width = "260px";
    document.getElementById("sidenav").classList.add("shadow");
    document.getElementById("menu").setAttribute("onClick", "closeNav();");
}

function closeNav() {

    document.getElementById("sidenav").style.width = "0";
    document.getElementById("sidenav").classList.remove("shadow");
    document.getElementById("menu").setAttribute("onClick", "openNav();");
}