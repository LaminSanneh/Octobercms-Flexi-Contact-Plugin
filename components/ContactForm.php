<?php
/**
 * Created by PhpStorm.
 * User: Lamin Sanneh
 * Date: 5/19/14
 * Time: 12:55 AM
 */

namespace LaminSanneh\FlexiContact\components;


use Cms\Classes\ComponentBase;
use LaminSanneh\FlexiContact\Models\Settings;

class ContactForm extends ComponentBase{

    /**
     * Returns information about this component, including name and description.
     */
    public function componentDetails()
    {
        return [
            'name' => 'Contact Form Displayer',
            'description' => 'Displays the contact form where ever it\'s been embedded'
        ];
    }

    public function onMailSent(){

        //name of person contacting you
        $name = post('name');

        //email of person contacting you
        $fromEmail = post('email');

        //subject or topic why they are contacting you
        $subject = post('subject');

        //the details of why they contacted you
        $body = post('body');

        if ( empty($name) )
            throw new \Exception(sprintf('Please enter your name.'));
        if ( empty($fromEmail) )
            throw new \Exception(sprintf('Please enter an email address.'));
        if ( empty($subject) )
            throw new \Exception(sprintf('Please enter subject.'));
        if ( empty($body) )
            throw new \Exception(sprintf('Please enter your message.'));

        $data = compact('subject','body','name');

        \Mail::send('laminsanneh.flexicontact::emails.message', $data, function($message) use($fromEmail, $name)
        {
            $message->from($fromEmail, $name);
            $message->to(Settings::get('recipient_email'), Settings::get('recipient_name'))->subject(Settings::get('subject'));
        });

        $this->page["confirmation_text"] = Settings::get('confirmation_text');
    }
}