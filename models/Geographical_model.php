<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Geographical_model extends App_Model
{
    /**
    * Controler __construct function to initialize options
    */
    protected $table;
    protected $primaryKey = 'country_id';
    public function __construct()
    {
        parent::__construct();
        $this->table = db_prefix()."countries";
         
    }
    public function get($id='',$where=[],$orWhere=[])
    {
        if(!empty($where))
        {
            $this->db->where($where);
        }
        if(!empty($orWhere))
        {
            $this->db->or_where($orWhere);
        }
    	if($id != '')
    	{
    		$this->db->where($this->primaryKey,$id);
    	}
    	$query = $this->db->get($this->table);
    	if($id != '')
    	{
    		return $query->row();
    	}
    	return $query->result();
    }

    
    public function add($id)
    {
    
    $this->db->insert('countries', $id);
    
    }

    
    public function update($data=[],$id='')
    {
       
        if(!empty($data) && $id > 0)
        {
            $this->db->where('country_id',$id);
             $this->db->update('countries',$data);
            
        }
       
    }




    public function delete($id)
    {
        if($id != '')
        {
        

            $this->db->where('country_id', $id);
            $this->db->delete('countries');
        
     
        
        }
    
    }

}

/* End of file Geographical_model.php */


        
       



     

