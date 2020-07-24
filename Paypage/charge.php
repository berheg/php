<?php
  require_once('vendor/autoload.php');
  \Stripe\Stripe::setApiKey('sk_test_51H82LyJb5ScefpUrRd80JPNwIh3ud7pRvX9jvKg8e4Szah8auWfBLw7mwjj3d4hODsRKU8XNbUbcUSAlHIRF4gwK00QHRnT09e
');
//sanitize Post array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];
// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));
// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => 5000,
  "currency" => "usd",
  "description" => "Intro To React Course",
  "customer" => $customer->id
));