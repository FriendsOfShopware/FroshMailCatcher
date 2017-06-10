<?php

use ShyimMailCatcher\Models\Mails;

/**
 * Class Shopware_Controllers_Backend_Mailcatcher
 */
class Shopware_Controllers_Backend_Mailcatcher extends Shopware_Controllers_Backend_Application {

    protected $model = Mails::class;

    public function preDispatch()
    {
        parent::preDispatch();
        $this->View()->addTemplateDir($this->container->getParameter('shyim_mail_catcher.view_dir'));
    }
}