
<?php
require_once('../vendor/autoload.php');
$stripe = array(
  "secret_key"      => "sk_test_dnvPjCA1RfEZTSlePT6x9IXR",
  "publishable_key" => "pk_test_mfDmFaNUG5FaS8zNKTg3VKAF"
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>