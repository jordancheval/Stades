/*
 * menu      : div qui contient le menu
 * menuWidth : largeur du menu avec les marges
 * toTop     : lien qui permet de revenir en haut de la page
 * speed     : vitesse des animations
 */
var menu = document.getElementById("menu"),
    menuWidth = menu.offsetWidth,
    //toTop = document.getElementById(".to-top"),
    toggleDescription = document.getElementById("toggle-description"),
    description = document.getElementById("content-description"),
    header = document.getElementById("header"),
    btnMenu = document.getElementById('btn-menu'),
    btnSearch = document.getElementById('btn-search'),
    searchInput = document.getElementById("stade_search"),
    searchInputWidth = searchInput.clientWidth,
    filter = document.getElementById("filter"),
    content = document.getElementById("content"),
    speed = 150;
    
/**
 * Detect if jQuery is present for Velocity
 */
if (window.jQuery) {
    var V = $.Velocity;
} else {
    var V = Velocity;
}

/*
 * Initialisation
 * 
 * NOTE : Pour cette version le lien "To top" n'apparaît pas, la fonction et les appels de fonctions sont donc en commentaires
 * 
 * /
//top();


/*
 * hideShowMenu
 * 
 * Permet d'afficher ou de cacher le menu
 */
function hideShowMenu(){
    if(menu.classList.contains("actif")){
        V(menu, {marginLeft: "-" + menuWidth + "px"}, speed);
        menu.classList.remove("actif");
        btnMenu.classList.remove("menu-actif");
        //top();
        V(filter, { opacity: 0 }, { display: "none" }, speed);
        content.classList.remove("flou");
    }
    else{
        V(menu, {marginLeft: 0}, speed);
        menu.classList.add("actif");
        btnMenu.classList.add("menu-actif");
        //toTop.fadeOut(speed);
        V(filter, { opacity: "0.4" }, { display: "block" }, speed);
        content.classList.add("flou");
        hideDescriptionOnly();
    }
}

/*
 * hideMenuOnly
 * 
 * Permet seulement de cacher le menu
 */
function hideMenuOnly(){
    if(menu.classList.contains("actif")){
        V(menu, {marginLeft: "-" + menuWidth}, speed);
        menu.classList.remove("actif");
        btnMenu.classList.remove("menu-actif");
        //top();
        V(filter, { opacity: 0 }, { display: "none" }, speed);
        content.classList.remove("flou");
    }
}

/*
 * hideMenuOnly
 * 
 * Permet seulement de montrer le menu
 */
function showMenuOnly(){
    if(!menu.classList.contains("actif")){
        V(menu, {marginLeft: 0}, speed);
        menu.classList.add("actif");
        btnMenu.classList.add("menu-actif");
        //toTop.fadeOut(speed);
        V(filter, { opacity: "0.4" }, { display: "block" }, speed);
        content.classList.add("flou");
        hideDescriptionOnly();
    }
}

/**
 * Fonction pour cache ou montrer la description
 */
function hideShowDescription(){
    if(description.classList.contains("actif")){
        V(description, "slideUp", speed);
        description.classList.remove("actif");
        toggleDescription.classList.remove("description-toggle-actif");
    }
    else{
        V(description, "slideDown", speed);
        description.classList.add("actif");
        toggleDescription.classList.add("description-toggle-actif");
        hideMenuOnly();
    }
}

/**
 * Fonction pour cacher la description seulement
 */
function hideDescriptionOnly(){
    if (toggleDescription !== null) {
        if(description.classList.contains("actif")){
            V(description, "slideUp", speed);
            description.classList.remove("actif");
            toggleDescription.classList.remove("description-toggle-actif");
        }
    }
}

/**
 * Fonction pour montrer la description seulement
 */
function showDescriptionOnly(){
    if (toggleDescription !== null) {
        if(!description.classList.contains("actif")){
            V(description, "slideDown", speed);
            description.classList.add("actif");
            toggleDescription.classList.add("description-toggle-actif");
            hideMenuOnly();
        }
    }
}


/*function top(){
    if(jQuery(document).scrollTop() >= 100){
        toTop.fadeIn(speed);
    }
    else{
        toTop.fadeOut(speed);
    }
}*/

/**
 * hideShowSearch
 * 
 * Permet d'afficher ou non la barre de recherche
 */
function hideShowSearch() {
    if (searchInputWidth !== 0) {
        V(searchInput, { width: 0 }, speed);
    }
    else {
        V(searchInput, { width: 150 }, speed);
        searchInput.focus();
    }
}

/**
 * hideSearchOnly
 * 
 * Permet de cacher la barre de recherche
 */
function hideSearchOnly() {
    V(searchInput, { width: 0 }, speed);
}

/*
 * Appels de fonctions en fonction des évènements
 */
btnMenu.addEventListener('click', hideShowMenu);
btnSearch.addEventListener('click', hideShowSearch);
searchInput.addEventListener('focusout', hideSearchOnly);
searchInput.addEventListener('blur', hideSearchOnly); // For Firefox
content.addEventListener('click', hideSearchOnly);
filter.addEventListener('click', hideMenuOnly);
if (toggleDescription !== null) {
    toggleDescription.addEventListener('click', hideShowDescription);
}
window.addEventListener("scroll", hideMenuOnly);

/*----- With Hammer.js -----*/
var filterHammer = new Hammer(filter);
var menuHammer = new Hammer(menu);
var contentHammer = new Hammer(content);

filterHammer.on("panleft", function(ev){ hideMenuOnly(); });
menuHammer.on("panleft", function(ev){ hideMenuOnly(); });

/*var descriptionHammer = new Hammer(description);

descriptionHammer.on("panup", function(ev){
    console.log("GESTURE left !");
    hideDescriptionOnly();
});*/

contentHammer.get('pan').set({ direction: Hammer.DIRECTION_ALL, threshold: 30 });

contentHammer.on("panright", function(ev) {
    console.log("GESTURE right !");
    showMenuOnly();
});

if (toggleDescription !== null) {
    var descriptionHammer = new Hammer(description);
    var headerHammer = new Hammer(header);
    
    headerHammer.get('pan').set({ direction: Hammer.DIRECTION_ALL, threshold: 8 });
    
    descriptionHammer.on("panup", function(ev){ hideDescriptionOnly(); });
    headerHammer.on("pandown", function(ev){ showDescriptionOnly(); });
}

//jQuery(window).scroll(top);
/*jQuery(".to-top").click(function(e){
    e.preventDefault();
    jQuery("html, body").animate({scrollTop:0},speed);
});*/