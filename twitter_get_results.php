<?php
	include "keys.php";
	
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
    //default language
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

	$data = (array) $result['statuses'];
    
    $encodedResult = json_encode($data);
	
?>