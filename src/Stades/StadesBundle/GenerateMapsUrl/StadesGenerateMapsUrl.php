<?php

namespace Stades\StadesBundle\GenerateMapsUrl;

class StadesGenerateMapsUrl {
    private $baseUrl = "https://www.google.fr/maps?z=17&t=k&ll=";
    
    public function generateUrlEmbed($lat, $lon) {
        $url = $this->baseUrl . $lat . ',' .$lon . "&output=embed";
        
        return $url;
    }
    
    public function generateUrlMaps($lat, $lon) {
        $url = $this->baseUrl . $lat . ',' .$lon;
        
        return $url;
    }
}
