jQuery(document).ready(function(){
    /*
     * menu      : div qui contient le menu
     * menuWidth : largeur du menu avec les marges
     * header    : div qui contient le header
     * toTop     : lien qui permet de revenir en haut de la page
     * speed     : vitesse des animations
     */
    var menu = jQuery(".menu"),
        menuWidth = menu.outerWidth(true),
        header = jQuery(".header"),
        toTop = jQuery(".to-top"),
        toggleDescription = jQuery(".toggle-description"),
        description = jQuery(".content-description"),
        speed = 150;
    
    /*
     * Initialisation - On rentre le menu 
     * 
     * NOTE : Pour cette version le lien "To top" n'apparaît pas, la fonction et les appels de fonctions sont donc en commentaires
     */
    menu.animate({marginLeft: "-" + menuWidth}, 0);
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
            header.animate({opacity: 0.9}, speed);
            //top();
            jQuery(".filter").fadeOut(speed);
            jQuery(".content").removeClass("flou");
            touchMoveOn();
        }
        else{
            menu.animate({marginLeft: 0}, speed);
            menu.addClass("actif");
            header.animate({opacity: 1}, speed);
            //toTop.fadeOut(speed);
            jQuery(".filter").fadeIn(speed);
            jQuery(".content").addClass("flou");
            touchMoveOff();
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
            header.animate({opacity: 0.9}, speed);
            //top();
            jQuery(".filter").fadeOut(speed);
            jQuery(".content").removeClass("flou");
            touchMoveOn();
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
            description.fadeOut(speed);
            description.removeClass("actif");
            toggleDescription.removeClass("description-toggle-actif");
        }
        else{
            description.fadeIn(speed);
            description.addClass("actif");
            toggleDescription.addClass("description-toggle-actif");
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
    
    
    /*
     * rewriteTitle
     * 
     * Permer de réécrire le titre du menu en fonction de l'outil sélectionné
     */
    /*function rewriteTitle(element){
        if(element != "Menu")
            jQuery(".title").text("Outil actuel : " + element.children(".menu-liste-link-element").children("img").attr("alt"));
        else
            jQuery(".title").text(element);
    }*/
    
    
    /*
     * toSelect
     * 
     * Permet de voir si l'outil doit être sélectionné et changer le titre ou si c'est simplement un bouton
     */
    /*function toSelect(element){
        if(element.hasClass("to-select")){
            jQuery(".menu-liste-link").removeClass("selected");
            element.addClass("selected");
            hideMenuOnly();
            rewriteTitle(element);
        }
        else{
            hideMenuOnly();
        }
        
    }*/
    
    /*
     * Appels de fonctions en fonction des évènements
     */
    jQuery(".btn-menu").click(hideShowMenu);
    //jQuery(".content").click(hideMenuOnly);
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