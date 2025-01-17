function showMenu() {
    console.log("Olá")
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('aberto')) {
        menuMobile.classList.remove('aberto');
        document.querySelector('.icon').src = "../images/menu-icon.png";
    } else {
        document.querySelector('.icon').src = "../images/menu-icon-x.png";
        menuMobile.classList.add('aberto');
    }
}