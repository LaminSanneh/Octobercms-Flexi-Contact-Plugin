<?php
/**
 * Created by PhpStorm.
 * User: Lamin Sanneh
 * Date: 5/19/14
 * Time: 12:49 AM
 */

namespace LaminSanneh\FlexiContact;

use System\Classes\PluginBase;
use Backend\Facades\Backend;

class Plugin extends PluginBase{

    /**
     * Returns information about this plugin, including plugin name and developer name.
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Flexi Contact',
            'description' => 'laminsanneh.flexicontact::lang.strings.plugin_desc',
            'author'      => 'Lamin Sanneh',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            'LaminSanneh\FlexiContact\Components\ContactForm' => 'contactForm',
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'laminsanneh.flexicontact::lang.strings.settings_label',
                'description' => 'laminsanneh.flexicontact::lang.strings.settings_desc',
                'category'    => 'Marketing',
                'icon'        => 'icon-cog',
                'class'       => 'LaminSanneh\FlexiContact\Models\Settings',
                'order'       => 100
            ]
        ];
    }
    
    public function registerMailTemplates()
    {
        return [
            'laminsanneh.flexicontact::emails.message' => 'laminsanneh.flexicontact::lang.strings.email_desc',
        ];
    }
}
