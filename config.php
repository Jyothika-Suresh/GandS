<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51KZHCtSFV4hbOCUtG7HuR972D3QDxrVFUZ8CxAmvNWiuwoRko1MZlikzMPACY33MltxxgPofT58nuKFGwBixYqAL00Feoj08lh",
        "publishableKey" => "pk_test_51KZHCtSFV4hbOCUtuTtAgPdCkonVKJGgNrkbxNJpjtFnkWZHV9GustO3pv41DH6sZz7VBQsJngH3e7aFCUKDimnV00HssFwPb7"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>