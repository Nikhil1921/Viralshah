<?php defined('BASEPATH') OR exit('No direct script access allowed');

class VehicleSenderEmployee extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	protected $name = 'vehicleSenderEmployee';
    protected $title = 'vehicle sender employee';
    private $table = "vehicle_sender_employee";
    protected $redirect = "vehicleSenderEmployee";

	public function index()
	{
        $data['name'] = $this->name;
		$data['title'] = $this->title;
        $data['url'] = $this->redirect;
        $data['dataTables'] = TRUE;
        $this->template->load(admin('template'), $this->redirect.'/home', $data);
	}

	public function get()
    {
        $fetch_data = $this->main->make_datatables(admin('vehicle_sender_employee_model'));
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = ucwords($row->name);
            $sub_array[] = ucwords($row->sender_name);
            $sub_array[] = $row->emp_code;

            $sub_array[] = '<div class="ml-0 table-display row">'.anchor($this->redirect.'/update/'.e_id($row->id), '<i class="fa fa-edit"></i>', 'class="btn btn-outline-primary mr-2"').
                    form_open($this->redirect.'/delete', ['id' => e_id($row->id)], ['id' => e_id($row->id)]).form_button([ 'content' => '<i class="fas fa-trash"></i>','type'  => 'button','class' => 'btn btn-outline-danger', 'onclick' => "remove(".e_id($row->id).")"]).form_close().'</div>';

            $data[] = $sub_array;  
            $sr++;
        }
        
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();

        $output = array(  
            "draw"              => intval($_POST["draw"]),  
            "recordsTotal"      => $this->main->count($this->table, [$this->table.'.is_deleted' => 0, 's.is_deleted' => 0], "", ['sender_id' => 'vehicle_sender s']),
            "recordsFiltered"   => $this->main->get_filtered_data(admin('vehicle_sender_employee_model')),
            "data"              => $data,
            $csrf_name          => $csrf_hash
        );
        
        echo json_encode($output);
    }

    public function add()
	{
        $this->form_validation->set_rules($this->validate);
        if ($this->form_validation->run() == FALSE)
        {
            $data['name'] = $this->name;
            $data['title'] = $this->title;
            $data['operation'] = "add";
            $data['url'] = $this->redirect;
            $data['senders'] = $this->main->getall('vehicle_sender', 'id, name', ['is_deleted' => 0]);
            $data['action'] = "$this->redirect/add";

            return $this->template->load(admin('template'), $this->redirect.'/form', $data);
        }
        else
        {
        	$post = [
                'name'        => $this->input->post('name'),
                'sender_id'   => d_id($this->input->post('sender_id')),
                'created_at'  => date('Y-m-d H:i:s'),
                'last_update' => date('Y-m-d H:i:s')
            ];

        	$id = $this->main->add($post, $this->table);

        	flashMsg($id, ucwords($this->title)." Added Successfully.", ucwords($this->title)." Not Added. Try again.", $this->redirect);
        }
	}

	public function update($id)
	{
        $this->form_validation->set_rules($this->validate);
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['name'] = $this->name;
            $data['id'] = $id;
			$data['title'] = $this->title;
			$data['operation'] = "update";
            $data['url'] = $this->redirect;
            $data['data'] = $this->main->get($this->table, 'id, name, sender_id, emp_code', ['id' => d_id($id)]);
			$data['senders'] = $this->main->getall('vehicle_sender', 'id, name', ['is_deleted' => 0]);
            $data['action'] = "$this->redirect/update/$id";

			if ($data['data']) 
			{
				$this->session->set_flashdata('updateId', $id);
				return $this->template->load(admin('template'), $this->redirect.'/form', $data);
			}
			else
				return $this->error_404();
        }
        else
        {
        	$updateId = $this->session->updateId;
            
        	$post = [
                'name'        => $this->input->post('name'),
                'emp_code'    => $this->input->post('emp_code'),
                'sender_id'   => d_id($this->input->post('sender_id')),
                'last_update' => date('Y-m-d H:i:s')
            ];

        	$id = $this->main->update(['id' => d_id($updateId)], $post, $this->table);

			flashMsg($id, ucwords($this->title)." Updated Successfully.", ucwords($this->title)." Not Updated. Try again.", $this->redirect);
        }
	}

	public function delete()
	{
        $id = $this->main->update(['id' => d_id($this->input->post('id'))], ['is_deleted' => 1, 'last_update' => date('Y-m-d H:i:s')], $this->table);

		flashMsg($id, ucwords($this->title)." Deleted Successfully.", ucwords($this->title)." Not Deleted. Try again.", $this->redirect);
	}

    protected $validate = [
        [
            'field' => 'sender_id',
            'label' => 'Vehicle sender',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]
    ];
}