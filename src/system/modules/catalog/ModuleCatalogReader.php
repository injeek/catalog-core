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
 * Class ModuleCatalogReader
 *
 * @copyright	Martin Komara, Thyon Design, CyberSpectrum 2007-2009
 * @author		Martin Komara, 
 * 				John Brand <john.brand@thyon.com>,
 * 				Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @package		Controller
 *
 */
class ModuleCatalogReader extends ModuleCatalog
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_catalogreader';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### CATALOG READER ###';

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


	/**
	 * Generate module
	 */
	protected function compile()
	{
		global $objPage;

		$this->Template->catalog = '';
		$this->Template->referer = $this->getReferer(ENCODE_AMPERSANDS);
		$this->Template->back = $GLOBALS['TL_LANG']['MSC']['goBack'];
		$this->Template->gobackDisable = $this->catalog_goback_disable;

		$objCatalogType = $this->Database->prepare("SELECT aliasField,titleField,descriptionField,keywordsField FROM tl_catalog_types WHERE id=?")
										->execute($this->catalog);

		$strAlias = $objCatalogType->aliasField ? " OR ".$objCatalogType->aliasField."=?" : '';

		$arrConverted = $this->processFieldSQL($this->catalog_visible);

		// Overwrite page title
		if (strlen($objCatalogType->titleField)) 
		{
			$titleField = $objCatalogType->titleField;
			$this->systemColumns = array_merge($this->systemColumns, array($titleField));
		}

		// Overwrite page description
		if (strlen($objCatalogType->descriptionField)) 
		{
			$descriptionField = $objCatalogType->descriptionField;
			$this->systemColumns = array_merge($this->systemColumns, array($descriptionField));
		}

		// Overwrite page keywords
		if (strlen($objCatalogType->keywordsField)) 
		{
			$keywordsField = $objCatalogType->keywordsField;
			$this->systemColumns = array_merge($this->systemColumns, array($keywordsField));
		}

		/*
			$objCatalog = $this->Database->prepare("SELECT *, (SELECT name FROM tl_catalog_types WHERE tl_catalog_types.id=".$this->strTable.".pid) AS catalog_name, (SELECT jumpTo FROM tl_catalog_types WHERE tl_catalog_types.id=".$this->strTable.".pid) AS parentJumpTo FROM ".$this->strTable." WHERE (CAST(id AS CHAR)=?".$strAlias.")")
											->limit(1)
											->execute($this->Input->get('items'), $this->Input->get('items'));
		*/
		// We have to handle numeric input data differently from string input, as otherwise
		// we have the problem that within MySQL the following is really true:
		// Given: id INT(10), alias VARCHAR(...) and a string to match in a query 'somestring'.
		// id=15
		// alias='15-some-alias-beginning-with-digits'
		// somestring='15'
		// in MySQL this all(!) matches in the original Query here, therefore we have to change it 
		// (and in all other modules aswell).
		// So, if the input is numeric, do id lookup, otherwise do the alias lookup.
		// Note we are enforcing a "no numeric aliases policy here but we 
		// can live with that as we would get random results anyway.
		$value=$this->Input->get('items');
		$strAlias = $objCatalogType->aliasField ? $objCatalogType->aliasField : (is_numeric($value) ? "id" : '');
		if(strlen($strAlias))
		{
			$objCatalog = $this->Database->prepare('SELECT '.implode(',',$this->systemColumns).','.implode(',',$arrConverted).', (SELECT name FROM tl_catalog_types WHERE tl_catalog_types.id='.$this->strTable.'.pid) AS catalog_name, (SELECT jumpTo FROM tl_catalog_types WHERE tl_catalog_types.id='.$this->strTable.'.pid) AS parentJumpTo FROM '.$this->strTable.' WHERE '.(!BE_USER_LOGGED_IN && $this->publishField ? $this->publishField.'=1 AND ' : ''). $strAlias . '=?')
										->limit(1)
										->execute($value);
		}

		// if no item, then check if add allowed and then show add form
		if (!$objCatalog || $objCatalog->numRows < 1)
		{
			$this->Template->catalog = '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['catalogItemInvalid'].'</p>';

			// Do not index the page
			$objPage->noSearch = 1;
			$objPage->cache = 0;

			// Send 404 header
			header('HTTP/1.0 404 Not Found');
			return;
		}
		
		$this->Template->visible = $this->catalog_visible;


		// Overwrite page title
		if (strlen($objCatalogType->titleField)) 
		{
			$objPage->pageTitle = $objCatalog->$titleField;
		}

		// Overwrite page description
		if (strlen($objCatalogType->descriptionField)) 
		{
			// according to issue #176 we should rather add the description instead of rewriting it.
			// This is harmless as the reader is on a own page anyway and therefore the editor can leave
			// the description blank for this page then.
			$objPage->description .= strip_tags($objCatalog->$descriptionField);
		}

		// Overwrite page keywords
		if (strlen($objCatalogType->keywordsField)) 
		{
			$GLOBALS['TL_KEYWORDS'] .= $this->gererateKeywords($objCatalog->$keywordsField);
		}

		// Process Comments if not disabled
		if (!$this->catalog_comments_disable)
		{
			$this->processComments($objCatalog);	
		}
		// Keep this at the end to allow the reader template to manipulate $objPage
		$this->Template->catalog = $this->parseCatalog($objCatalog, false, $this->catalog_template, $this->catalog_visible);
	}
	
	/**
	 * Generate keywords from a raw string
	 * @param string
	 * @return string
	 */
	protected function gererateKeywords($strInput)
	{

		$strKeywords = '';

		// remove html
		$strInput = strip_tags($strInput);

		// remove special characters
		$strInput = str_replace($GLOBALS['TL_CONFIG']['catalog']['keywordsInvalid'], ',', $strInput);

		// remove linebreaks
		$strInput = preg_replace('/(\n|\r|\r\n)+/', ' ', $strInput);

		// divide input string into single words
		$arrKeywords = explode(',', $strInput);

		foreach($arrKeywords as $strKeyword)
		{
			// ignore unimportant words, empty strings and words shorter than 3 chars
			if (in_array($strKeyword, $GLOBALS['TL_LANG']['MSC']['keywordsBlacklist']) || strlen($strKeyword) < 3)
				continue;

			// add nice keywords to output string
			else $strKeywords .= (strlen($strKeywords) ? ', ' : '') . $strKeyword;
		}

		// reduce to max. keywords
		if (count($arrKeywords)>$GLOBALS['TL_CONFIG']['catalog']['keywordCount'])
			$arrKeywords = array_slice($arrKeywords, 0, $GLOBALS['TL_CONFIG']['catalog']['keywordCount']);


		return($strKeywords);
	}
	
	
}

?>