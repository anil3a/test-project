<?php

/*

Write a program which accepts two inputs, representing two playing cards out of a standard 52 card deck. 
Add these two cards together to produce a blackjack score, and print the score on the screen for the output.
Cards will be identified by the input, the first part representing the face value from 2-10, plus A, K, Q, J.
The second part represents the suit S, C, D, H.
The blackjack score is the face value of the two cards added together,
with cards 2-10 being the numeric face value, and A is worth 11, and K, Q, J are each worth 10.

 

*/

class Card 
{
	protected $suit = array( 'Spades', 'Clubs', 'Daimonds', 'Hearts' );
	protected $faces = array ( "Ace"=>11, "Two"=>2, "Three"=>3, "Four"=>4, "Five"=>5, "Six"=>6, "Seven"=>7, "Eight"=>8, "Nine"=>9, "Ten"=>10, "Jack"=>10, "Queen"=>10, "King"=>10 );
	
	/**
	 * Get list of Suit
	 * @return assoc array
	 */
	public function getSuit()
	{
		return $this->suit;
	}
	
	/**
	 * Get list of Faces
	 * @return assoc array
	 */
	public function getfaces()
	{
		return $this->faces;
	}
	
	
	/**
	 * Return numerical value of card
	 */
	public function getCardValue($card)
	{
		return $this->faces[$card];
	}
	
	/**
	 * Return numerical value by card/card_number 
	 */
	public function blackjackScore( $cards )
	{
		$value = 0;
		
		if( !empty( $cards['integer'] ))
		{
			$value = array_sum( $cards['integer'] );
		}
		else if ( !empty( $cards['alpha'] ))
		{
			foreach ( $cards['alpha'] as $play_card) {
				$value += $this->faces[$play_card];
			}
		}
		return $value;
		
	}
	
	/**
	 * Get Dealer's random card
	 */
	public function getDealerCard()
	{
		foreach ( $this->suit as $suit )
		{
			$keys = array_keys( $this->faces );
			foreach ( $keys as $face ) {
				$deck[] = array('face'=>$face, 'suit'=>$suit);
			}
		}
		return shuffle( $deck );
	}
	
	
	
	
	
}