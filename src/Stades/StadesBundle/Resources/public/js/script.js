jQuery(document).ready(function(){
    /*
     * menu      : div qui contient le menu
     * menuWidth : largeur du menu avec les marges
     * toTop     : lien qui permet de revenir en haut de la page
     * speed     : vitesse des animations
     */
    var menu = jQuery(".menu"),
        menuWidth = menu.innerWidth(),
        toTop = jQuery(".to-top"),
        toggleDescription = jQuery(".toggle-description"),
        description = jQuery(".content-description"),
        btnMenu = jQuery('.btn-menu'),
        searchInput = jQuery("#stade_search"),
        speed = 150;
    
    /*
     * Initialisation
     * 
     * NOTE : Pour cette version le lien "To top" n'apparaît pas, la fonction et les appels de fonctions sont donc en commentaires
     * 
     * Plus besoin de rentrer le menu
     */
    //menu.animate({marginLeft: "-" + menuWidth}, 0);
    //top();
    
    
    /*
     * hideShowMenu
     * 
     * Permet d'afficher ou de cacher le menu
     */
    function hideShowMenu(){
        if(menu.hasClass("actif")){
            menu.animate({marginLeft: "-" + menuWidth}, speed);
            menu.removeClass("actif");
            //top();
            jQuery(".filter").fadeOut(speed);
            jQuery(".content").removeClass("flou");
            touchMoveOn();
            btnMenu.css("background-position", "0 0");
        }
        else{
            menu.animate({marginLeft: 0}, speed);
            menu.addClass("actif");
            //toTop.fadeOut(speed);
            jQuery(".filter").fadeIn(speed);
            jQuery(".content").addClass("flou");
            touchMoveOff();
            btnMenu.css("background-position", "-40px 0");
            hideDescriptionOnly();
        }
    }
    
    /*
     * hideMenuOnly
     * 
     * Permet seulement de cacher le menu
     */
    function hideMenuOnly(){
        if(menu.hasClass("actif")){
            menu.animate({marginLeft: "-" + menuWidth}, speed);
            menu.removeClass("actif");
            //top();
            jQuery(".filter").fadeOut(speed);
            jQuery(".content").removeClass("flou");
            touchMoveOn();
            btnMenu.css("background-position", "0 0");
        }
    }
    
    
    /*
     * touchMoveOff - Permet de désactiver les swipe au toucher
     * 
     * touchMoveOn - Permet d'activer les swipe au toucher
     */
    function touchMoveOff(){
        jQuery(".content").bind('touchmove', function(e){e.preventDefault()});
    }
    
    function touchMoveOn(){
        jQuery(".content").unbind('touchmove');
    }
    
    /**
     * Fonction pour cache ou montrer la description
     */
    function hideShowDescription(){
        if(description.hasClass("actif")){
            description.slideUp(speed);
            description.removeClass("actif");
            toggleDescription.removeClass("description-toggle-actif");
        }
        else{
            description.slideDown(speed);
            description.addClass("actif");
            toggleDescription.addClass("description-toggle-actif");
            hideMenuOnly();
        }
    }
    
    /**
     * Fonction pour cacher la description seulement
     */
    function hideDescriptionOnly(){
        if(description.hasClass("actif")){
            description.slideUp(speed);
            description.removeClass("actif");
            toggleDescription.removeClass("description-toggle-actif");
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
        //searchInput.toggle(speed);
        if (searchInput.innerWidth() !== 0) {
            searchInput.animate({width: 0}, speed);
        }
        else {
            searchInput.animate({width: 150}, speed);
        }
    }
    
    /**
     * hideSearchOnly
     * 
     * Permet de cacher la barre de recherche
     */
    function hideSearchOnly() {
        searchInput.animate({width: 0}, speed);
    }
    
    /*
     * Appels de fonctions en fonction des évènements
     */
    jQuery(".btn-menu").click(hideShowMenu);
    jQuery(".btn-search").click(function(){hideShowSearch(); searchInput.focus();});
    searchInput.focusout(hideShowSearch);
    jQuery(".content").click(hideSearchOnly);
    jQuery(".filter").click(hideMenuOnly);
    toggleDescription.click(hideShowDescription);
    //jQuery(".menu-liste-link").click(hideMenuOnly);
    //jQuery(".menu-liste-link").click(function(){toSelect(jQuery(this))});
    jQuery(window).scroll(hideMenuOnly);
    //jQuery(window).scroll(top);
    /*jQuery(".to-top").click(function(e){
        e.preventDefault();
        jQuery("html, body").animate({scrollTop:0},speed);
    });*/
});