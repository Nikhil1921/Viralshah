<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Trim_model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "trim t";  
	public $select_column = ['t.id', 't.trim', 'v.variant', 'm.make'];
	public $search_column = ['t.trim', 'v.variant', 'm.make'];
    public $order_column = [null, 't.trim', 'v.variant', 'm.make', null];
	public $order = ['t.id' => 'DESC'];

	public function make_query()  
	{  
        $this->db->select($this->select_column)	
            ->from($this->table)
            ->where(['v.is_deleted' => 0, 'm.is_deleted' => 0])
            ->join('variant v', 'v.id = t.variant_id')
            ->join('make m', 'm.id = v.make_id');
        
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