<?php

defined('BASEPATH') or exit('No direct script access allowed');

class State_model extends App_Model
{
    protected $table;
    protected $primaryKey = 'state_id';
    public function __construct()
    {
        parent::__construct();
        $this->table = db_prefix()."state";
         
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
    
    $this->db->insert('state', $id);
    
    }

    
    public function update($data=[],$id='')
    {
       
        if(!empty($data) && $id > 0)
        {
            $this->db->where('state_id',$id);
             $this->db->update('state',$data);
        //      echo $this->db->last_query();
        //    die();
            
        }
       
    }




    public function delete($id)
    {
        if($id != '')
        {
        

            $this->db->where('state_id', $id);
            $this->db->delete('state');
        
        //   echo $this->db->last_query();
        //   die();
        
        }
    
    }








}


        
       



     

