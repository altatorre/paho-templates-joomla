<?php
/**
* @package   yoo_phoenix Template
* @file      changelog.php
* @version   1.5.21 January 2010
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

Changelog
------------

1.5.21
# Fixed overrides com_content (Show date/author issue)

1.5.20
+ Warp5: Added new matchUlHeight function for the drop down menu
+ Warp5: Added enter and leave events for the fancy menu
+ Warp5: Added new module templates

1.5.19
* Fixed XSS issue with yt_color (lib/php/template.php)

1.5.18
# Warp5: Fixed double page title in com_user
# Warp5: Remove inaccessable items according to user rights in drop down menu
# Warp5: PHP 5.3 compatible

1.5.17
^ Updated overrides according to Joomla 1.5.15
^ Updated Mootools to 1.1.2

1.5.16
# Warp5: Fixed 'move' mode in Fancy Menu
# Warp5: Fixed loading of custom.css

1.5.15
# Warp5: Changed loading of custom.css
# Warp5: Changed default font-weight of headings in reset.css
# Warp5: Improved JS effect of the Down Down Menu for all Internet Explorer
# Warp5: Updated and added new module templates

1.5.14
# Warp5: Fixed IE6 JS error in Fancy Menu JS if nothing is publish in the menu position
# Warp5: Fixed HTML rendering in the Drop Down Menu if there are no level 3 items

1.5.13
+ Warp5 Update: Optimized modes (fade, width, height) for Drop Down JS
+ Warp5 Update: Optimized Morph JS when using a trigger element

1.5.12
# Fixed CSS to force vertical scrollbars in Firefox 3.5 and Safari 4

1.5.11
# Fixed accordion menu bug in IE7

1.5.10
+ Warp5 Update: Added module templates (1-3-1, 3-3-3_h-x)
+ Warp5 Update: New ignoreSelector for the YOOmorph JS
# Warp5: Fixed "down" column ordering in overrides for com_content
# Fixed small CSS bug in typography.css
^ Minor change in html/module.php to support ZOO menu module 1.0.3

1.5.9
# Fixed menu loading when using loadposition plugin
# Fixed icons (PDF, E-Mail, Print) if headline is too long for Opera, IE7, IE6
# Fixed JS error if no menu is published in menu position

1.5.8
# JEditor Class was not completely removed in 1.5.3 (Fixed left/right column bug with third party components)
^ Level3 items in the dropdown menu are no longer cut off when word wrap

1.5.7
# Fixed wrong syntax in module template "dropdown"
# Fixed "top" image at the bottom for some template color varations
+ Warp5 Update: Added possibility to assign individual widths for modules published in the menu position via the Module Class Suffix, for example: dropdownwidth-255
+ Warp5 Update: The fancy menu effect is now also applied to modules published on the menu position
+ Warp5 Update: The effect of the fancy menu remains even when the cursor goes off the dropdown and back on again
+ Warp5 Update: Individual dropdown widths can be set for menu items via the Page Class Suffix, for example: columnwidth-200
+ Warp5 Update: Background images can be turned off for a specific menu via the Menu Class Suffix, for example: images-off
+ Warp5 Update: Updated a few module templates

1.5.6
^ Changed use documents headdata methods to access js and css

1.5.5
# Fixed cache path issue

1.5.4
# Fixed width for com_wrapper
# Fixed 'rel' tag in menu

1.5.3
# Fixed breadcrumbs when a menu separator is used
^ Changed loading of the custom.css to load last
- Removed: Preventing the loading of the right, contentright and contentleft columns when JEditor is loaded

1.5.2
^ Updated overrides according to Joomla 1.5.12

1.5.1
# Fixed IE6/IE7 bug relating the float-box-layout
# Fixed IE7 bug which caused messed up bottom/footer positions

1.5.0
+ Initial Release



* -> Security Fix
# -> Bug Fix
$ -> Language fix or change
+ -> Addition
^ -> Change
- -> Removed
! -> Note