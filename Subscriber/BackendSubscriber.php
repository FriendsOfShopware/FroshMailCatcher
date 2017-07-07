<?php

namespace ShyimMailCatcher\Subscriber;

use Enlight\Event\SubscriberInterface;

class BackendSubscriber implements SubscriberInterface
{
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
            'Enlight_Controller_Action_PostDispatch_Backend_Index' => 'onBackendIndex'
        ];
    }

    public function onBackendIndex(\Enlight_Event_EventArgs $args)
    {
        /** @var \Shopware_Controllers_Backend_Index $subject */
        $subject = $args->getSubject();

        if ($subject->Request()->getActionName() === 'index') {
            $subject->View()->addTemplateDir(Shopware()->Container()->getParameter('shyim_mail_catcher.view_dir'));
            $subject->View()->extendsTemplate('backend/index/notifications.js');
        }
    }
}