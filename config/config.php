<?php

try {
  Stripe::setApiKey("sk_test_dnvPjCA1RfEZTSlePT6x9IXR"); //Replace with your Secret Key
  $charge = Stripe_Charge::create(array(
  "amount" => 50,
  "currency" => "usd",
  "card" => $_POST['stripeToken'],
  "description" => "Charge for making a wish."
  ));

	//send the file, this line will be reached if no error was thrown above
	echo "<h1>Your payment has been completed. We will send you the Facebook Login code in a minute.</h1>";
  //you can send the file to this email:
  echo $_POST['stripeEmail'];
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