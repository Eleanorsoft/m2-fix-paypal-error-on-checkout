<?php

namespace Eleanorsoft\Paypal\Plugin\Magento\Paypal\Model\Express;


/**
 * Class Checkout
 * Set Paypal flag in registry before order processing and remove it after.
 *
 * @package Eleanorsoft_Paypal
 * @author Konstantin Esin <hello@eleanorsoft.com>
 * @copyright Copyright (c) 2019 Eleanorsoft (https://www.eleanorsoft.com/)
 */

class Checkout
{
    /**
     * Registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    public function __construct(
        \Magento\Framework\Registry $registry
    ) {
        $this->registry = $registry;
    }

    public function aroundPlace(
        \Magento\Paypal\Model\Express\Checkout $subject,
        callable $proceed,
        $token, $shippingMethodCode = null
    ) {
        $this->registry->register('paypal_checkout', true);
        $result = $proceed($token, $shippingMethodCode);
        $this->registry->unregister('paypal_checkout');

        return $result;
    }
}