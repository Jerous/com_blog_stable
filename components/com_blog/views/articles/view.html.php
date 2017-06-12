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
 * Blog view.
 *
 * @package  blog
 * @since    1.0
 */
class BlogViewArticles extends JViewLegacy
{
  public function display($tpl = null)
  {
      $this->state = $this->get('State');
      $this->items = $this->get('Items');
      $this->pagination = $this->get('Pagination');

      parent::display($tpl);
  }
}
