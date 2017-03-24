<?php
/**
 * Giustificativi Model for Tod Presenze Component
 *
 * @package    todarogiovanni.todpre
 * @subpackage Components
 * @license        GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

/**
 * Giustificativi Model
 *
 * @package    todarogiovanni.todpre
 * @subpackage Components
 */
class TodpreModelGiustificativi extends JModel
{
    /**
    * Items total
    * @var integer
    */
    var $_total = null;

    /**
    * Pagination object
    * @var object
    */
    var $_pagination = null;

    /**
     * Richieste data array
     *
     * @var array
     */
    var $_data;

    function __construct()
    {
        parent::__construct();

        $mainframe = JFactory::getApplication();

        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');

        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);

        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }

    /**
     * Builds a query to get data from #__todpre_giustificativi
     * @return string SQL query
     */
    function _buildQuery()
    {
      $db =& $this->getDBO();
      $rtable = $db->nameQuote('#__todpre_giustificativi');
      $ctable = $db->nameQuote('#__categories');
      $query = ' SELECT r.*, cc.title AS cat_title'
             . ' FROM ' . $rtable. ' AS r'
             . ' LEFT JOIN '.$ctable.' AS cc ON cc.id=r.catid'
             . $this->_buildQueryOrderBy();

      return $query;

    }

    /**
     * Build the ORDER part of a query
     *
     * @return string part of an SQL query
     */
    function _buildQueryOrderBy()
    {
      global $mainframe, $option;
      // Array of allowable order fields
      $orders = array('nome', 'codice', 'category',
                      'published', 'ordering', 'id');

      // Get the order field and direction, default order field
      // is 'ordering', default direction is ascending
      $filter_order = $mainframe->getUserStateFromRequest(
       $option.'filter_order', 'filter_order', 'ordering');
      $filter_order_Dir = strtoupper(
        $mainframe->getUserStateFromRequest(
          $option.'filter_order_Dir', 'filter_order_Dir', 'ASC'));

      // Validate the order direction, must be ASC or DESC
      if ($filter_order_Dir != 'ASC' && $filter_order_Dir != 'DESC')
      {
        $filter_order_Dir = 'ASC';
      }

      // If order column is unknown use the default
      if (!in_array($filter_order, $orders))
      {
        $filter_order = 'ordering';
      }
      $orderby = ' ORDER BY '.$filter_order.' '.$filter_order_Dir;
      if ($filter_order != 'ordering')
      {
        $orderby .= ' , ordering ';
      }
      // Return the ORDER BY clause

      return $orderby;
    }

    /**
     * Retrieves the hello data
     * @return array Array of objects containing the data from the database
     */
    function getData()
    {
        // Lets load the data if it doesn't already exist
        if (empty( $this->_data ))
        {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList( $query , $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_data;
    }

    function getTotal()
    {
       	// Load the content if it doesn't already exist
       	if (empty($this->_total)) {
       	    $query = $this->_buildQuery();
       	    $this->_total = $this->_getListCount($query);
       	}
       	return $this->_total;
    }

    function getPagination()
    {
       	// Load the content if it doesn't already exist
       	if (empty($this->_pagination)) {
       	    jimport('joomla.html.pagination');
       	    $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
       	}
       	return $this->_pagination;
    }
}
