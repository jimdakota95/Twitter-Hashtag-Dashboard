<!DOCTYPE html>
<html lang="en">
<!-- Sarcasm/Pirate lang declaration not possible but is desired-->
<head>
<meta charset="UTF-8" />

<title>Twitter Searches -- T-rex The Pirate</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<p class="home"><a href="http://trexthepirate.com" title="Everybody walk the dinosaur">Home</a></p>

<div class="container">
<h1>T-rex The Pirate Twitter #hashtags searches</h1>
<?php
$searches = array('ifthe90shadTwitter', 'handwrittentweets', 'handwrittentweet', 'blamenacin', 'paul_irish', 'html5', 'css3', 'wordpress');
foreach($searches as $term) {
    $thesearch[] = json_decode(file_get_contents("http://search.twitter.com/search.json?q=". $term ."&rpp=5"));
}

foreach($thesearch as $tweet) {
    if(!empty($tweet->results)) {
    echo '<div class="tweetresults">
    <h3><a href="https://twitter.com/#!/search/'. $tweet->query .'" title="Search for '. $tweet->query.'">#' . $tweet->query . '</a></h3>';
    foreach($tweet->results as $thetweet) {
        echo '<div>
        <a href="https://twitter.com/#!/'. $thetweet->from_user .'/status/' .$thetweet->id_str .'">
        <img src="'. $thetweet->profile_image_url .'" alt="" />';
        echo '<p>From: '. $thetweet->from_user .'</p><p>'. $thetweet->text .'</p>
        <p>'. $thetweet->created_at .'</p>
        </a>';
        echo '</div>';
    }
    echo '</div>';
    } else {
    echo '<div class="tweetresults">
    <h3><a href="https://twitter.com/#!/search/'. $tweet->query .'" title="Search for '. $tweet->query.'">#' . $tweet->query . '</a></h3>
    <p class="empty">Sorry but there are zero tweets for this term</p>
    </div>';
    }
}
?>
</div>
</body>
</html>
