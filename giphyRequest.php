<?php

/* Name: giphyRequest
 * Description: Will decode a JSON request to giphy using guzzle
 * date: December 17, 2019*/


require 'vendor/autoload.php';

class giphyRequest
{

   private static $api_key = ''; // add api key here
   private static $limit = "2"; //The maximum number of objects to return
    private $offset="0";
    private $rating = "G";
    private $lang="en";
    //private $random_id;
    //private $feed_url;
    private $dataArray;

    function __construct($searchString)
    {

        //if the string is empty then it will return the Random API endpoint
        if(empty($searchString) || $searchString == NULL)
        {
            $URLi= "http://api.giphy.com/v1/gifs/random?api_key=".self::$api_key."&tag=&rating=".$this->rating;
        }
        else
        {
            $URLi = "http://api.giphy.com/v1/gifs/search?q=" .$searchString ."&api_key=".self::$api_key."&limit=".self::$limit."&rating=".$this->rating."&lang=".$this->lang."&offset=".$this->offset;
        }

        $myClient = new GuzzleHttp\Client([
            'headers'=> ['User-Agent' => 'MyReader']
        ]);
        $response = $myClient->request('GET', $URLi); //sends get request to URL

        if($response->getStatusCode() == 200)
        {
            echo "Request has been successful <br>";

            if($response->hasHeader('content-length'))
            {
                //$contentLength = $response ->getHeader('content-length')[0];

                $this->dataArray = json_decode($response -> getBody(),true); //stores json data in array (global variable)

            }
        }else
        {
            echo 'Status code: '.$response->getStatusCode();
            $this->dataArray = NULL;
        }


    }

    //getter method
    public function getArray()
    {
        return $this->dataArray;
    }




}