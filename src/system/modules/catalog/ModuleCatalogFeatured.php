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
 * Class ModuleCatalogFeatured
 *
 * @copyright	Martin Komara, Thyon Design, CyberSpectrum 2007-2009
 * @author		Martin Komara, 
 * 				John Brand <john.brand@thyon.com>,
 * 				Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @package		ModuleCatalogFeatured
 *
 */
class ModuleCatalogFeatured extends ModuleCatalog
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_catalogfeatured';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### CATALOG FEATURED ###';

			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			if (version_compare(VERSION.'.'.BUILD, '2.9.0', '>='))
				$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
			else
				$objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		// Fallback template
		if (!strlen($this->catalog_layout))
			$this->catalog_layout = $this->strTemplate;

		$this->strTemplate = $this->catalog_layout;

		$this->catalog_visible = deserialize($this->catalog_visible);

		return parent::generate();
	}
	
	
	
	protected function compile()
	{
		$total = 0;

		// Query Catalog
		$limit = null;
		$offset = 0;
		// issue #81
		if($this->catalog_list_use_limit)
		{
			$limit = is_numeric($this->catalog_limit)? $this->catalog_limit : 0;
			if($this->catalog_list_offset)
				$offset = $this->catalog_list_offset;
		}

		$params[0] = $this->catalog;

		$strCondition = $this->replaceInsertTags($this->catalog_where);
		$strWhere = (strlen($strCondition) ? " AND ".$strCondition : "");

		if(!BE_USER_LOGGED_IN && $this->publishField)
		{
			$strWhere.=' AND '.$this->publishField.'=1';
		}

		$strOrder = ($this->catalog_random_disable) ? trim($this->catalog_order) : "RAND()";

		$arrQuery = $this->processFieldSQL($this->catalog_visible);
		if($this->strAliasField)
			$arrQuery[] = $this->strAliasField;
		// Run Query
		$objCatalogStmt = $this->Database->prepare("SELECT ".implode(',',$this->systemColumns).",".implode(',',$arrQuery).", (SELECT name FROM tl_catalog_types WHERE tl_catalog_types.id=".$this->strTable.".pid) AS catalog_name, (SELECT jumpTo FROM tl_catalog_types WHERE tl_catalog_types.id=".$this->strTable.".pid) AS parentJumpTo FROM ".$this->strTable." WHERE pid=?".$strWhere.(strlen($strOrder) ? " ORDER BY ".$strOrder : "")); 

		
		// Limit result
		if ($limit)
		{
			$objCatalogStmt->limit($limit, $offset);
		}
	
		$objCatalog = $objCatalogStmt->execute($params);
		$total = $objCatalog->numRows;

		$this->Template->catalog = $this->parseCatalog($objCatalog, true, $this->catalog_template, $this->catalog_visible);

		// Template variables
		$this->Template->total = $total;
		$this->Template->visible = $this->catalog_visible;

	}

}

?>