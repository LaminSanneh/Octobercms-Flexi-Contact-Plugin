<?php
/**
 * Created by PhpStorm.
 * User: Lamin Sanneh
 * Date: 5/19/14
 * Time: 10:35 AM
 */

namespace LaminSanneh\FlexiContact\Models;

use Model;
class Settings extends Model{

    public $implement = [
        'System.Behaviors.SettingsModel'
    ];

    public $settingsCode = 'laminsanneh_flexicontact_settings';

    public $settingsFields = 'fields.yaml';
} 