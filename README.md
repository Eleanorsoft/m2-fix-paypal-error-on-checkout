# m2-fix-paypal-error-on-checkout
Module that fixes error "We can't place order" during PayPal checkout

Magento 2.1.x returns customer after PayPal checkout to order review with error "We can't place order". In our case the error is related to billing address (you can find corresponding error in system.log: "main.CRITICAL: Exception message: Please check the billing address information. Please enter the street. Please enter the city. Please enter the phone number. Please enter the zip/postal code.").

This module fixes the error by disabling address validation at the final stage of checkout.

Copy it to your app/code folder and run:
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
```

*Module is not tested with Magento versions other than 2.1.x!*