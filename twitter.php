<!DOCTYPE html>
<html>

	<head>

		<meta charset = "utf-8">
		<title>My Twitter Searcher</title>
		<link rel = "stylesheet" href = "css/main.css" />
		<link rel = "stylesheet" href = "css/twitter.css" />

	</head>

	<body>
	
		<?php include "twitter_get_results.php"; ?>
		
		<form action = "twitter.php" method = "post">
			
			Search term: <input class="search" type = "text" name = "hash_tag" />
			Max results:
			<select name = "tweet_amount">
				<option value = "5">5</option>
				<option value = "10">10</option>
				<option value = "25">25</option>
			</select>
			<button name = "submit_button">Submit</button>
		
		</form>
		
		
		
		<section id = "tweets">
           
        <?php 
    
             $s = count($data);

            for ($a = 0; $a < $s; $a++) {

                $status = $data[$a];
                
                if (empty($status->retweeted_status)) {
                    
                    echo "<div class='tweet'>" . $status->user->name . " (@" . $status->user->screen_name . nl2br (")\n");
                    $b = $status;
                    echo "<br/>";
                }

                else {
                    
                    echo "<div class='tweet'>" . $status->user->name . " (@" . $status->user->screen_name . ") retweeted:"; 
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
                        
                        echo "<br/>" . "<img  class='media' src=\"" . $media->media_url_https . "\">";
                        echo "<br/>";
                        echo "<br/>";
                      
                        
                    }
                    
                    

                }

                echo "</div>";
               
            }
        ?>
			
			
		
		</section>
		
	</body>
	
	<script>
		//print the result of the twitter query to the console as a javascript object
		//var result = <?php echo $encodedResult ?>;
		//console.log(result);
		
	</script>

</html>



 