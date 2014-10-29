<?php

namespace Stades\StadesBundle\UrlMapsConverter;

class StadesUrlMapsConverter
{
    public function convertUrl($url)
    {
        // A avoir      : https://www.google.com/maps/d/embed?mid=zeb_7Gse8a2Y.k7PiJ1j9slXg
        // Ce qui est   : https://www.google.com/maps/d/viewer?mid=zeb_7Gse8a2Y.k7PiJ1j9slXg&msa=0
        
        $replaceThis = array('viewer', '&msa=0');
        $byThis = array('embed', '');
        
        $url = str_replace('viewer', 'embed', $url);
        
        return $url;
    }
}