<?php

/**
 * Settings for the mooch theme
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Link colour setting
    $name = 'theme_mooch/linkcolor';
    $title = get_string('linkcolor','theme_mooch');
    $description = get_string('linkcolordesc', 'theme_mooch');
    $default = '#f25f0f';
    $previewconfig = array('selector'=>'.block .content', 'style'=>'linkcolor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $settings->add($setting);

    // Block region width
    $name = 'theme_mooch/regionwidth';
    $title = get_string('regionwidth','theme_mooch');
    $description = get_string('regionwidthdesc', 'theme_mooch');
    $default = 250;
    $choices = array(180=>'180px', 190=>'190px', 200=>'200px', 210=>'210px', 220=>'220px', 240=>'240px', 250=>'250px');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Hide login form
    $name = 'theme_mooch/hideloginpanel';
    $title = get_string('hideloginpanel','theme_mooch');
    $description = get_string('hideloginpaneldesc', 'theme_mooch');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $settings->add($setting);

    // Custom CSS file
    $name = 'theme_mooch/customcss';
    $title = get_string('customcss','theme_mooch');
    $description = get_string('customcssdesc', 'theme_mooch');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $settings->add($setting);

}