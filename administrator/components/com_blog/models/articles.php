<?php

defined('_JEXEC') or die;

class BlogModelArticles extends JModelList
{
	protected function getListQuery()
	{
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
        
        $published = $this->getState('filter.published', '');
        $search = $this->getState('filter.search');

        if ($search)
        {
            $conditions = '(`title` LIKE "%' . $search . '%"';
            $conditions .= ' OR `introtext` LIKE "%' . $search . '%"';
            $conditions .= ' OR `fulltext` LIKE "%' . $search . '%")';

            $query->where($conditions);
        }

        if ($published !== '')
        {
            $query->where('published = ' . $published);
        }

		$query->select('*')
                ->from($db->quoteName('#__blog_articles'));
 
		return $query;
	}

    protected function populateState()
    {
        $app = JFactory::getApplication();
        $input = $app->input;

        $this->setState('filter.search', $app->getUserStateFromRequest('blog.articles.search', 'filter_search'));
        $this->setState('filter.published', $app->getUserStateFromRequest('blog.articles.published', 'filter_published'));
        $this->setState('list.ordering', $app->getUserStateFromRequest('blog.articles.ordering', 'filter_order'));
        $this->setState('list.direction', $app->getUserStateFromRequest('blog.articles.direction', 'filter_order_Dir'));
        $this->setState('list.limit', 10);
        $this->setState('list.start', $app->getUserStateFromRequest('blog.articles.start', 'limitstart'));
    }

}

?>