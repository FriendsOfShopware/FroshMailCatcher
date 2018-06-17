<?php

namespace FroshMailCatcher\Models;

use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Table(name="s_plugin_mailcatcher_attachments")
 * @ORM\Entity
 */
class Attachment extends ModelEntity
{
    /**
     * OWNING SIDE
     *
     * @var Mails
     *
     * @ORM\ManyToOne(targetEntity="FroshMailCatcher\Models\Mails")
     * @ORM\JoinColumn(name="mail_id", referencedColumnName="id")
     */
    protected $mail;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="file_name", type="string", nullable=false)
     */
    private $fileName;

    /**
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Mails
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param Mails $mail
     */
    public function setMail(Mails $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
