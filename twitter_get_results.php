<?php

	/* IMPORTANT: GET AN API KEY FROM TWITTER AND FILL OUT THE FOLLOWING
	VARIABLES FIRST BEFORE TRYING TO RUN THIS PAGE. */
	
	$consumer_key = "hzfUDkHb6l86NU5a5XCQE9b43";
	$consumer_secret = "DYgDkr5EsLvPoexgG7Le4aqP76OvnlKtsHUFPTpa2dwPeu08kZ";
	$access_token = "150449730-hGVJn7I10HsBkGuz5z0gajgtVXWg5p0hF0RHK5s1";
	$access_token_secret = "ve437BqhwSbw5JdWTQ6GQ3lBL6TljTc0exyENwCySIm30";
	
	require_once('codebird/src/codebird.php');
	
	\Codebird\Codebird::setConsumerKey($consumer_key, $consumer_secret);
	
	$cbInstance = \Codebird\Codebird::getInstance();
	
	$cbInstance->setToken($access_token, $access_token_secret);
	
	$reply = $cbInstance->oauth2_token();
	$bearer_token = $reply->access_token;
	
	\Codebird\Codebird::setBearerToken($bearer_token);

	
	
	//default twitter handle
	$hashTag = "#";
	//default tweet amount
	$tweetCount = 5;
    //default language (edit if you'd like)
	$language = "en";
	
	if(isset($_POST["hash_tag"]) && !empty($_POST["hash_tag"])) {
		$hashTag = $_POST["hash_tag"];
	}
	
	if(isset($_POST["tweet_amount"]) && !empty($_POST["tweet_amount"])) {	
		$tweetCount = $_POST["tweet_amount"];
	}
		
	$parameters = array(
			//query (by hashtag)
			'q' => $hashTag,
			//only retrieve tweets from this language
			'lang' => $language,
			//amount of tweets to retrieve
			'count' => $tweetCount
    );
		
	$result = (array) $cbInstance->search_tweets($parameters);

    //https://nerdyjunkyard.wordpress.com/2014/01/30/dealing-with-tweet-data-by-php/
	
	//$encodedResult = json_encode($result);
	
	//$data = json_decode($encodedResult, true);
	
	//we go through it and search for the “statuses”. In Twitter API language status actually means a tweet and all the metadata included.
	$data = (array) $result['statuses'];
    
    $encodedResult = json_encode($data);

    //print_r ($data);

    //https://dev.twitter.com/overview/api/tweets
	
	//generate a tweet from a specified tweet object

     
	//http://php.net/manual/en/function.nl2br.php
	
?>