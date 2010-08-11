<?php
/**
 *
 * This file should be generated by the Backend, it contains
 * more information about the navigation in the backend. Do NOT edit.
 *
 * REMARK: do NOT delete this file
 *
 * @author		Backend
 * @generated	not
 */

$navigation['dashboard'] = array('url' => 'dashboard/index', 'label' => 'Dashboard');

$navigation['pages'] = array('url' => 'pages/index', 'selected_for_actions' => array('add', 'edit'), 'label' => 'Pages');

$navigation['modules'] = array('url' => null, 'label' => 'Modules');
$navigation['modules']['children']['content_blocks'] = array('url' => 'content_blocks/index', 'label' => 'ContentBlocks');
$navigation['modules']['children']['tags'] = array('url' => 'tags/index', 'label' => 'Tags');
$navigation['modules']['children']['blog'] = array('url' => null, 'label' => 'Blog');
$navigation['modules']['children']['blog']['children'][] = array('url' => 'blog/index', 'selected_for_actions' => array('add', 'edit'), 'label' => 'Articles');
$navigation['modules']['children']['blog']['children'][] = array('url' => 'blog/categories', 'selected_for_actions' => array('add_category', 'edit_category'), 'label' => 'Categories');
$navigation['modules']['children']['blog']['children'][] = array('url' => 'blog/comments', 'label' => 'Comments');
$navigation['modules']['children']['search'] = array('url' => null, 'label' => 'Search');
$navigation['modules']['children']['search']['children'][] = array('url' => 'search/statistics', 'label' => 'Statistics');
$navigation['modules']['children']['search']['children'][] = array('url' => 'search/synonyms', 'selected_for_actions' => array('add_synonym', 'edit_synonym'), 'label' => 'Synonyms');
$navigation['marketing'] = array('url' => 'analytics/index', 'selected_for_actions' => array('loading'), 'label' => 'Marketing');
$navigation['marketing']['children']['analytics'] = array('url' => 'analytics/index', 'label' => 'Analytics');
$navigation['marketing']['children']['analytics']['children'][] = array('url' => 'analytics/content', 'selected_for_actions' => array('add_landing_page'), 'label' => 'Content');
$navigation['marketing']['children']['analytics']['children'][] = array('url' => 'analytics/all_pages', 'label' => 'AllPages');
$navigation['marketing']['children']['analytics']['children'][] = array('url' => 'analytics/exit_pages', 'label' => 'ExitPages');
$navigation['marketing']['children']['analytics']['children'][] = array('url' => 'analytics/landing_pages', 'selected_for_actions' => array('add_landing_page'), 'label' => 'LandingPages');
$navigation['settings'] = array('url' => null, 'label' => 'Settings');
$navigation['settings']['children']['settings'] = array('url' => 'settings/index', 'label' => 'General');
$navigation['settings']['children']['modules'] = array('url' => null, 'label' => 'Modules');
$navigation['settings']['children']['modules']['children'][] = array('url' => 'analytics/settings', 'label' => 'Analytics');
$navigation['settings']['children']['modules']['children'][] = array('url' => 'pages/settings', 'label' => 'Pages');
$navigation['settings']['children']['modules']['children'][] = array('url' => 'blog/settings', 'label' => 'Blog');
$navigation['settings']['children']['modules']['children'][] = array('url' => 'search/settings', 'label' => 'Search');
$navigation['settings']['children']['users'] = array('url' => 'users/index', 'label' => 'Users');
$navigation['settings']['children']['templates'] = array('url' => 'pages/templates', 'label' => 'Templates', 'selected_for_actions' => array('add_template', 'edit_template'));
$navigation['settings']['children']['locale'] = array('url' => 'locale/index', 'label' => 'Translations', 'selected_for_actions' => array('add', 'edit'));

/*
@todo tijs - het onderstaande formaat, weet ik niet goed hoe dat nu mogelijk is. Bespreek dit met mij (Davy)
dashboard
pagina's
modules
- blog
>>> Articles
>>> Categories
>>> Comments
- content blocks
instellingen
- General
- Modules
>>> Blog
>>> Pages
>>> Kakamodule
- Templates
- Email
- Themes
*/

?>