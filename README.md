# Mybooking Child Theme

Basic files for developing a child theme based on Mybooking.

You can get the Mybooking parent theme at WordPress.org repo or clone it from GitHub:
https://github.com/mybooking-es/mybooking

You can get the Mybooking Engine plugin at WordPress.org repo or clone it from GitHub:
https://github.com/mybooking-es/mybooking-wp-plugin

## Install

Before install you need:

- A fresh copy of Mybooking parent theme installed
- Mybooking Engine Plugin installed and configured (see below)

You also can install:
- Mybooking Importer template library plugin
- Elementor Page Builder plugin

Then you can upload a zipped copy of this repo and then install and activate like a regular theme.

## Enviroment setup

This child theme inherits all markup, styles and scripts from parent theme wich you can reset and extend puting your own code on.

Refer to WordPress docs for extra information about child theme developement:
https://codex.wordpress.org/Child_Themes

### Setup theme pages

In order to configure Mybooking plugin to get demo content, you need to setup the home and process pages. You can install Mybooking Importer plugin from WordPress repo, to setup your development site and get all process pages pre-configured, or do it manually:

- Create a Home page, asign Mybooking Home template and setup as Homepage
- Configure the theme header at Apperance -> Customize -> Mybooking Theme -> Header
- At Mybooking Home Template Header Left (or right) widget area add the selector widget to or the shortcode
- Create pages Choose, Complete, Summary and My reservation, and add the related shortcodes (see below)

**Basic shortcodes**
[mybooking_rent_engine_selector] 	                    *Renting selector form*
[mybooking_rent_engine_selector_wizard] 	            *Wizard selector form*
[mybooking_rent_engine_transfer-selector]             *Transfer selector form*

[mybooking_rent_engine_product_listing] 	            *Choose product*

[mybooking_rent_engine_complete] 	                    *Complete for renting*
[mybooking_activities_engine_shopping_cart]           *Complete for activities*

[mybooking_rent_engine_summary] 	                    *Summary for renting*
[mybooking_activities_engine_summary]                 *Summary for activities*

[mybooking_rent_engine_reservation] 	                *My reservation for renting*
[mybooking_activities_engine_order]                   *My reservation for activities*

**Optional shortcodes**
[mybooking_rent_engine_products]                      *Product catalog, no boooking button (1)*
[mybooking_activities_engine_activities]              *Activities catalog, no boooking button (2)*

(1)(2) If you are using catalog shortcodes, you must create an additional page for testing single product pages with dates calendar and put one the below shortcode on it. In this case, selector form at Home and Choose page and shortcode are not needed.

**Single product shortcodes**
[mybooking_renting_engine_product code=BBB-00001]     *Product calendar for testing camper and charter*
[mybooking_activities_engine_activity activity_id=5]  *Product calendar for testing activity*
[mybooking_rent_engine_product code=5]                *Product calendar for testing charter*

### Setup Mybooking plugin

Make shure you already installed Mybooking, then configure it:

1- Go to *Mybooking* plugin menu and setup demo data using the following credentials at Connection tab:
2- Choose the type of bussiness to load at **Modules** tab
3- Assing the process pages and activate *Use product detail pages* at the new appearing tab
4- As you are using Mybooking Theme you must deactivate everything at **Advanced** tab
5- Test the booking process to be sure configuration is correct

### Reset Mybooking templates

For reset the booking process templates just copy them from Mybooking Theme to /mybooking templates child's folder and customize the HTML at your criteria.
