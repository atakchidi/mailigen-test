<?php
/**
 * Created by PhpStorm.
 * User: altak
 * Date: 17.03.19
 * Time: 11:38
 */

namespace App\ValueObject;


use Symfony\Component\HttpFoundation\Request;

class ListItem
{
    public static function createFromRequest(Request $request)
    {
        $item = new static();
        $item->title = $request->request->get('title');
        $item->publicTitle = $request->request->get('public_title');
        $item->reminder = $request->request->get('reminder');
        $item->email = $request->request->get('email');
        $item->isEmailSub = $request->request->getBoolean('email_subscribe');
        $item->isEmailUnsub = $request->request->getBoolean('email_unsubscribe');
        $item->isEmailPref = $request->request->getBoolean('email_preferences');

        return $item;
    }

    /** @var string */
    private $title;

    /** @var string */
    private $publicTitle;

    /** @var string */
    private $reminder;

    /** @var string */
    private $email;

    /** @var bool */
    private $isEmailSub = true;

    /** @var bool */
    private $isEmailUnsub = true;

    /** @var bool */
    private $isEmailPref = true;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPublicTitle()
    {
        return $this->publicTitle;
    }

    /**
     * @param string $publicTitle
     */
    public function setPublicTitle($publicTitle)
    {
        $this->publicTitle = $publicTitle;
    }

    /**
     * @return string
     */
    public function getReminder()
    {
        return $this->reminder;
    }

    /**
     * @param string $reminder
     */
    public function setReminder($reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function isEmailSub()
    {
        return $this->isEmailSub;
    }

    /**
     * @param bool $isEmailSub
     */
    public function setIsEmailSub($isEmailSub)
    {
        $this->isEmailSub = $isEmailSub;
    }

    /**
     * @return bool
     */
    public function isEmailUnsub()
    {
        return $this->isEmailUnsub;
    }

    /**
     * @param bool $isEmailUnsub
     */
    public function setIsEmailUnsub($isEmailUnsub)
    {
        $this->isEmailUnsub = $isEmailUnsub;
    }

    /**
     * @return bool
     */
    public function isEmailPref()
    {
        return $this->isEmailPref;
    }

    /**
     * @param bool $isEmailPref
     */
    public function setIsEmailPref($isEmailPref)
    {
        $this->isEmailPref = $isEmailPref;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'public_title' => $this->publicTitle,
            'reminder' => $this->reminder,
            'email' => $this->email,
            'is_sub' => $this->isEmailSub,
            'is_unsub' => $this->isEmailUnsub,
            'prefs_changed' => $this->isEmailPref,
        ];
    }
}