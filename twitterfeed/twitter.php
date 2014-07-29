
<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = $_GET['username'];
$notweets = $_GET['number'];
$consumerkey = "0YaJc8BgY8zLHSP2YIN1YV4ry";
$consumersecret = "eu4v0VfRIuY5PtA9yS3N2rUR8Z83gdTZv1pcNCj7p9GjpgpAWR";
$accesstoken = "1312465938-ZPCibxzbnjAy0mRKAAKucJAgDLD4QYbDkbOslWu";
$accesstokensecret = "CCPEFVWclE5220MA5Ctgm1NLlT4MhuRPdVTIX8mNunpxw";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

?>

<div style='margin: 40px; border:1px solid #333;'>
<?php


foreach ( $tweets as $tweet) {
?>
	<div style="margin: 10px; padding: 10px; background-color:#DDD;">
		
		@<?php echo $tweet->user->screen_name ?>:<br>
		<span style="font-size: 12px;">
		Following: <i><?php echo $tweet->user->following ?></i> &nbsp; &nbsp;
		Followers:<i><?php echo $tweet->user->followers_count ?></i> &nbsp; &nbsp; <br> 
		Tweeted: <i><?php echo $tweet->retweet_count?></i>  &nbsp; &nbsp;<i><?php echo $tweet->created_at ?></i>
		</span>
		
		<p><?php echo $tweet->text ?></p> 
	 
	 </div>
<?php 
}
session_destroy();
?>

</div>
