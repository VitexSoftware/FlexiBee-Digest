<?php
/*
 * Incoming payments for us
 */

/**
 * Description of IncomingPayments
 *
 * @author vitex
 */
class IncomingPayments extends \FlexiPeeHP\DigestMail\DigestModule  implements \FlexiPeeHP\DigestMail\DigestModuleInterface
{
    public function heading()
    {
        return _('Incoming payments');
    }
}