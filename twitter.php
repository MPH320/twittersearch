<!DOCTYPE html>
<html>

	<head>

		<meta charset = "utf-8">
		<title>My Twitter Page</title>
		<link rel = "stylesheet" href = "css/main.css" />
		<link rel = "stylesheet" href = "css/twitter.css" />

	</head>

	<body>
	
		<?php include "twitter_get_results.php"; ?>
		
		<form action = "twitter.php" method = "post">
			
			Hash Tag: <input type = "text" name = "hash_tag" /><br><br>
			Number of tweets:
			<select name = "tweet_amount">
				<option value = "5">5</option>
				<option value = "10">10</option>
				<option value = "25">25</option>
			</select><br><br>
			
			<button name = "submit_button">Submit</button>
		
		</form>
		
		
		
		<section id = "tweets">
		<h1> Searching <?php echo $hashTag ?></h1>
           
        <?php 
    
             $s = count($data);

            for ($a = 0; $a < $s; $a++) {

                $status = $data[$a];
                
                if (empty($status->retweeted_status)) {
                    
                    echo $status->user->name . " (@" . $status->user->screen_name . nl2br (")\n");
                    $b = $status;
                    echo "<br/>";
                }

                else {
                    
                    echo $status->user->name . " (@" . $status->user->screen_name . ") retweeted:"; 
                    echo "<br/>";
                    echo "<br/>";
                    $b = $status->retweeted_status;

                }
                
                echo "<img src=\"" . $b->user->profile_image_url . "\"/> ";
                echo "<br/>";
                echo "<br/>";
                echo $b->user->name . " (@" . $b->user->screen_name . ")" . " at " . $b->created_at;
                echo "<br/>";
                echo $b->text;
                echo "<br/>";
                echo "<br/>";
                
                if (!empty($b->extended_entities->media)) {
                    
                    for($i = 0; $i < (count($b->extended_entities->media)); $i++) {
                        
                        
                        $media = $b->extended_entities->media[$i];
                        
                        echo "<br/>" . "<img src=\"" . $media->media_url_https . "\">";
                        echo "<br/>";
                        echo "<br/>";
                      
                        
                    }
                    
                    

                }

                echo "<div style=\"height: 1px; width: 100%; background-color: black;\"></div>";
                echo "<br/>";
            }
        ?>
			
			
		
		</section>
		
	</body>
	
	<script>
		//print the result of the twitter query to the console as a javascript object
		var result = <?php echo $encodedResult ?>;
		console.log(result);
		
	</script>

</html>



 