<?php 
if (!file_exists('card.php' ))
die( ' Sorry! Failed to load the resource file. ' );

include 'card.php';
$CARDS = new Card();
$req = $_POST;
?>
<html>
<head>
<title>Play Card</title>
</head>
<body>
<style>
body {
	width: 960px; margin: 0 auto; padding: 20px;
}

input, select, option {
	width: 150px;
}
input[type=submit] {
	width: 110px;
	font-weight: bold;
}
.result {
	border: solid 1px #333;
	padding: 10px;
}

</style>


<div>

<form action="" method="post" name="choosecard">

	<label>
		Select card
		<select name="face[]">
			<?php foreach ( array_keys($CARDS->getfaces()) as $face ) {?>
				<option value="<?php echo $face ?>" <?php if( !empty( $req['face'][0] ) ){ if( $req['face'][0] == $face) { echo 'selected="selected"'; } } ?>>
					<?php echo $face ?>
				</option>
			<?php } ?>
		</select>
	</label>
	
	<label>
		Select suit
		<select name="suit[]">
			<?php foreach ( $CARDS->getSuit() as $suit ) {?>
				<option value="<?php echo $suit ?>" <?php if( !empty( $req['suit'][0] ) ){ if( $req['suit'][0] == $suit) { echo 'selected="selected"'; } } ?>>
					<?php echo $suit ?>
				</option>
			<?php } ?>
		</select>
	</label>
	
	<br>
	
	<label>
		Select card
		<select name="face[]">
			<?php foreach ( array_keys($CARDS->getfaces()) as $face ) {?>
				<option value="<?php echo $face ?>" <?php if( !empty( $req['face'][1] ) ){ if( $req['face'][1] == $face) { echo 'selected="selected"'; } } ?>>
					<?php echo $face ?>
				</option>
			<?php } ?>
		</select>
	</label>
	
	<label>
		Select suit
		<select name="suit[]">
			<?php foreach ( $CARDS->getSuit() as $suit ) {?>
				<option value="<?php echo $suit ?>" <?php if( !empty( $req['suit'][1] ) ){ if( $req['suit'][1] == $suit) { echo 'selected="selected"'; } } ?>>
					<?php echo $suit ?>
				</option>
			<?php } ?>
		</select>
	</label>
	
	<input type="submit" name="confirm" value="Confirm">
	
</form>
</div>

<?php
if( !empty( $req['suit'] ) && !empty( $req['face'] ) )
{
	$suits = $CARDS->getSuit();
	$hand['suit'] = $req['suit'];
	$hand['face'] = $req['face'];
	$card['alpha'] = $hand['face'];
	
	$blackjackscore = $CARDS->blackjackScore( $card );
	
	if( !empty($blackjackscore) )
	{
	?>
		<div class="result">
			<p>Your score is <b><?php echo $blackjackscore ?></b>.
		</div>
	<?php } 
		
}
?>

<a href='index.php'>Try Again</a>

</body>
</html>