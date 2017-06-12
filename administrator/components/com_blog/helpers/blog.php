<?php
/**
 * @package    blog
 *
 * @author     Jerous <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;

/**
 * Blog helper.
 *
 * @package     A package name
 * @since       1.0
 */
class BlogHelper
{
	/**
	 * Render submenu.
	 *
	 * @param   string  $vName  The name of the current view.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(JText::_('COM_BLOG'), 'index.php?option=com_blog&view=blog', $vName == 'blog');
		JHtmlSidebar::addEntry(JText::_('新增文章'), 'index.php?option=com_blog&view=article&layout=edit', $vName == 'article');
		JHtmlSidebar::addEntry(JText::_('文章列表'), 'index.php?option=com_blog&view=articles', $vName == 'articles');
	}
}
