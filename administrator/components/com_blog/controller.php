<?php

defined('_JEXEC') or die;

class BlogController extends JControllerLegacy
{
  protected $default_view = 'blog';

  public function taskTest()
  {
    echo 'taskTest';
  }
}
?>