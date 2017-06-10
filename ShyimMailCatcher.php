<?php

namespace ShyimMailCatcher;

use Doctrine\ORM\Tools\SchemaTool;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use ShyimMailCatcher\Models\Mails;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ShyimMailCatcher
 * @package ShyimMailCatcher
 */
class ShyimMailCatcher extends Plugin
{
    /**
     * @param InstallContext $context
     */
    public function install(InstallContext $context)
    {
        parent::install($context);

        $tool = new SchemaTool($this->container->get('models'));
        $tool->createSchema([
            $this->container->get('models')->getClassMetadata(Mails::class)
        ]);
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->setParameter('shyim_mail_catcher.plugin_dir', $this->getPath());
    }
}