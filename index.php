<?php

require_once 'vendor/autoload.php';
include 'giphyRequest.php';


if(isset($_POST['search']))
{


    $searchString = $_POST['search'];
    echo "Searching string: ".$searchString."<br>";

    $giphySearch = new giphyRequest($searchString);

    $data_array = $giphySearch ->getArray();

    echo gettype($data_array);
    print_r($data_array);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Request</title>
</head>

<form action="" method = "post">
    <label for="search">Search: </label>
    <input type="text" name = "search" id="search">
    <button type="submit" class="" >Submit</button>
</form>


