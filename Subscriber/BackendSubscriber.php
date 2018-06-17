<?php

namespace FroshMailCatcher\Subscriber;

use Enlight\Event\SubscriberInterface;

/**
 * Class BackendSubscriber
 */
class BackendSubscriber implements SubscriberInterface
{
    /**
     * @var string
     */
    private $viewDir;

    /**
     * BackendSubscriber constructor.
     * @param $viewDir
     */
    public function __construct($viewDir)
    {
        $this->viewDir = $viewDir;
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatch_Backend_Index' => 'onBackendIndex',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onBackendIndex(\Enlight_Event_EventArgs $args)
    {
        /** @var \Shopware_Controllers_Backend_Index $subject */
        $subject = $args->getSubject();

        if ($subject->Request()->getActionName() === 'index') {
            $subject->View()->addTemplateDir($this->viewDir);
            $subject->View()->extendsTemplate('backend/index/notifications.js');
        }
    }
}
