<?php

/**
 * FrontendBlogCategory
 * This is the category-action
 *
 * @package		frontend
 * @subpackage	blog
 *
 * @author 		Tijs Verkoyen <tijs@netlash.com>
 * @since		2.0
 */
class FrontendBlogCategory extends FrontendBaseBlock
{
	/**
	 * The articles
	 *
	 * @var	array
	 */
	private $articles;


	/**
	 * The requested category
	 *
	 * @var	array
	 */
	private $category;


	/**
	 * The pagination array
	 * It will hold all needed parameters, some of them need initialization
	 *
	 * @var	array
	 */
	protected $pagination = array('limit' => 10, 'offset' => 0, 'requested_page' => 1, 'num_items' => null, 'num_pages' => null);


	/**
	 * Execute the extra
	 *
	 * @return	void
	 */
	public function execute()
	{
		// call the parent
		parent::execute();

		// load template
		$this->loadTemplate();

		// load the data
		$this->getData();

		// parse
		$this->parse();
	}


	/**
	 * Load the data, don't forget to validate the incoming data
	 *
	 * @return	void
	 */
	private function getData()
	{
		// get categories
		$categories = FrontendBlogModel::getAllCategories();
		$possibleCategories = array();
		foreach($categories as $category) $possibleCategories[$category['url']] = $category['id'];

		// requested category
		$requestedCategory = SpoonFilter::getValue($this->URL->getParameter(1, 'string'), array_keys($possibleCategories), 'false');

		// requested page
		$requestedPage = $this->URL->getParameter('page', 'int');

		// no page given
		if($requestedPage === null) $requestedPage = 1;

		// set category
		$this->category = $categories[$possibleCategories[$requestedCategory]];

		// validate category
		if($requestedCategory == 'false') $this->redirect(FrontendNavigation::getURL(404));

		// set URL
		$this->pagination['url'] = FrontendNavigation::getURLForBlock('blog', 'category') .'/'. $requestedCategory;

		// populate count fields in pagination
		$this->pagination['num_items'] = FrontendBlogModel::getAllForCategoryCount($requestedCategory);
		$this->pagination['num_pages'] = (int) ceil($this->pagination['num_items'] / $this->pagination['limit']);

		// redirect if the request page doesn't exists
		if($requestedPage > $this->pagination['num_pages'] || $requestedPage < 1) $this->redirect(FrontendNavigation::getURL(404));

		// populate calculated fields in pagination
		$this->pagination['requested_page'] = $requestedPage;
		$this->pagination['offset'] = ($this->pagination['requested_page'] * $this->pagination['limit']) - $this->pagination['limit'];

		// get articles
		$this->articles = FrontendBlogModel::getAllForCategory($requestedCategory, $this->pagination['limit'], $this->pagination['offset']);
	}


	/**
	 * Parse the data into the template
	 *
	 * @return	void
	 */
	private function parse()
	{
		// get RSS-link
		$rssLink = FrontendModel::getModuleSetting('blog', 'feedburner_url_'. FRONTEND_LANGUAGE);
		if($rssLink == '') $rssLink = FrontendNavigation::getURLForBlock('blog', 'rss');

		// add RSS-feed into the metaCustom
		$this->header->addMetaCustom('<link rel="alternate" type="application/rss+xml" title="'. FrontendModel::getModuleSetting('blog', 'rss_title_'. FRONTEND_LANGUAGE) .'" href="'. $rssLink .'" />');

		// add into breadcrumb
		$this->breadcrumb->addElement(ucfirst(FL::getLabel('Category')));
		$this->breadcrumb->addElement($this->category['label']);

		// set pageTitle
		$this->header->setPageTitle(ucfirst(FL::getLabel('Category')));
		$this->header->setPageTitle($this->category['label']);

		// assign category
		$this->tpl->assign('blogCategory', $this->category);

		// assign articles
		$this->tpl->assign('blogArticles', $this->articles);

		// parse the pagination
		$this->parsePagination();
	}
}

?>