<?php

namespace ShyimMailCatcher\Components;

/**
 * Class MailFactory
 * @package ShyimMailCatcher\Components
 */
class MailFactory
{
    /**
     * @return mixed|DatabaseMailTransport
     */
    public static function factory()
    {
        $transport = Shopware()->Container()->get('shyim_mail_catcher.components.database_mail_transport');

        \Enlight_Components_Mail::setDefaultTransport($transport);

        return $transport;
    }
}