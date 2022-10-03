.. include:: /Includes.rst.txt

.. _quickContent:
.. _howToStart:

===========================
Create some initial content
===========================

.. _quickPageStructure:

Recommended page structure
==========================

Create at least the following pages:

*  "Home": Root page of the site, containing the root TypoScript template record and
   the start page content: Normal page.
*  "Organization Storage": A folder to store the news in: Folder

Usually you will also need

*  "Organization list": A list page to display all news on: Normal page

Your page tree could, for example look like that:

.. code-block:: none

   Home
   ├── Some page
   ├── ...
   ├── Organization list
   ├── ...
   └── Storage
      ├── Other storage
      ├── ...
      └── Organization Storage


.. _quickNewsRecords:
.. _howToStartCreateRecords:

Create organization records
===================

Before any organization record can be shown in the frontend those need to be
created.

.. include:: /Images/AutomaticScreenshots/AddNewsInAdminModule.rst.txt

#. Go to the module :guilabel:`Web > List`

#. Go to the "Organization Storage" Folder that you created in the first step.

#. Use the icon in the topbar :guilabel:`+`

#. Click on the link :guilabel:`Organization`

#. Fill out all desired fields and click :guilabel:`Save`


.. _howToStartAddPlugin:

Add plugins: display the Organization List in the frontend
=============================================

A plugin is used to render a defined selection of records in the frontend.
Follow these steps to add a plugin for list view to a page:

List page
---------

#. Go to module :guilabel:`Web > Page` and to the previously created page
   "Organization list".

#. Add a new content element and select the entry
   :guilabel:`Plugins > Organization list`

#. Switch to the tab :guilabel:`Plugin` where you can define the plugins settings.
   The most important settings are :guilabel:`Show items` and :guilabel:`Record Storage Page`

#. The field :guilabel:`Show items` has two options :guilabel:`of all users list` and :guilabel:`of current user list`.
   the option shows all the records available in the configured storage folder and :guilabel:`of current user list` opton only shows the Organization records of current logged in user.Choose one of the option depending upon the requirement.

#. Fill the field :guilabel:`Record Storage Page` by selecting the :guilabel:`sysfolder` you created
   in the beginning of the tutorial.

#. Save the plugin.

.. figure:: /Images/Screenshots/Plugin.png
   :class: with-shadow
