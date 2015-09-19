<?php
/**
 * Created by PhpStorm.
 * User: Lamin Sanneh
 * Date: 5/19/14
 * Time: 12:49 AM
 */

namespace LaminSanneh\FlexiContact;

use System\Classes\PluginBase;
use System\Classes\SettingsManager;
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

    public function registerPermissions()
    {
        return [
            'laminsanneh.flexicontact.access_settings' => [
                'tab'   => 'laminsanneh.flexicontact::lang.permissions.tab',
                'label' => 'laminsanneh.flexicontact::lang.permissions.settings'
            ],
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
                'permissions' => ['laminsanneh.flexicontact.access_settings'],
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
