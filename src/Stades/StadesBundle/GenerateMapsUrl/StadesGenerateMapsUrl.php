<?php

namespace Stades\StadesBundle\GenerateMapsUrl;

class StadesGenerateMapsUrl {
    private $baseUrl = "https://maps.google.com/maps?ll=";
    
    public function generateUrlEmbed($lat, $lon) {
        $url = $this->baseUrl . $lat . ',' .$lon . "&z=17&t=h&output=embed";
        
        return $url;
    }
    
    public function generateUrlMaps($lat, $lon) {
        $url = $this->baseUrl . $lat . ',' .$lon . "&z=17&t=h&hl=fr-FR&gl=US&mapclient=embed";
        
        return $url;
    }
}
