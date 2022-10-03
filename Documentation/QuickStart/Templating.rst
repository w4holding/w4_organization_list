.. include:: /Includes.rst.txt

.. _quickTemplating:

=========================
Quick templating in Fluid
=========================

EXT:w4_organization_list is using Fluid as templating engine. Copy the Fluid templates that you want to adjust to your
sitepackage extension.

You find the original templates in :file:`EXT:w4_organization_list/Resources/Private/Templates/`
and the partials in :file:`EXT:w4_organization_list/Resources/Private/Partials/`. Never change
these templates directly!

To override the standard w4_organization_list templates
with your own you can use the TypoScript **constants** to set the
paths:

.. code-block:: typoscript
   :caption: TypoScript constants

   plugin.tx_w4organizationlist {
      view {
         templateRootPath = EXT:mysitepackage/Resources/Private/Extensions/News/Templates/
         partialRootPath = EXT:mysitepackage/Resources/Private/Extensions/News/Partials/
         layoutRootPath = EXT:mysitepackage/Resources/Private/Extensions/News/Layouts/
      }
   }

Add these lines to the file
:file:`EXT:mysitepackage/Configuration/TypoScript/constants.typoscript` in your
sitepackage.
