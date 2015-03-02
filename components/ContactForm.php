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

    public function defineProperties(){

        return [
            'injectBootstrapAssets' => [
                'title'       => 'Inject Bootstrap Assets',
                'description' => 'Whether To Insert bootstrap css and javascript files',
                'type'        => 'checkbox',
                'default'     => true,
            ],
            'injectMainScript' => [
                'title'       => 'Inject Main Script',
                'description' => 'Whether To Insert Main script that comes with component',
                'type'        => 'checkbox',
                'default'     => true,
            ]
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

        $errorHappened = false;
        if (empty($name) || empty($fromEmail) || empty($subject) || empty($body)){
            $errorHappened = true;
            $flashMessae = '';
            if ( empty($name) )
                $flashMessae .= '<p>Please enter your name.</p>';
            if ( empty($fromEmail) )
                $flashMessae .= '<p>Please enter an email address.</p>';
            if ( empty($subject) )
                $flashMessae .= '<p>Please enter subject.';
            if ( empty($body) )
                $flashMessae .= '<p>Please enter your message.</p>';
            if ($errorHappened)
                \Flash::warning($flashMessae);
            $this->page['errorHappened'] = $errorHappened;
        }

        $data = compact('subject','body','name');

        $this->page["confirmation_text"] = Settings::get('confirmation_text');
        if ($errorHappened)
            return ['error' => true, 'message' => 'One or more elements failed validation'];
        else
            \Mail::send('laminsanneh.flexicontact::emails.message', $data, function($message) use($fromEmail, $name)
            {
                $message->from($fromEmail, $name);
                $message->to(Settings::get('recipient_email'), Settings::get('recipient_name'))->subject(Settings::get('subject'));
            });
            return ['error' => false];
    }

    public function onRun(){

        if($this->property('injectBootstrapAssets') == true){
            $this->addCss('assets/css/bootstrap.css');
            $this->addJs('assets/js/bootstrap.js');
        }

        if($this->property('injectMainScript') == true) {
            $this->addJs('assets/js/main.js');
        }
    }

    function onFlash(){

        return ['#flashMessages' => $this->renderPartial('flash-messages')];
    }
}