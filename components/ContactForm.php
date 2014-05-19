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

        $name = post('name');
        $fromEmail = post('email');
        $subject = post('subject');
        $body = post('body');

        $data = compact('subject','body','name');

        \Mail::send('laminsanneh.flexicontact::emails.message', $data, function($message) use($fromEmail, $name)
        {
            $message->from($fromEmail, $name);
            $message->to(Settings::get('recipient_email'), Settings::get('recipient_name'))->subject(Settings::get('recipient_name'));
        });

        $this->page["confirmation_text"] = Settings::get('confirmation_text');
    }
}