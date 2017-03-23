<?php
/**
 * Giustificativo Model for Tod Presenze Component
 * 
 * @package    todarogiovanni.todpre
 * @subpackage Components
 * @license        GNU/GPL
 */
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
 
jimport( 'joomla.application.component.model' );
 
/**
 * Giustificativo Model
 *
 * @package    todarogiovanni.todpre
 * @subpackage Components
 */
class TodpreModelGiustificativo extends JModel
{
    
	/**
	* Constructor that retrieves the ID from the request
	*
	* @access    public
	* @return    void
	*/
	function __construct()
	{
		parent::__construct();
		
		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
	}
	
	/**
	 * Method to set the Giustificativo identifier
	 *
	 * @access    public
	 * @param    int Hello identifier
	 * @return    void
	 */
	function setId($id)
	{
	    // Set id and wipe data
	    $this->_id        = $id;
	    $this->_data    = null;
	}
 
	/**
	 * Method to get a Giustificativo
	 * @return object with data
	 */
	 
	function &getData()
	{
	    // Load the data
	    if (empty( $this->_data )) {
	        $query = ' SELECT * FROM #__todpre_giustificativi '.
	                '  WHERE id = '.$this->_id;
	        $this->_db->setQuery( $query );
	        $this->_data = $this->_db->loadObject();
	    }
	    if (!$this->_data) {
	        $this->_data = new stdClass();
	        $this->_data->id = 0;
	        $this->_data->nome = null;
	        $this->_data->codice = null;
	        $this->_data->published = null;
	    }
	    return $this->_data;
	}
	
	/**
	 * Method to store a record
	 *
	 * @access    public
	 * @return    boolean    True on success
	 */
	function store()
	{
	    $row =& $this->getTable();
	 
	    $data = JRequest::get( 'post' );
	    // Bind the form fields to the Giustificativi table
	    if (!$row->bind($data)) {
	        $this->setError($this->_db->getErrorMsg());
	        return false;
	    }
	 
	    // Make sure the Giustificativo record is valid
	    if (!$row->check()) {
	        $this->setError($this->_db->getErrorMsg());
	        return false;
	    }
	 
	    // Store the web link table to the database
	    if (!$row->store()) {
	        $this->setError($this->_db->getErrorMsg());
	        return false;
	    }
	 
	    return true;
	}
	
	/**
	 * Method to delete record(s)
	 *
	 * @access    public
	 * @return    boolean    True on success
	 */
	function delete()
	{
	    $cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
	    $row =& $this->getTable();
	 
	    foreach($cids as $cid) {
	        if (!$row->delete( $cid )) {
	            $this->setError( $row->getErrorMsg() );
	            return false;
	        }
	    }
	 
	    return true;
	}
	
	/**
	* Set the published value of the given person
	*/
    function setItemState( $items, $state )
    {
        if(is_array($items))
        {
            foreach ($items as $id)
            {
                $db = JFactory::getDbo();
                $query = $db->getQuery(true);
                $query = ' update #__todpre_giustificativi set published='.$state. '  WHERE id = '.$id;
                $db->setQuery($query);
                $db->query();
            }
        }
    }
	
}