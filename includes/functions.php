<?php

include("includes/connection.php");
$countries = array( 'Philippines' , 'United States of America', 'Japan', 'UK', 'France', 'Germany', 'France', 'Pakistan', 'India' );

function randomPassword() {

  $alphabet      = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $text_pass     =  array(); //remember to declare $pass as an array
  $alphaLength   =  strlen($alphabet) - 1; //put the length -1 in cache

  for ($i = 0; $i < 8; $i++) { $n = rand(0, $alphaLength); $text_pass[] = $alphabet[$n]; }

  return implode($text_pass); //turn the array into a string

}

function encrypt($text) {

  $ciphering      = "AES-128-CTR";
  $iv_length      =  openssl_cipher_iv_length($ciphering);
  $encryption_iv  = '1234567891011121';
  $encryption_key = "JomJoemar";

  $encryption = openssl_encrypt($text, $ciphering, $encryption_key, /*option = */ 0, $encryption_iv);

  return $encryption;

}

function decrypt( $text ) {

  $ciphering      = "AES-128-CTR";
  $decryption_iv  = '1234567891011121';
  $decryption_key = "JomJoemar";

  $decryption = openssl_decrypt($text, $ciphering, $decryption_key,  /*option = */ 0, $decryption_iv);

  return $decryption;

}
