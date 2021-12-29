<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class ApiModel extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function task_list($api)
    {
        return $this->db->select('t.id, veh_no, veh_sender, city, ins_date, status, app_no, ref_no')
                        ->from('tasks t')
                        ->where(['t.status' => $this->input->get('status'), 't.is_deleted' => 0, 't.emp_id' => $api])
                        ->join('city c', 'c.id = t.city_id')
                        ->get()
                        ->result();
    }
}