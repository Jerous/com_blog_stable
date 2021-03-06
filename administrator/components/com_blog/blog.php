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

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_blog'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Require the helper
require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/blog.php';

// Execute the task
$controller = JControllerLegacy::getInstance('blog');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
