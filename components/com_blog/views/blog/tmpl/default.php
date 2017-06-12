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

JHtml::_('script', 'com_blog/script.js', false, true);
JHtml::_('stylesheet', 'com_blog/style.css', array(), true);

$layout = new JLayoutFile('blog.page');
$data = new stdClass;
$data->text = 'Hello Joomla!';
echo $layout->render($data);