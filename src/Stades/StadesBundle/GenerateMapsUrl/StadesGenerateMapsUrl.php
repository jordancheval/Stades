<?php

namespace Stades\StadesBundle\GenerateMapsUrl;

class StadesGenerateMapsUrl {
    public function generateUrlEmbed($lat, $lon) {
        $url = "https://www.google.fr/maps?z=18&t=k&ll=" . $lat . ',' .$lon . "&output=embed";
        
        return $url;
    }
    
    public function generateUrlMaps($lat, $lon) {
        $url = "https://www.google.fr/maps?z=18&t=k&ll=" . $lat . ',' .$lon;
        
        return $url;
    }
}
