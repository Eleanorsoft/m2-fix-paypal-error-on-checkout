<?php

namespace Eleanorsoft\Paypal\Plugin\Magento\Customer\Model\Address;


/**
 * Class AbstractAddress
 * Ignore address errors if Paypal flag is set in registry.
 *
 * @package Eleanorsoft_Paypal
 * @author Konstantin Esin <hello@eleanorsoft.com>
 * @copyright Copyright (c) 2019 Eleanorsoft (https://www.eleanorsoft.com/)
 */

class AbstractAddress
{
    /**
     * Registry model
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    public function __construct(
        \Magento\Framework\Registry $registry
    ) {
        $this->registry = $registry;
    }

    public function afterValidate(\Magento\Customer\Model\Address\AbstractAddress $subject, $result)
    {
        if ($this->registry->registry('paypal_checkout')) {
            return true;
        }
        return $result;
    }
}