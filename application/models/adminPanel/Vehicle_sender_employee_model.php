<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Vehicle_sender_employee_model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "vehicle_sender_employee e";  
	public $select_column = ['e.id', 'e.name', 's.name sender_name', 'e.emp_code'];
	public $search_column = ['s.name', 'e.name', 'e.emp_code'];
    public $order_column = [null, 'e.name', 's.name', 'e.emp_code', null];
	public $order = ['e.id' => 'DESC'];

	public function make_query()  
	{  
        $this->db->select($this->select_column)	
                 ->from($this->table)
                 ->where(['e.is_deleted' => 0, 's.is_deleted' => 0])
                 ->join('vehicle_sender s', 's.id = e.sender_id');
        
        $i = 0;

        foreach ($this->search_column as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->search_column) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}
}