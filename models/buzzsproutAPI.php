<?php

class Buzz {

    private $url = "(https://www.buzzsprout.com/api/YOUR PODCAST BUZZSPROUT ID/episodes.json)";
    private $auth = array('Authorization: Token token=YOUR PODCAST AUTHORIZATION TOKEN'); 
    
    //Properties and Methods go here

    public function getEp() {
        $url = $this->url;

        //return $url;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = $this->auth;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);


        curl_close($curl);
        $episodes = json_decode($resp);

        return $episodes;


        
    }
    


}
    
