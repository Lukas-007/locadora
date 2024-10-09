<?php 

class GoogleApi {

    public function getDistanciaEmKm(string $origem, string $destino)
    {   
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".urlencode($origem)."&destinations=".urlencode($destino)."&key=".KEY_API_GOOGLE;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        
        curl_close($ch);

        return json_decode($response);
       
    }
}