.. include:: /Includes.rst.txt

.. _quickConfiguration:

===================
Quick configuration
===================

Include TypoScript template
===========================

It is necessary to include at least the basic TypoScript provided by this
extension.

Go module :guilabel:`Web > Template` and chose your root page. It should
already contain a TypoScript template record. Switch to view
:guilabel:`Info/Modify` and click on :guilabel:`Edit the whole template record`

.. figure:: /Images/Screenshots/W4OrganizationListIncludeTypoScript.png
   :class: with-shadow

Switch to tab :guilabel:`Includes` and add the following templates from the list
to the right: :guilabel:`W4OrganizationList (w4_organization_list)`

Further reading
===============

*  :ref:`Global extension configuration <extensionConfiguration>`
*  :ref:`TypoScript <typoscript>`, mainly configuration for the frontend
*  :ref:`TsConfig <tsconfig>`, configuration for the backend
*  :ref:`Routing <routing>` for human readable URLs
*  :ref:`Templating <quickTemplating>` customize the templates
