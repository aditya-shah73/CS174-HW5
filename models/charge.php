

<?php

try{
 require_once $_SERVER['DOCUMENT_ROOT'] . '/CS174-HW5/config/config.php';


  $token  = $_POST['stripeToken'];
  $customer = \Stripe\Customer::create(array(
      'email' => 'customer@example.com',
      'source'  => $token
  ));
  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 5000,
      'currency' => 'usd'
  ));
  echo '<h1>Successfully charged $50.00!</h1>';
}
//catch the errors in any way you like 
catch(Stripe_CardError $e) {
  echo "<h1>Incorrect card details entered</h1>";
}
 
catch (Stripe_InvalidRequestError $e) {
  echo "<h1>Incorrect parameters entered</h1>";
} 
catch (Stripe_AuthenticationError $e) {
  echo "<h1>Authentication error</h1>";
} 
catch (Stripe_ApiConnectionError $e) {
  echo "<h1>Network communication failed</h1>";
} 
catch (Stripe_Error $e) {
  echo "<h1>Stripe error</h1>";
}
catch (Exception $e) { 
  echo "<h1>An exception occured</h1>";
}