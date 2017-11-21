<?php
defined('ABSPATH') or die('No script kiddies please!');
/*
Plugin Name: IFRS Portal Roles
Plugin URI:  https://github.com/IFRS/portal-plugin-roles
Description: Plugin para definir perfis de usuários.
Version:     1.0.1
Author:      Ricardo Moro
Author URI:  https://github.com/ricardomoro
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
Text Domain: ifrs-portal-plugin-roles
Domain Path: /lang
*/

require_once('roles.php');

register_activation_hook(__FILE__, function () {
    ifrs_portal_roles_addRoles();
});

register_deactivation_hook(__FILE__, function () {
    ifrs_portal_roles_removeRoles();
});
