<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme for moodle.net (formally hub.moodle.org)
 *
 * @package     theme_mooch
 * @copyright   2011 Marina Glancy <marina@moodle.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'theme_mooch';
$plugin->version = 2016011300;
$plugin->requires = 2014111005;
$plugin->maturity = MATURITY_STABLE;
$plugin->dependencies = [
    'theme_arialist' => ANY_VERSION,
    'theme_canvas' => ANY_VERSION,
    'theme_base' => ANY_VERSION,
];
