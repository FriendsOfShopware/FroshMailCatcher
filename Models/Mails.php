<?php

namespace FroshMailCatcher\Models;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Table(name="s_plugin_mailcatcher")
 * @ORM\Entity
 */
class Mails extends ModelEntity
{
    /**
     * INVERSE SIDE
     *
     * @ORM\OneToMany(targetEntity="FroshMailCatcher\Models\Attachment", mappedBy="mail", orphanRemoval=true, cascade={"persist"})
     *
     * @var ArrayCollection
     */
    protected $attachments;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string
     * @ORM\Column(name="senderAddress", type="string", nullable=false)
     */
    private $senderAddress;

    /**
     * @var string
     * @ORM\Column(name="receiverAddress", type="string", nullable=false)
     */
    private $receiverAddress;

    /**
     * @var string
     * @ORM\Column(name="subject", type="string", nullable=true)
     */
    private $subject;

    /**
     * @var string
     * @ORM\Column(name="bodyText", type="text", nullable=true)
     */
    private $bodyText;

    /**
     * @var string
     * @ORM\Column(name="bodyHtml", type="text", nullable=true)
     */
    private $bodyHtml;

    /**
     * Mails constructor.
     */
    public function __construct()
    {
        $this->attachments = new ArrayCollection();
    }

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
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return string
     */
    public function getSenderAddress()
    {
        return $this->senderAddress;
    }

    /**
     * @param string $senderAddress
     */
    public function setSenderAddress($senderAddress)
    {
        $this->senderAddress = $senderAddress;
    }

    /**
     * @return string
     */
    public function getReceiverAddress()
    {
        return $this->receiverAddress;
    }

    /**
     * @param string $receiverAddress
     */
    public function setReceiverAddress($receiverAddress)
    {
        $this->receiverAddress = $receiverAddress;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getBodyText()
    {
        return $this->bodyText;
    }

    /**
     * @param string $bodyText
     */
    public function setBodyText($bodyText)
    {
        $this->bodyText = $bodyText;
    }

    /**
     * @return string
     */
    public function getBodyHtml()
    {
        return $this->bodyHtml;
    }

    /**
     * @param string $bodyHtml
     */
    public function setBodyHtml($bodyHtml)
    {
        $this->bodyHtml = $bodyHtml;
    }

    /**
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param array $attachments
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }
}
