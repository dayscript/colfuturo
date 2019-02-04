CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Recommended modules
 * Installation
 * Configuration
 * Troubleshooting
 * FAQ
 * Maintainers

INTRODUCTION
------------

The Services Content Types module allows services created with the Services
module to be enabled for selective content types. The Services module
currently takes an all or nothing approach to creating services for nodes.
Using this module allows granular control over which content types can
be accessed using Services.

Installing Services Entity API module extends the functionality of this module.
Output for enabled services can be modified using the Services Entity API
module resource controllers. This is helpful to remove all Drupalisms from
generated content. For example, field_ prefix and language (und) wrappers.

 * For a full description of the module, visit the project page:
   https://drupal.org/project/services_content_types

 * To submit bug reports and feature suggestions, or to track changes:
   https://drupal.org/project/issues/services_content_types

REQUIREMENTS
------------

This module requires the following modules:

 * Services (https://www.drupal.org/project/services)

 * Services Entity Api (https://www.drupal.org/project/services_entity) (Optional)

INSTALLATION
------------

 * Install as you would normally install a contributed Drupal module. See:
   https://drupal.org/documentation/install/modules-themes/modules-7
   for further information.

 * Install Services module and enable. See:
   https://www.drupal.org/project/services

 * Install Services Entity API module and enable. (Optional) See:
   https://www.drupal.org/project/services_entity

RECOMMENDED MODULES
-------------------

 * None (ATM).

CONFIGURATION
-------------

 * Configure this module using the Services configuration page.
   SITE_URL/admin/structure/services

 - A service can be enabled for each content type.

 * Configure this module using the Services Content Types configuration page.
   SITE_URL/admin/config/services/services-content-types

 - Choose resource controller if Services Entity API is installed.

TROUBLESHOOTING
---------------

None.

FAQ
---

None.

MAINTAINERS
-----------

Current maintainers:
 * Brian Glass (monstrfolk) - https://www.drupal.org/u/monstrfolk
