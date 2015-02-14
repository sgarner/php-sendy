<?php
namespace SendyPHP\Model;
/**
 * Sendy Campaign settings
 *
 * @author Jiri Riedl <riedl@dcommunity.org>
 * @package SendyPHP
 */
class Campaign
{
    /**
     * Sender settings
     * @var Sender
     */
    protected $_sender = NULL;
    /**
     * Email subject
     * @var string
     */
    protected $_subject = NULL;
    /**
     * Campaign title
     * @var string
     */
    protected $_title = NULL;
    /**
     * Email body
     * @var EmailBody
     */
    protected $_emailBody = NULL;
    /**
     * Query string appended to URLs
     * @var string
     */
    protected $_queryString = NULL;

    /**
     * Sendy campaign settings
     *
     * @param Sender $sender Sender settings
     * @param string|null $subject email subject
     * @param EmailBody $emailBody Email body variants
     *
     * @throws \SendyPHP\Exception\DomainException
     */
    public function __construct(Sender $sender = NULL, $subject = NULL, EmailBody $emailBody = NULL, $title = NULL, $queryString = NULL)
    {
        if(!is_null($sender))
            $this->setSenderSettings($sender);

        if(!is_null($subject))
            $this->setSubject($subject);

        if(!is_null($emailBody))
            $this->setEmailBodyVariants($emailBody);

        if(!is_null($title))
            $this->setTitle($title);

        if(!is_null($queryString))
            $this->setQueryString($queryString);
    }
    /**
     * Sets e-mail body
     *
     * @param string $html
     * @param string|null $plainText
     * @throws \SendyPHP\Exception\DomainException
     */
    public function setEmailBody($html, $plainText = NULL)
    {
        $this->setEmailBodyVariants(new EmailBody($html,$plainText));
    }
    /**
     * Sets e-mail body variants
     *
     * @param EmailBody $emailBody
     */
    public function setEmailBodyVariants(EmailBody $emailBody)
    {
        $this->_emailBody = $emailBody;
    }
    /**
     * Returns e-mail body
     *
     * @return EmailBody
     */
    public function getEmailBody()
    {
        return $this->_emailBody;
    }
    /**
     * Sets sender settings
     *
     * @param string $fromName 'From name' of your campaign
     * @param string $fromAddress 'From email' of your campaign
     * @param string $replyAddress 'Reply to' of your campaign
     * @throws \SendyPHP\Exception\DomainException
     */
    public function setSender($fromName, $fromAddress, $replyAddress)
    {
        $this->setSenderSettings(new Sender($fromName, $fromAddress, $replyAddress));
    }
    /**
     * Sets sender settings
     *
     * @param Sender $sender
     */
    public function setSenderSettings(Sender $sender)
    {
        $this->_sender = $sender;
    }
    /**
     * Returns Sender settings
     *
     * @return Sender
     */
    public function getSender()
    {
        return $this->_sender;
    }
    /**
     * Sets e-mail subject
     *
     * @param string $subject
     * @throws \SendyPHP\Exception\DomainException
     */
    public function setSubject($subject)
    {
        if(strlen($subject) == 0)
            throw new \SendyPHP\Exception\DomainException('Email subject can not be empty');

        $this->_subject = $subject;
    }
    /**
     * Returns e-mail subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->_subject;
    }

    /**
     * @return string
     */
    public function getTitle ()
    {
        return $this->_title;
    }

    /**
     * @param string $title
     */
    public function setTitle ($title)
    {
        $this->_title = $title;
    }

    /**
     * @param string $queryString
     */
    public function setQueryString ($queryString)
    {
        $this->_queryString = $queryString;
    }
    /**
     * @return string
     */
    public function getQueryString ()
    {
        return $this->_queryString;
    }
}