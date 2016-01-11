=== Plugin Name ===
Contributors: cryout-creations
Donate link: http://www.cryoutcreations.eu/donate/
Tags: theme, admin
Requires at least: 4.0
Tested up to: 4.4
Stable tag: 0.5.4
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

This plugin is designed to inter-operate with our Mantra, Parabola, Tempera, Nirvana themes to restore their settings pages.

== Description ==

This plugin is designed to inter-operate with our [Parabola](https://wordpress.org/themes/parabola/), [Tempera](https://wordpress.org/themes/tempera/), [Nirvana](https://wordpress.org/themes/nirvana/) themes and restore their advanced settings pages which we had to remove due to the Customize-based settings enforcement.

Additionally, it returns the themes' settings pages to working condition in Mantra, Parabola and Tempera on WordPress 4.4-RC1 and newer.

= Compatibility = 
The plugin is meant to be used with the following theme releases:

* Parabola version 1.6 and newer
* Tempera version 1.4 and newer
* Nirvana version 1.2 and newer

On WordPress 4.4-RC1 or newer it will restore the settings pages to working condition in:

* Parabola versions 0.9 - 1.5.1
* Tempera versions 0.9 - 1.3.3
* Mantra versions 2.0 - 2.4.1.1

You do not need this plugin if you use do not use any of the listed themes.

== Installation ==

0. Have one of our supported themes activated with a non-working or missing settings page.
1. Upload `cryout-theme-settings` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to Appearance > "Theme" Settings to access the restored theme settings page. 

== Changelog ==

= 0.5.4 = 
* Fixed compatibility support for Mantra

= 0.5.3 = 
* Added support for Tempera 1.4
* Fixed typo causing error in compatibility code

= 0.5.2 = 
* Added themes compatibility fix for WordPress 4.4-RC1 and newer

= 0.5.1 = 
* Fixed detection of parent theme name and version when using a child theme
* Clarified plugin information

= 0.5 =
* Initial release. Currently only Nirvana 1.2 implements support for this plugin.
