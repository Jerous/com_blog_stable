<?php
defined('_JEXEC') or die;

class BlogTableArticle extends JTable
{
    public function __construct($db)
    {
        parent::__construct('#__blog_articles', 'id', $db);
    }
}

?>