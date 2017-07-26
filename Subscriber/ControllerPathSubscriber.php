<?php

namespace ShyimMailCatcher\Subscriber;

use Enlight\Event\SubscriberInterface;

/**
 * Class ControllerPathSubscriber
 * @package ShyimMailCatcher\Subscriber
 */
class ControllerPathSubscriber implements SubscriberInterface
{
    /**
     * @var string
     */
    private $pluginDir;

    /**
     * ControllerPathSubscriber constructor.
     * @param $pluginDir
     */
    public function __construct($pluginDir)
    {
        $this->pluginDir = $pluginDir;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (position defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     * <code>
     * return array(
     *     'eventName0' => 'callback0',
     *     'eventName1' => array('callback1'),
     *     'eventName2' => array('callback2', 10),
     *     'eventName3' => array(
     *         array('callback3_0', 5),
     *         array('callback3_1'),
     *         array('callback3_2')
     *     )
     * );
     *
     * </code>
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Backend_Mailcatcher' => 'onMailcatcherController'
        ];
    }

    public function onMailcatcherController(\Enlight_Event_EventArgs $args)
    {
        return $this->pluginDir . '/Controllers/Backend/Mailcatcher.php';
    }
}