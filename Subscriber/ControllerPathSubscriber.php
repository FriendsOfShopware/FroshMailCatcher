<?php

namespace FroshMailCatcher\Subscriber;

use Enlight\Event\SubscriberInterface;

/**
 * Class ControllerPathSubscriber
 */
class ControllerPathSubscriber implements SubscriberInterface
{
    /**
     * @var string
     */
    private $pluginDir;

    /**
     * ControllerPathSubscriber constructor.
     *
     * @param $pluginDir
     */
    public function __construct($pluginDir)
    {
        $this->pluginDir = $pluginDir;
    }

    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Backend_Mailcatcher' => 'onMailcatcherController',
        ];
    }

    public function onMailcatcherController()
    {
        return $this->pluginDir . '/Controllers/Backend/Mailcatcher.php';
    }
}
