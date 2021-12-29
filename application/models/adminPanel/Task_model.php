<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Task_model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "tasks t";  
	public $select_column = ['t.id', 't.veh_no', 'vs.name veh_sender', 't.app_no', 'c.city', 'e.name emp_name', 't.ins_date', 't.payment', 't.pay_type', 't.status'];
	public $search_column = ['t.id', 't.veh_no', 'vs.name', 't.app_no', 'c.city', 'e.name', 't.ins_date', 't.payment', 't.pay_type', 't.status'];
    public $order_column = [null, 't.veh_no', 'vs.name', 't.app_no', 'c.city', 'e.name', 't.ins_date', 't.payment', 't.pay_type', 't.status', null];
	public $order = ['t.id' => 'DESC'];

	public function make_query()  
	{  
        $this->db->select($this->select_column)	
            ->from($this->table)
            ->where(['t.is_deleted' => 0, 't.status' => $this->input->post('task_status')])
            ->join('employees e', 'e.id = t.emp_id', 'left')
            ->join('vehicle_sender vs', 'vs.id = t.veh_sender', 'left')
            ->join('city c', 'c.id = t.city_id', 'left');
        
        if ($this->input->post('start_date') && $this->input->post('end_date'))
            $this->db->where(['t.ins_date >=' => $this->input->post('start_date'), 't.ins_date <' => $this->input->post('end_date')]);
        if ($this->input->post('emp')) $this->db->where(['t.emp_id' => $this->input->post('emp')]);
        if ($this->input->post('veh_sender')) $this->db->where(['t.veh_sender' => $this->input->post('veh_sender')]);
        if ($this->input->post('veh_emp')) $this->db->where(['t.veh_sender_emp' => $this->input->post('veh_emp')]);
        
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

    public function existCheck($veh_no)
    {
        return $this->db->select('t.veh_no')	
                 ->from($this->table)
                 ->like('t.veh_no', $veh_no)
                 ->get()->result_array();
    }
}