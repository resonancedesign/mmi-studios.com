<?php
	require_once('libs/Stripe.php');
	require_once('connect.php');

	// Test stripe API keys (comment out when deploying to live server)
	$stripe = array(
	  	"secret_key"      => "sk_test_b9ZkZLkC7IwRiBklvJQhVapT",
	  	"publishable_key" => "pk_test_eB17AGC8nowWmApQ022ryNK6"
	);

	// Live stripe API keys (uncomment when deploying to live server)
	/*$stripe = array(
	  	"secret_key"      => "sk_live_q46X828yDhg04mDRqWrkQ0AV",
	  	"publishable_key" => "pk_live_1UfQv9g5OBPASB1t9WQLYZ39"
	);*/

	Stripe::setApiKey($stripe['secret_key']);
?>