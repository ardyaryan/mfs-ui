<?php
/**
 * Created by PhpStorm.
 * User: Ardy
 * Date: 11/1/2016
 * Time: 9:02 PM
 */

class ApiConnection {

    const API_BASE_URL    = 'localhost/myfitstation_api/user';
    const API_LOGIN_ROUTE = 'login';

    public function loginToApi($data) {

        $url = self::API_BASE_URL . '/' . self::API_LOGIN_ROUTE;

        //url-ify the data for the POST
        $fields_string = '';
        foreach($data as $key => $value) {
            $fields_string .= $key.'='.$value.'&';
        }

        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POST, count($data));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
        return $result;
    }
}