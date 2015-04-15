function webStorageSupport() {
    if(typeof localStorage != 'undefined') {
        return true;
    } else {
        return false;
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return null;
}
    
function hasConsent() {
    if (webStorageSupport() == true) {
        var consent = localStorage.getItem("accept-cookies"),
            yearConsentCookie = localStorage.getItem("yearConsentCookie"),
            now = new Date(),
            year = now.getFullYear().toString();
        
        if (consent != null && yearConsentCookie != null) {
            if (yearConsentCookie != year) {
                askConsent();
                infoCookies();
            }
            else {
                if (consent == "accepted") {
                    callGA();
                }
            }
        }
        else {
            askConsent();
            infoCookies();
        }
    }
    else {
        var consent = getCookie("accept-cookies");

        if (consent != null) {
            if (consent == "accepted") {
                callGA();
            }
        }
        else {
            askConsent();
            infoCookies();
        }
    }
}
    
function acceptCookies() {
    if(webStorageSupport() == true) {
        var now = new Date(),
            year = now.getFullYear().toString();
            
        localStorage.setItem("yearConsentCookie", year);
        localStorage.setItem("accept-cookies", "accepted");
    } else {
        var today = new Date(), expires = new Date();
        expires.setTime(today.getTime() + (365*24*60*60*1000));
        document.cookie = "accept-cookies=accepted;expires=" + expires.toGMTString();
    }
    callGA();
    hideInfoAndConsent();
}

function refuseCookies() {
    if(webStorageSupport() == true) {
        var now = new Date(),
            year = now.getFullYear().toString();

        localStorage.setItem("yearConsentCookie", year);
        localStorage.setItem("accept-cookies", "refused");
    } else {
        var today = new Date(), expires = new Date();
        expires.setTime(today.getTime() + (365*24*60*60*1000));
        document.cookie = "accept-cookies=refused;expires=" + expires.toGMTString();
    }
    deleteGACookies();
    hideInfoAndConsent();
}

function infoCookies() {
    var text = "Ce site utilise  des cookies de Google Analytics. ";
        text += "Ces cookies nous aident à identifier le contenu qui vous interesse le plus, ";
        text += "à repérer certains dysfonctionnements.";
    var buttons = '<a class="btn-cookie btn-info" href="javascript:hideInfo();">Fermer</a>';
        buttons += '<a class="btn-cookie btn-accept" href="javascript:acceptCookies();">Accepter</a>';
        buttons += '<a class="btn-cookie btn-refuse" href="javascript:refuseCookies();">Refuser</a>';
    
    var node = document.createElement('div');
    node.className = 'box-infoCookies';
    node.innerHTML = '<div class="text-infoCookies">' + text + '</div><div class="buttons">' + buttons + '</div>';
    
    document.body.appendChild(node);
    Velocity(document.getElementsByClassName("box-infoCookies"), "fadeOut", 0);
}

function showInfo() {
    Velocity(document.getElementsByClassName("box-infoCookies"), "fadeIn", 150);
}

function hideInfo() {
    Velocity(document.getElementsByClassName("box-infoCookies"), "fadeOut", 150);
}

function hideInfoAndConsent() {
    hideInfo();
    Velocity(document.getElementsByClassName("cookies-askConsent"), "slideUp", {delay: 250, duration: 150});
}

// Fonction d'effacement des cookies   
function delCookie(name)   {
    var path = ";path=" + "/";
    var hostname = document.location.hostname;
    if (hostname.indexOf("www.") === 0)
        hostname = hostname.substring(4);
    var domain = ";domain=" + "."+hostname;
    var expiration = "Thu, 01-Jan-1970 00:00:01 GMT";       
    document.cookie = name + "=" + path + domain + ";expires=" + expiration;
}

function deleteGACookies() {
    var cookieNames = ["__utma","__utmb","__utmc","__utmt","__utmv","__utmz","_ga","_gat"]
    for (var i=0; i<cookieNames.length; i++) {
        delCookie(cookieNames[i])
    }
}

function callGA() {
    // INSERT YOUR GA SCRIPT
}
    
function askConsent() {
    var text = 'Nous utilisons des cookies pour vous garantir une expérience\
                satisfaisante sur notre site. En poursuivant la navigation, vous acceptez l\'utilisation et le stockage\
                des cookies.<div class="buttons"><a class="btn-cookie btn-info" href="javascript:showInfo();">En savoir plus</a>\
                <a class="btn-cookie btn-accept" href="javascript:acceptCookies();">Accepter</a>\
                <a class="btn-cookie btn-refuse" href="javascript:refuseCookies();">Refuser</a></div>';
        
    var node = document.createElement('div');
    node.className = "cookies-askConsent";
    node.innerHTML = text;
    
    document.body.appendChild(node);
}

hasConsent();