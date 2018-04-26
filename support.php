<?php

function connectToDB() {
    $host = "localhost";
    $user = "dbuser";
    $password = "goodbyeWorld";
    $database = "applicationdb";

    $db = mysqli_connect($host, $user, $password, $database);
    if (mysqli_connect_errno()) {
        echo "Connect failed.\n".mysqli_connect_error();
        exit();
    }
    return $db;
}

function generatePage($body, $title="Grades Submission System") {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>$title</title>	
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel = "stylesheet" href = "style.css">
    </head>
            
    <body>
        <div class="container-fluid">
            $body
        </div>
    </body>
</html>
EOPAGE;

    return $page;
}


?>