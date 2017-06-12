<?php
/**
 * @package    blog
 *
 * @author     Jerous <tlu37317@gmail.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://www.tellustek.com
 */

defined('_JEXEC') or die;

/**
 * Blog model.
 *
 * @package  blog
 * @since    1.0
 */
class BlogModelArticle extends JModelLegacy
{
  public function getTable($name = 'Article', $prefix = 'BlogTable', $options = array())
  {
      return parent::getTable($name, $prefix, $options);
  }

  public function getItem()
  {
      $table = $this->getTable();
      $input = JFactory::getApplication()->input;
      $id = $input->get('id');

      if (!$id)
      {
          return false;
      }
      
      $table->load($id);

      return $table;
  }

  public function save($data)
  {
      $table = $this->getTable();
      $table->bind($data);

      return $table->store();
  }

  public function delete($id)
  {
      $table = $this->getTable();

      return $table->delete($id);
  }
}
