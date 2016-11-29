<?php

    include 'utility/ApiConnection.php';

    $apiConnection = new ApiConnection;

    $loginData  = [
        'email'    => urlencode($_POST['email']),
        'password' => urlencode($_POST['password'])
    ];

    $result = $apiConnection->loginToApi($loginData);

    echo $result;
