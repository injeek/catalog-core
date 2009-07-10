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
 * Language file for table tl_catalog_fields (en).
 *
 * PHP version 5
 * @copyright  Martin Komara, Thyon Design 2008
 * @author     Martin Komara, John Brand <john.brand@thyon.com> 
 * @package    Catalog
 * @license    GPL 
 * @filesource
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_catalog_fields']['name'] = array('Label', 'Field label is used to describe the field.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['description'] = array('Description', 'Field description. Shown under input field to provide help or description of the field.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['colName'] = array('Column name', 'Name of the column in the database table.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['type'] = array('Type', 'Type of field.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['titleField'] = array('Visible in back-end list view', 'This enables the field to be  displayed in the back-end list view (also required for custom display string).');
$GLOBALS['TL_LANG']['tl_catalog_fields']['aliasTitle'] = array('Alias title field', 'Please select the title field to be used for auto-generation of the alias.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['filteredField'] = array('Enable back-end filter', 'This adds a back-end filter drop-down in the header panel layout, with a list of all the field values.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['insertBreak'] = array('Insert break before', 'Creates a break between fields for better visual grouping.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['searchableField'] = array('Enable back-end search', 'This adds the current field to the back-end search drop-down in the header panel layout.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['sortingField'] = array('Enable sort drop-down', 'This adds the current field to the the back-end sort drop-down in the header panel layout.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['groupingMode'] = array('Sorting mode', 'If you want to sort items in TL backend according to this field, select one of grouping modes.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['parentCheckbox'] = array('Controlling checkbox', 'Please select a checkbox. Current field is hidden in edit view until the selected checkbox is checked.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['mandatory'] = array('Mandatory', 'Whether the user is required to fill in the field.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['uniqueItem'] = array('Unique', 'Whether this field is unique within the table.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['defValue'] = array('Default value', 'Please enter the default value for the field.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['minValue'] = array('Minimum', 'Specifies the minimal value user can input.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['maxValue'] = array('Maximum', 'Specifies the maximal value user can input.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['rte'] = array('Rich text', 'If select, rich text editor is displayed.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['itemTable'] = array('Options source table', 'Please select a table where options are stored.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['itemTableIdCol'] = array('Table id column', 'Please select an ID column of the table.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['itemTableValueCol'] = array('Table value column', 'Please select a column storing description of an option.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['itemSortCol'] = array('Display sort column', 'Please select a column to sort the options when displayed.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['limitItems'] = array('Customize the options selection', 'Allows you to set custom parameters for the selection of options for the field. By default, all items will be shown as collapsed.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['items'] = array('Select root items', 'Please select one or more root (parent) points for the field options (all items below are selectable by user).');
$GLOBALS['TL_LANG']['tl_catalog_fields']['childrenSelMode'] = array('Select Children Mode', 'Select how to display items in the back-end. Collapsed items will display as a select or checkbox field, otherwise as a table tree.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['includeTime'] = array('Include time', 'If selected, user is able to enter date and time.');

$GLOBALS['TL_LANG']['tl_catalog_fields']['format'] = array('Format', 'Enable to format the value using one of the formatting functions.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['formatFunction'] = array('Format type', 'Select which formatting function will be used.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['formatStr'] = array('Formatting string', 'Enter the format string. For <strong>Text</strong>: enter [<a href="http://php.net/sprintf" onclick="window.open(this.href)">sprintf</a>] format string, for <strong>Number</strong> - enter decimals only, as TL configured separators are used, for <strong>Date</strong> - enter [<a href="http://php.net/date" title="Click to open link" onclick="window.open(this.href)">date</a>] format.');

$GLOBALS['TL_LANG']['tl_catalog_fields']['showLink'] = array('Create Fullscreen or Download link', 'Wraps the item in a link that will show the fullscreen image or download the file.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['showImage'] = array('Display image', 'If selected, a thumbnail will be created for image files.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['imageSize'] = array('Image width and height', 'Please enter either the image width, the image height or both measures to resize the image. If you leave both fields blank, the original image size will be displayed.');

$GLOBALS['TL_LANG']['tl_catalog_fields']['multiple'] = array('Multiple selection', 'If selected, user will be able to select more than one item.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['customFiletree'] = array('Customize the File Tree', 'Allows you to set custom options for the Filetree.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['uploadFolder'] = array('Set file root folder', 'Selects the root point from which the user will select this file field.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['validFileTypes'] = array('Valid file types', 'Please enter a comma separated list of extensions of valid file types for this field.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['filesOnly'] = array('Allow files only', 'Select this option to restrict the file browser to files only (folders not selectable).');


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_catalog_fields']['groupingModeOptions'] = array(
    'Do not group',
    'Group by initial letter and sort ascending',
    'Group by initial letter and sort descending',
    'Group by initial two letters and sort ascending',
    'Group by initial two letters and sort descending',
    'Group by day and sort ascending',
    'Group by day and sort descending',
    'Group by month and sort ascending',
    'Group by month and sort descending',
    'Group by year and sort ascending',
    'Group by year and sort descending',
    'Group and sort ascending',
    'Group and sort descending',
);

$GLOBALS['TL_LANG']['tl_catalog_fields']['childOptions']['items'] = 'Show selected items collapsed';
$GLOBALS['TL_LANG']['tl_catalog_fields']['childOptions']['children'] = 'Show children of selected items collapsed';
$GLOBALS['TL_LANG']['tl_catalog_fields']['childOptions']['treeAll'] = 'Tree with all items selectable';
$GLOBALS['TL_LANG']['tl_catalog_fields']['childOptions']['treeChildrenOnly'] = 'Tree with only children selectable';


$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['text']			= 'Text';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['alias'] 		= 'Alias';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['longtext']	= 'Long text';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['number']		= 'Number';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['decimal']	= 'Decimal';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['date']			= 'Date';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['select']		= 'Select';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['tags']			= 'Tags';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['checkbox']	= 'Checkbox';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['url']			= 'Url';
$GLOBALS['TL_LANG']['tl_catalog_fields']['typeOptions']['file']			= 'File';


$GLOBALS['TL_LANG']['tl_catalog_fields']['formatFunctionOptions']['string']	= 'String';
$GLOBALS['TL_LANG']['tl_catalog_fields']['formatFunctionOptions']['number']	= 'Number';
$GLOBALS['TL_LANG']['tl_catalog_fields']['formatFunctionOptions']['date']		= 'Date';
//$GLOBALS['TL_LANG']['tl_catalog_fields']['formatFunctionOptions']['money']	= 'Money';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_catalog_fields']['new']    = array('New field', 'Create new field.');
$GLOBALS['TL_LANG']['tl_catalog_fields']['edit']   = array('Edit field', 'Edit field ID %s');
$GLOBALS['TL_LANG']['tl_catalog_fields']['copy']   = array('Copy field', 'Copy field ID %s');
$GLOBALS['TL_LANG']['tl_catalog_fields']['cut']   = array('Move field', 'Move field ID %s');
$GLOBALS['TL_LANG']['tl_catalog_fields']['delete'] = array('Delete field', 'Delete field ID %s');
$GLOBALS['TL_LANG']['tl_catalog_fields']['show']   = array('Field details', 'Show details of field ID %s');
$GLOBALS['TL_LANG']['tl_catalog_fields']['editheader'] = array('Edit item type', 'Edit the item type');


?>