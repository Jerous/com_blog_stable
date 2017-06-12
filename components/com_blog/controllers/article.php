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
 * Blog Controller.
 *
 * @package  blog
 * @since    1.0
 */
class BlogControllerArticle extends JControllerLegacy
{
  public function foo()
  {
      echo 'Article controller foo';
  }

  public function add()
  {
      $this->setRedirect(JRoute::_('index.php?option=com_blog&view=article&layout=edit', false));
  }

  public function save()
  {
      $post = $this->input->post;

      $data['id']      = $post->getInt('id');
      $data['title']   = $post->getString('title');
      $data['alias']   = $post->getString('alias');
      $data['created'] = $post->getString('created');
      $data['published'] = $post->getInt('published');
      $data['introtext'] = $post->getRaw('introtext');
      $data['fulltext']  = $post->getRaw('fulltext');

      $model = $this->getModel('Article');

      $model->save($data);

      $this->setRedirect(JRoute::_('index.php?option=com_blog&view=articles', false));
  }

  public function cancel()
  {
      $this->setRedirect(JRoute::_('index.php?option=com_blog&view=articles', false));
  }

  public function delete()
  {
      $id = $this->input->get('id');

      if (!$id)
      {
          $this->setRedirect(JRoute::_('index.php?option=com_blog&view=articles', false), '沒有 ID', 'warning');

          return false;
      }

      $model = $this->getModel('Article');

      $model->delete($id);

      $this->setRedirect(JRoute::_('index.php?option=com_blog&view=articles', false), '刪除成功');
  }

  public function edit()
  {
      $id = $this->input->get('id');

      $this->setRedirect(JRoute::_('index.php?option=com_blog&view=article&layout=edit&id=' . $id, false));
  }
}
