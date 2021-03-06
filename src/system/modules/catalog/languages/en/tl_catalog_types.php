<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 *
 * The TYPOlight webCMS is an accessible web content management system that 
 * specializes in accessibility and generates W3C-compliant HTML code. It 
 * provides a wide range of functionality to develop professional websites 
 * including a built-in search engine, form generator, file and user manager, 
 * CSS engine, multi-language support and many more. For more information and 
 * additional TYPOlight applications like the TYPOlight MVC Framework please 
 * visit the project website http://www.typolight.org.
 * 
 * The Catalog extension allows the creation of multiple catalogs of custom items,
 * each with its own unique set of selectable field types, with field extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the 
 * data in each catalog.
 * 
 * PHP version 5
 * @copyright	Martin Komara, Thyon Design, CyberSpectrum 2007-2009
 * @author		Martin Komara, 
 * 				John Brand <john.brand@thyon.com>,
 * 				Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @package		Catalog
 * @license		LGPL 
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_catalog_types']['name'] = array('Name', 'Catalog name.');
$GLOBALS['TL_LANG']['tl_catalog_types']['tstamp']         = array('Revision date', 'Date and time of the latest revision');
$GLOBALS['TL_LANG']['tl_catalog_types']['tableName'] = array('Table name', 'Name of database table to store items to.');
$GLOBALS['TL_LANG']['tl_catalog_types']['noTable'] = array('Independent table', 'If checked the database table will not be updated when adding or removing catalog fields. Useful for editing existing tables.');

$GLOBALS['TL_LANG']['tl_catalog_types']['addImage']     = array('Add an image', 'If you choose this option, an image will be added to the catalog type listing.');
$GLOBALS['TL_LANG']['tl_catalog_types']['singleSRC']    = array('Image file', 'Please select the image to be displayed in the catalog types listing.');
$GLOBALS['TL_LANG']['tl_catalog_types']['size']        = array('Image width and height', 'Please enter either the image width, the image height or both measures to resize the image. If you leave both fields blank, the original image size will be displayed.');

$GLOBALS['TL_LANG']['tl_catalog_types']['format'] = array('Format title string', 'Enter the format string for each catalog item (optional). Images support resize and checkbox images are displayed if TRUE.<br /><strong>Example:</strong> <br /><em>&lt;strong&gt;{{title_field}}&lt;/strong&gt; &lt;em&gt;({{alias_field}})&lt;/em&gt; {{checkbox_field::src=imagefile.gif}} {{checkbox_field}}&lt;br /&gt;<br />{{image_field::w=100&h=80}}</em>');

$GLOBALS['TL_LANG']['tl_catalog_types']['jumpTo'] = array('Jump to page', 'Please select the page to which visitors will be redirected when clicking a catalog item.');
$GLOBALS['TL_LANG']['tl_catalog_types']['aliasField'] = array('Alias field', 'Select the field to use instead of using the id when creating the jumpTo link.');

$GLOBALS['TL_LANG']['tl_catalog_types']['publishField'] = array('Publish field', 'Select the field that controls the visibility of a catalog item.');
$GLOBALS['TL_LANG']['tl_catalog_types']['allowManualSort'] = array('Allow manual sorting', 'Allow manual sorting in the backend.');

$GLOBALS['TL_LANG']['tl_catalog_types']['titleField'] = array('Meta title field', 'Select the field that overrides the default meta title on the reader page.');
$GLOBALS['TL_LANG']['tl_catalog_types']['descriptionField'] = array('Meta description field', 'Select the field that overrides the default meta description on the reader page.');
$GLOBALS['TL_LANG']['tl_catalog_types']['keywordsField'] = array('Meta keywords field', 'Select the field that overrides the default meta keywords on the reader page.');

$GLOBALS['TL_LANG']['tl_catalog_types']['searchable'] = array('Searchable', 'If you choose this option, the catalog will be indexed for website searching.');
$GLOBALS['TL_LANG']['tl_catalog_types']['searchCondition'] = array('Condition', 'If you want to include or exclude certain records from being indexed, you can enter a condition here (e.g. <em>published=1</em> or <em>type!=\'admin\'</em>).');

$GLOBALS['TL_LANG']['tl_catalog_types']['fieldlist'] = array('Field List', 'Select which fields to display and in what order they should appear.');

$GLOBALS['TL_LANG']['tl_catalog_types']['allowComments']  = array('Allow comments', 'Allow your visitors to comment news items.');
$GLOBALS['TL_LANG']['tl_catalog_types']['template']       = array('Comments layout', 'Please choose a comment layout. Comment template files start with <em>com_</em>.');
$GLOBALS['TL_LANG']['tl_catalog_types']['sortOrder']      = array('Sort order', 'Please choose the sort order.');
$GLOBALS['TL_LANG']['tl_catalog_types']['perPage']        = array('Items per page', 'Please enter the number of comments per page (0 = disable pagination).');
$GLOBALS['TL_LANG']['tl_catalog_types']['moderate']       = array('Moderate', 'Approve comments before they are shown on the website.');
$GLOBALS['TL_LANG']['tl_catalog_types']['bbcode']         = array('Allow BBCode', 'Allow visitors to use BBCode to format their comments.');
$GLOBALS['TL_LANG']['tl_catalog_types']['requireLogin']   = array('Require login', 'Do not allow guests to create comments.');
$GLOBALS['TL_LANG']['tl_catalog_types']['hideMember']   = array('Hide member details if logged in', 'Hide the username and e-mail when a member is logged in.');
$GLOBALS['TL_LANG']['tl_catalog_types']['disableCaptcha'] = array('Disable security question', 'Choose this option to disable the security question (not recommended).');
$GLOBALS['TL_LANG']['tl_catalog_types']['disableWebsite'] = array('Disable website field', 'Choose this option to disable the website field.');


$GLOBALS['TL_LANG']['tl_catalog_types']['import'] = array('Enable CSV import', 'Select to enable CSV import ability for this catalog. It will then appear at the top while editing the catalog, next to export.');
$GLOBALS['TL_LANG']['tl_catalog_types']['importAdmin'] = array('Restrict to only admins', 'Select to restrict regular users from using the CSV import feature, so only admins can use it.');
$GLOBALS['TL_LANG']['tl_catalog_types']['importDelete'] = array('Allow feature: [Remove existing data]', 'Select to allow the feature that enables removal of all current data in the catalog (use with caution). This is intended for people who want to montly update the entire catalog from an external source.');


$GLOBALS['TL_LANG']['tl_catalog_types']['upgrade'] = array('Upgrade Catalog Installation', 'In order to complete the upgrade process to the new merged Catalog application, you will need to remove the Catalog Ext extension, which is now merged into the Catalog extension and therefore no longer required:
<br />
<ul>
<li>If you installed this via the Extension Repository, simply now uninstall <strong>[catalog_ext]</strong>.</li>
<li>If you manually installed it, remove  the <strong>catalog_ext/</strong> folder and its contents, manually.</li>
</ul>
Once you have removed this extension/folder, you will have access to the catalog application.');

$GLOBALS['TL_LANG']['tl_catalog_types']['activateReporting'] = array('Activate reporting', 'Enabling this option will give you the possibility to show a contact form directly in the Catalog entry so visitors can report abuses.');
$GLOBALS['TL_LANG']['tl_catalog_types']['notifyUsers'] = array('Users to notify', 'Choose one or more users that will receive an e-mail when someone reports an abuse using the form.');


/**
 * RSS Feeds.
 */
$GLOBALS['TL_LANG']['tl_catalog_types']['makeFeed']       = array('Generate feed', 'Generate an RSS or Atom feed from the news archive.');
$GLOBALS['TL_LANG']['tl_catalog_types']['feedFormat']         = array('Feed format', 'Please choose a feed format.');
$GLOBALS['TL_LANG']['tl_catalog_types']['language']       = array('Feed language', 'Please enter the page language according to the ISO-639 standard (e.g. <em>en</em> or <em>en-us</em>).');
$GLOBALS['TL_LANG']['tl_catalog_types']['source']         = array('RSS description', 'Here you can choose which field will be used for the description in the RSS.');
$GLOBALS['TL_LANG']['tl_catalog_types']['datesource']     = array('RSS published date', 'Here you can choose a date field that will get used in the RSS as the "published" value.');
$GLOBALS['TL_LANG']['tl_catalog_types']['maxItems']       = array('Maximum number of items', 'Here you can limit the number of feed items. Set to 0 to export all.');
$GLOBALS['TL_LANG']['tl_catalog_types']['feedBase']       = array('Base URL', 'Please enter the base URL with protocol (e.g. <em>http://</em>).');
$GLOBALS['TL_LANG']['tl_catalog_types']['alias']          = array('Feed alias', 'Here you can enter a unique filename (without extension). The XML feed file will be auto-generated in the root directory of your TYPOlight installation, e.g. as <em>name.xml</em>.');
$GLOBALS['TL_LANG']['tl_catalog_types']['description']    = array('Feed description', 'Please enter a short description of the catalog feed.');
$GLOBALS['TL_LANG']['tl_catalog_types']['feedTitle']    = array('Feed title', 'Please the title for this catalog feed.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_catalog_types']['title_legend']			= 'Name, table and redirect page';
$GLOBALS['TL_LANG']['tl_catalog_types']['display_legend']		= 'Display format';
$GLOBALS['TL_LANG']['tl_catalog_types']['page_legend']			= 'Page override settings';
$GLOBALS['TL_LANG']['tl_catalog_types']['comments_legend']	= 'Comments';
$GLOBALS['TL_LANG']['tl_catalog_types']['search_legend']		= 'Search';
$GLOBALS['TL_LANG']['tl_catalog_types']['import_legend']		= 'Import';
$GLOBALS['TL_LANG']['tl_catalog_types']['feed_legend']			= 'RSS/Atom feed';
$GLOBALS['TL_LANG']['tl_catalog_types']['reporting_legend']		= 'Report entries';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_catalog_types']['new']    = array('New catalog', 'Create new catalog.');
$GLOBALS['TL_LANG']['tl_catalog_types']['maintenance'] = array('Maintenance', 'Perform some maintenance tasks on your catalog tables.');
$GLOBALS['TL_LANG']['tl_catalog_types']['edit']   = array('Manage items', 'Manage items of catalog ID %s');
$GLOBALS['TL_LANG']['tl_catalog_types']['copy']   = array('Copy catalog definiton', 'Copy definition of catalog ID %s');
$GLOBALS['TL_LANG']['tl_catalog_types']['delete'] = array('Delete catalog', 'Delete catalog ID %s');
$GLOBALS['TL_LANG']['tl_catalog_types']['show']   = array('Catalog details', 'Show details of catalog ID %s');
$GLOBALS['TL_LANG']['tl_catalog_types']['editheader'] = array('Edit catalog', 'Edit the catalog');
$GLOBALS['TL_LANG']['tl_catalog_types']['fields'] = array('Define fields', 'Define fields for catalog ID %s');

/**
 * Misc.
 */
$GLOBALS['TL_LANG']['tl_catalog_types']['itemFormat'] = ' <span style="color:#b3b3b3;"><em>(%s %s)</em></span>';
$GLOBALS['TL_LANG']['tl_catalog_types']['itemSingle'] = 'item';
$GLOBALS['TL_LANG']['tl_catalog_types']['itemPlural'] = 'items';


?>