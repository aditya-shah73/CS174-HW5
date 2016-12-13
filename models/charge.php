<?php
class charge
{

  function __construct()
  {
try{
  require_once $_SERVER['DOCUMENT_ROOT'] . '/Hw5/CS174HW5/config/config.php';
  $token  = $_POST['stripeToken'];
  $customer = \Stripe\Customer::create(array(
      'email' => 'customer@example.com',
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 50,
      'currency' => 'usd'
  ));

  echo '<h1>Successfully charged $00.50!</h1>';

  $wish = $_REQUEST["userWish"];
  $user_email = $_REQUEST['userEmail'];
  $friend_email = $_REQUEST['friendEmail'];
  $fountain = 'luxury_fountain';
  $color = 'red';
  $country = 'india';

  $conn = mysqli_connect("localhost", "root", "", "Wishes");
  $result = mysqli_query($conn, "SELECT * FROM Wish");
  $num_rows = mysqli_num_rows($result);
  echo $num_rows;
  $transactionId = ++$num_rows;


  $message = "Follow the link for wish information. http://localhost/hw5/CS174HW5/models/wishes.php?transId=".$transactionId;
  $headers = "From: ".$user_email;
  $sent = mail($friend_email, "Wish Fountain", $message, $headers);


  

  $stmt = mysqli_prepare($conn, "INSERT INTO Wish (fountain, color, country, wish) VALUES (?,?,?,?)");
      $stmt->bind_param('ssss', $fountain, $color, $country, $wish);
      mysqli_stmt_execute($stmt);
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
}
}
$ch = new charge();