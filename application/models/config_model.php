<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Config Model
 *
 * This class handles the retrieval/updating of the configuration settings
 * from the database.
 * 
 * @package		BitWasp
 * @subpackage	Model
 * @category	Config
 * @author		BitWasp
 * 
 */
class Config_model extends CI_Model {
	
	/**
	 * Config
	 * 
	 * Store the sites config here for easy access
	 */
	public $config;
	
	/**
	 * Constructor
	 * 
	 * Loads the current config into $this->config. Can specify different
	 * config rows, but yet to be implemented.
	 */
	public function __construct($config = 1){	
		$query = $this->db->get_where('config', array('id' => $config));
		if($query->num_rows() > 0){
			$this->config = $query->row_array();
		} else {
			$this->config = FALSE;
		}
	}

	/**
	 * Get
	 * 
	 * Return the current config as loaded from the database.
	 *
	 * @access	public
	 * @return	array
	 */				
	public function get(){
		return $this->config;
	}	
	
	/**
	 * Update
	 * 
	 * Update column in the config row. Indexes are column name.
	 *
	 * @access	public
	 * @param	array
	 * @return	void
	 */				
	public function update($records) {
		$success = TRUE;
		foreach($records as $key => $update){
			$this->db->where('id', '1');
			if($this->db->update('config', array($key => $update)) !== TRUE)
				$success = FALSE;
		}
		return $success;
	}
	
};

/* End of File: Config_Model.php */
