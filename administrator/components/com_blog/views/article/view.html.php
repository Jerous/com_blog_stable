<?php
// administrator\components\com_blog\views\article\view.html.php

defined('_JEXEC') or die;

class BlogViewArticle extends JViewLegacy
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

        $this->item = $this->get('Item');

        // 包裝進 JData 能夠自動處理不存在的值
        $this->item = new JData($this->item);

        $config = JFactory::getConfig();

        // 要HTML編輯器
        $this->introEditor = JEditor::getInstance($config->get('editor'))->display('introtext', $this->item->introtext, '600px', '300px', 50, 15);
        $this->fullEditor = JEditor::getInstance($config->get('editor'))->display('fulltext', $this->item->fulltext, '600px', '300px', 50, 15);

        $this->addToolbar();

        parent::display($tpl);
    }

    public function addToolbar()
    {
        JToolbarHelper::title('文章編輯', 'pencil');
        JToolbarHelper::save('article.save');
        JToolbarHelper::cancel('article.cancel');
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