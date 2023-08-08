<?php
    define('API_BASE_URL', 'https://intranet.cdhcm.org.mx:3000/api');

    class ApiClient {

        public function getApiResponse($endpoint) {
            $url = API_BASE_URL . $endpoint;
        
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Deshabilitar la verificación del certificado (solo para entorno de desarrollo)
        
            $response = curl_exec($ch);
        
            if ($response === false) {
                echo 'Error en la solicitud cURL: ' . curl_error($ch);
                return null;
            }
        
            curl_close($ch);
        
            $data = json_decode($response, true);
            return $data;
        }
        
        
        
    }