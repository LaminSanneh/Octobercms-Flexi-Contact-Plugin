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
            'description' => 'A flexible and configurable contact form',
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
                'label'       => 'Flexi Contact Settings',
                'description' => 'Manage the settings for the flexi contact form.',
                'category'    => 'Marketting',
                'icon'        => 'icon-cog',
                'class'       => 'LaminSanneh\FlexiContact\Models\Settings',
                'order'       => 100
            ]
        ];
    }
}