<?php

namespace ShyimMailCatcher;

use Doctrine\ORM\Tools\SchemaTool;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use ShyimMailCatcher\Models\Attachment;
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
        $this->updateDatabase();
    }

    /**
     * @param UpdateContext $context
     */
    public function update(UpdateContext $context)
    {
        $this->updateDatabase();
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->setParameter('shyim_mail_catcher.plugin_dir', $this->getPath());
    }

    private function updateDatabase()
    {
        $tool = new SchemaTool($this->container->get('models'));
        $tool->updateSchema([
            $this->container->get('models')->getClassMetadata(Mails::class),
            $this->container->get('models')->getClassMetadata(Attachment::class),
        ], true);
    }
}