<?php defined('_JEXEC') or die(); ?>

=====================================================================
CMC 4.1.2 - Released 13-January-2018
=====================================================================
- missing lib_compojoom was causing errors on new installs
- module form was crashing when interest contained an ampersand
- fixed a warning on php >= 7.2

=====================================================================
CMC 4.1.1 - Released 6-January-2018
=====================================================================
- fixed [] operator not supported for strings

=====================================================================
CMC 4.1.0 - Released 25-June-2017
=====================================================================
+ MailChimp list creation from the backend
* Improved Virtuemart shop creation

=====================================================================
CMC 4.0.0 - Released 20-June-2017
=====================================================================
+ Complete VirtueMart synchronization (products, customers, orders, carts etc.)
+ Oauth2 authentication
# Minor improvements and adjustments
# wrong update profile link generated in the update preferences email
# wrong link to buy credits on the dashboard
# the dashboard was showing SQL: 00000 when the component was run on joomla with mysql PDO driver
# output better errors when the form contains errors returned from mailchimp

=====================================================================
CMC 3.0.1 - Released 02-September-2016
=====================================================================
# couldn't show more than 10 mailchimp lists for syncing
# 400: is already a list member. Use PUT to insert or update list members.
# php warnings in the user - cmc plugin

=====================================================================
CMC 3.0.0 - Released 16-August-2015
=====================================================================
^ Major rewrite to Mailchimp API v3 (previous versions of CMC will stop to function on 31.12.2016 since Mailchimp has deprecated the user of API v1.3)
~ all ecommerce 360 plugins use the new API
+ added option for disabling the double opt-in
~ no notices on PHP7
~ bug fixes

=====================================================================
CMC 2.0.0 - Released 07-July-2015
=====================================================================
+ updated the CB plugin to work with CB 2.0
+ updated the Jomsocial plugin to work with the latest Jomsocial version
+ admins are able to edit the newsletter subscription of a user in the user manager in backend
+ users are able to edit their newsletter subscriptions on their user profile in the frontend
+ administrators are able to edit the newsletter subscription, merge fields and interest in the cmc backend
+ users are able to edit their subscriptions in their CB profile in the frontend
+ pop-up signup form
+ floating signup form (left, right, bottom)
+ edit of the subscription for logged in users is possible directly on the site
+ added JED review request on the dashboard
+ option to gather anonymous stats about the environment & configuration of the extension
~ general bug fixes and code cleanup

=====================================================================
CMC 1.5.2 - Released 08-October-2014
=====================================================================
+ check if the user is running the latest version of the component on the dashboard
# form was not validated on Safari
# the CB plugin was missing the language files
+ added back the module class suffix option
# using the required parameter for phone field was breaking the form

=====================================================================
CMC 1.5.1 - Released 24-July-2014
=====================================================================
# fatal error in dashboard on joomla 2.5

=====================================================================
CMC 1.5.0 - Released 23-July-2014
=====================================================================
~ code now doesn't rely on deprecated functions in the joomla library
~ removed all mootools code and switched to jQuery
+ registration plugin now works with the k2 registration
+ option to auto-populate the fields in the module for logged in users
+ option to unsubscribe from the newsletter
+ when the user is already on the list, we offer him the option to update the information on the list, instead of overriding everything
+ subscribe on registration now can read values from the other fields and won't require the user to add his email or name twice
+ cleaned up backend and now relying on our backend template
# no groups or interests were saved to mailchimp with the registration plugin
# fatal error class Jhtml not found
# using advanced module manager was causing an error in the cmc module
# if the user is new he was not written to the cmc_users table when subscribing in the module
# if lists were containing 1000,2000,3000 etc subscribers we were never showing the success sync message
# unnecessary space in the update url
~ improved user synchronization
# fixing the bug in the redshop plugin
# setting a locale for javascript


=====================================================================
LEGEND
=====================================================================
! Note
+ New feature or addition
^ Major change
~ Small change
$ Language change
* Security fix
# Bug fix
- Feature removal
