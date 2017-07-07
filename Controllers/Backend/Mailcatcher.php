<?php

use ShyimMailCatcher\Models\Mails;

/**
 * Class Shopware_Controllers_Backend_Mailcatcher
 */
class Shopware_Controllers_Backend_Mailcatcher extends Shopware_Controllers_Backend_Application {
    /**
     * @var string
     */
    protected $model = Mails::class;

    public function preDispatch()
    {
        parent::preDispatch();
        $this->View()->addTemplateDir($this->container->getParameter('shyim_mail_catcher.view_dir'));
    }

    /**
     * Provides the last mail id for notifications
     */
    public function lastMailAction()
    {
        $this->View()->success = true;
        $this->View()->id = (int) $this->container->get('dbal_connection')->fetchColumn('SELECT id FROM s_plugin_mailcatcher ORDER BY id DESC LIMIT 1');
    }

    /**
     * Provides the new mails for notifications
     */
    public function getNewMailsAction()
    {
        $this->View()->success = true;
        $mails = $this->container->get('dbal_connection')->fetchAll('SELECT id, subject, receiverAddress FROM s_plugin_mailcatcher WHERE id > :id ORDER BY id ASC', ['id' => $this->Request()->getParam('id')]);
        $this->View()->mails = $mails;
    }
}