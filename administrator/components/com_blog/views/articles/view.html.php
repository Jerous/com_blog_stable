<?php
defined('_JEXEC') or die;

class BlogViewArticles extends JViewLegacy
{
    /**
	 * Blog helper
	 *
	 * @var    BlogHelper
	 * @since  1.0
	 */
	protected $helper;

    /**
	 * The sidebar to show
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $sidebar = '';

    public function display($tpl = null)
    {
        // Show the toolbar
		$this->toolbar();

		// Show the sidebar
		$this->helper = new BlogHelper;
		$this->helper->addSubmenu('blog');
		$this->sidebar = JHtmlSidebar::render();

        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        $this->addToolbar();

        parent::display($tpl);
    }

    // 加上後台的頁面標題
    public function addToolbar()
    {
        JToolbarHelper::title('文章列表');
        JToolbarHelper::addNew('article.add');
    }

    /**
	 * Displays a toolbar for a specific page.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	private function toolbar()
	{
		JToolBarHelper::title(JText::_('COM_BLOG'), '');

		// Options button.
		if (JFactory::getUser()->authorise('core.admin', 'com_blog'))
		{
			JToolBarHelper::preferences('com_blog');
		}
	}
}

?>