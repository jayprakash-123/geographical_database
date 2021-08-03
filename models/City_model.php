<?php

defined('BASEPATH') or exit('No direct script access allowed');

class City_model extends App_Model
{
    protected $table;
    protected $primaryKey = 'city_id';
    public function __construct()
    {
        parent::__construct();
        $this->table = db_prefix()."city";
         
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
    
    $this->db->insert('city', $id);
    // echo $this->db->last_query();
    // die();
        
    
    }

    
    public function update($data=[],$id='')
    {
       
        if(!empty($data) && $id > 0)
        {
            $this->db->where('city_id',$id);
             $this->db->update('city',$data);
            
        }
       
    }




    public function delete($id)
    {
        if($id != '')
        {
        

            $this->db->where('city_id', $id);
            $this->db->delete('city');
        
        //   echo $this->db->last_query();
        //   die();
        
        }
    
    }








}


        
       



     

