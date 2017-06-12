<?php

defined('_JEXEC') or die;

class BlogViewArticle extends JViewLegacy
{
  public function display($tpl = null)
  {
      $this->item = $this->get('Item');

      // 包裝進 JData 能夠自動處理不存在的值
      $this->item = new JData($this->item);

      $config = JFactory::getConfig();

      // 要HTML編輯器
      $this->introEditor = JEditor::getInstance($config->get('editor'))->display('introtext', $this->item->introtext, '600px', '300px', 50, 15);
      $this->fullEditor = JEditor::getInstance($config->get('editor'))->display('fulltext', $this->item->fulltext, '600px', '300px', 50, 15);

      parent::display($tpl);
  }
}

?>