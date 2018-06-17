<?php

namespace FroshMailCatcher\Components;

/**
 * Class MailFactory
 */
class MailFactory
{
    /**
     * @return mixed|DatabaseMailTransport
     */
    public static function factory()
    {
        $transport = Shopware()->Container()->get('frosh_mail_catcher.components.database_mail_transport');

        \Enlight_Components_Mail::setDefaultTransport($transport);

        return $transport;
    }
}
