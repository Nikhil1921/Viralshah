<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Task extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	protected $name = 'task';
    protected $title = 'task';
    private $table = "tasks";
    protected $redirect = "task";

	public function index()
	{
        $data['name'] = $this->name;
		$data['title'] = $this->title;
        $data['url'] = $this->redirect;
        $data['dataTables'] = TRUE;
        $data['daterangepicker'] = TRUE;
        $data['emps'] = $this->main->getall('employees', 'id, name', ['is_deleted' => 0]);
        $data['veh_sends'] = $this->main->getall('vehicle_sender', 'id, name', ['is_deleted' => 0]);
        $data['veh_emps'] = $this->main->getall('vehicle_sender_employee', 'id, name', ['is_deleted' => 0]);

        $this->template->load(admin('template'), $this->redirect.'/home', $data);
	}

	public function get()
    {
        $fetch_data = $this->main->make_datatables(admin('task_model'));
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = $row->veh_no;
            $sub_array[] = $row->app_no;
            $sub_array[] = $row->veh_sender;
            $sub_array[] = ucwords($row->city);
            $sub_array[] = ucwords($row->emp_name);
            $sub_array[] = $row->ins_date;
            $sub_array[] = $row->payment;
            $sub_array[] = $row->pay_type;
            $sub_array[] = $row->status == 'Pending' ? form_open($this->redirect.'/complete', ['id' => 'complete_'.e_id($row->id)], ['id' => e_id($row->id)]).form_button([ 'content' => '<i class="fa fa-thumbs-up"></i>','type'  => 'button','class' => 'btn btn-outline-success', 'onclick' => "complete('complete_".e_id($row->id)."')"]).form_close() : $row->status;

            $sub_array[] = '<div class="ml-0 table-display row">'.anchor($this->redirect.'/view/'.e_id($row->id), '<i class="fa fa-eye"></i>', 'class="btn btn-outline-info mr-2"').anchor($this->redirect.'/upload_image/'.e_id($row->id), '<i class="fa fa-image"></i>', 'class="btn btn-outline-dark mr-2"').anchor($this->redirect.'/update/'.e_id($row->id), '<i class="fa fa-edit"></i>', 'class="btn btn-outline-primary mr-2"').
                    form_open($this->redirect.'/delete', ['id' => e_id($row->id)], ['id' => e_id($row->id)]).form_button([ 'content' => '<i class="fas fa-trash"></i>','type'  => 'button','class' => 'btn btn-outline-danger', 'onclick' => "remove(".e_id($row->id).")"]).form_close().'</div>';

            $data[] = $sub_array;  
            $sr++;
        }
        
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();

        $output = array(  
            "draw"              => intval($_POST["draw"]),  
            "recordsTotal"      => $this->main->count($this->table, ['is_deleted' => 0, 'status' => $this->input->post('task_status')]),
            "recordsFiltered"   => $this->main->get_filtered_data(admin('task_model')),
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
            $data['daterangepicker'] = TRUE;
            $data['emps'] = $this->main->getall('employees', 'id, name', ['is_deleted' => 0]);
            $data['senders'] = $this->main->getall('vehicle_sender', 'id, name', ['is_deleted' => 0]);
            $data['cities'] = $this->main->getall('city', 'id, city', ['is_deleted' => 0]);
            return $this->template->load(admin('template'), $this->redirect.'/add', $data);
        }
        else
        {
            $this->load->helper('string');
            
        	$post = [
                'veh_no'            => $this->input->post('veh_no'),
                'app_no'            => $this->input->post('app_no'),
                'loan'              => $this->input->post('loan'),
                'created_by'        => $this->id,
                'ref_no'            => random_string('numeric', 5),
                'created_at'        => date('Y-m-d H:i:s'),
                'veh_sender'        => d_id($this->input->post('veh_sender')),
                'applicant'         => $this->input->post('applicant'),
                'applicant_mobile'  => $this->input->post('applicant_mobile'),
                'city_id'           => d_id($this->input->post('city_id')),
                'emp_id'            => d_id($this->input->post('emp_id')),
                'veh_sender_emp'    => $this->input->post('veh_sender_emp') ? d_id($this->input->post('veh_sender_emp')) : 0,
                'pay_type'          => $this->input->post('pay_type'),
                'payment'           => $this->input->post('payment'),
                'ins_date'          => date('Y-m-d', strtotime($this->input->post('ins_date'))),
                'images'            => '{"front":"","front_left":"","front_right":"","rear":"","rear_left":"","rear_right":"","chassis_no":"","number_plate":"","oddo_meter":"","open_dickey":"","accessories":"","selfie_with_vehicle":"","rc_front":"","rc_back":"","id_proof":""}',
                'condition'         => '{"engine":"","chassis":"","body_cabin":"","transmission":"","load_body":"","steering":"","tyres":"","electrical_parts":"","battery":"","ac_system":"","upholstery":"","hydraulic":"","other":"","overall":"","odo":"","color":"","approx_today":"","approx_purchase":"","demand":"","absolute":""}'
            ];

        	$id = $this->main->add($post, $this->table);

        	flashMsg($id, ucwords($this->title)." Added Successfully.", ucwords($this->title)." Not Added. Try again.", $this->redirect);
        }
	}

	public function view($id)
	{
            
        $data['name'] = $this->name;
        $data['title'] = $this->title;
		$data['operation'] = "view";
        $data['url'] = $this->redirect;
        $data['data'] = $this->main->get($this->table, '*', ['id' => d_id($id)]);
		
		if ($data['data'])
		{
			return $this->template->load(admin('template'), $this->redirect.'/view', $data);
		}
		else
			return $this->error_404();
	}

    public function pdf($id)
    {
            
        $data['name'] = $this->name;
        $data['title'] = $this->title;
        $data['operation'] = "pdf";
        $data['url'] = $this->redirect;

        $data['data'] = $this->main->get($this->table, '*', ['id' => d_id($id)]);
        
        if ($data['data'])
        {
            $this->load->library('pdf');
            $this->pdf->load_view($this->redirect.'/pdf', $data);
            $this->pdf->setPaper('A4', 'portrait');
            $this->pdf->render();
            /*for save in server*/
            /*$this->load->helper('string');
            $pdf = "pdf/".random_string('nozero', 5).'.pdf';
            file_put_contents($pdf, $this->pdf->output());*/
            /*for save in server*/
            
            /*for browser view*/
            $this->pdf->stream("welcome.pdf", ['Attachment' => false]);
            /*for browser view*/
            
            /*for download */
            // $this->pdf->stream("welcome.pdf");
            /*for download */
        }
        else
            return $this->error_404();
    }

    public function upload_image($id)
    {
        $imgs = $this->main->get($this->table, 'images', ['id' => d_id($id)]);

        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $data['name'] = $this->name;
            $data['title'] = $this->title;
            $data['operation'] = "image upload";
            $data['url'] = $this->redirect;
            $data['id'] = $id;
            $data['data'] = $imgs;
            
            if ($data['data'])
            {
                return $this->template->load(admin('template'), $this->redirect.'/upload_image', $data);
            }
            else
                return $this->error_404();
        }else{

            $this->load->helper('string');
            $config = [
                'upload_path'      => "./assets/images/vehicles/",
                'allowed_types'    => 'jpg|jpeg|png',
                'file_name'        => random_string('nozero', 5),
                'file_ext_tolower' => TRUE
            ];
            
            $this->upload->initialize($config);
            
            if (!$this->upload->do_upload("image")) {
                flashMsg(0, "", strip_tags($this->upload->display_errors()), $this->redirect.'/upload_image/'.$id);
            }else{
                $image_name = $this->input->post('image_name');
                $imgs['images'] = (array) json_decode($imgs['images']);
                $unlink = $imgs['images'][$image_name];
                $imgs['images'][$image_name] = $this->upload->data("file_name");

                if ($this->main->update(['id' => d_id($id)], ['images' => json_encode($imgs['images'])], $this->table)) 
                {
                    if ($unlink && file_exists($config['upload_path'].$unlink))
                        unlink($config['upload_path'].$unlink);
                    flashMsg(1, "Image upload successful.", "", $this->redirect.'/upload_image/'.$id);
                }else{
                    if (file_exists($config['upload_path'].$this->upload->data("file_name")))
                        unlink($config['upload_path'].$this->upload->data("file_name"));
                    flashMsg(0, "", "Image upload not successful.", $this->redirect.'/upload_image/'.$id);
                }
            }
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
            $data['daterangepicker'] = TRUE;
            $data['emps'] = $this->main->getall('employees', 'id, name', ['is_deleted' => 0]);
            $data['cities'] = $this->main->getall('city', 'id, city', ['is_deleted' => 0]);
            $data['senders'] = $this->main->getall('vehicle_sender', 'id, name', ['is_deleted' => 0]);
            $data['body_types'] = $this->main->getall('body_type', 'id, body_type', ['is_deleted' => 0]);
            $data['fuels'] = $this->main->getall('fuel', 'id, fuel', ['is_deleted' => 0]);
            $data['makes'] = $this->main->getall('make', 'id, make', ['is_deleted' => 0]);
            $data['variants'] = $this->main->getall('variant', 'id, variant', ['is_deleted' => 0]);
            $data['vehicle_classes'] = $this->main->getall('vehicle_class', 'id, class', ['is_deleted' => 0]);
            $data['url'] = $this->redirect;
            $data['data'] = $this->main->get($this->table, '*', ['id' => d_id($id)]);
            
            if ($data['data']) 
            {
                $this->session->set_flashdata('updateId', $id);
                return $this->template->load(admin('template'), $this->redirect.'/update', $data);
            }
            else
                return $this->error_404();
        }
        else
        {
            
            $post = [
                'veh_no'            => $this->input->post('veh_no'),
                'app_no'            => $this->input->post('app_no'),
                'loan'              => $this->input->post('loan'),
                'veh_sender'        => d_id($this->input->post('veh_sender')),
                'veh_sender_emp'    => $this->input->post('veh_sender_emp') ? d_id($this->input->post('veh_sender_emp')) : 0,
                'pay_type'          => $this->input->post('pay_type'),
                'payment'           => $this->input->post('payment'),
                'city_id'           => d_id($this->input->post('city_id')),
                'emp_id'            => d_id($this->input->post('emp_id')),
                'ins_date'          => date('Y-m-d', strtotime($this->input->post('ins_date'))),
                'body_type'         => d_id($this->input->post('body_type')),
                'fuel'              => d_id($this->input->post('fuel')),
                'make'              => d_id($this->input->post('make')),
                'variant'           => d_id($this->input->post('variant')),
                'veh_class'         => d_id($this->input->post('veh_class')),
                'old_veh_no'        => $this->input->post('old_veh_no'),
                'applicant'         => $this->input->post('applicant'),
                'applicant_mobile'  => $this->input->post('applicant_mobile'),
                'reg_date'          => date('Y-m-d', strtotime($this->input->post('reg_date'))),
                'chassis_no'        => $this->input->post('chassis_no'),
                'repunched'         => $this->input->post('repunched'),
                'engine_no'         => $this->input->post('engine_no'),
                'man_year'          => $this->input->post('man_year'),
                'seating'           => $this->input->post('seating'),
                'documents'         => $this->input->post('documents'),
                'market_value'      => $this->input->post('market_value'),
                'owner'             => $this->input->post('owner'),
                'owner_sr'          => $this->input->post('owner_sr'),
                'trim'              => d_id($this->input->post('trim')),
                'gvw'               => $this->input->post('gvw'),
                'hpa'               => $this->input->post('hpa'),
                'condition'         => json_encode($this->input->post('condition')),
            ];
            
            $id = $this->main->update(['id' => d_id($id)], $post, $this->table);

            flashMsg($id, ucwords($this->title)." Updated Successfully.", ucwords($this->title)." Not Updated. Try again.", $this->redirect);
        }
    }

	public function delete()
	{
        $id = $this->main->update(['id' => d_id($this->input->post('id'))], ['is_deleted' => 1], $this->table);

		flashMsg($id, ucwords($this->title)." Deleted Successfully.", ucwords($this->title)." Not Deleted. Try again.", $this->redirect);
	}

    public function complete()
    {
        $id = $this->main->update(['id' => d_id($this->input->post('id'))], ['status' => 'Completed'], $this->table);

        flashMsg($id, ucwords($this->title)." status changed Successfully.", ucwords($this->title)." status not changed. Try again.", $this->redirect);
    }

	public function existCheck()
	{
        $this->load->model(admin('task_model'));
        $message = "";
        if($this->task_model->existCheck($this->input->get('veh_no')))
            $message = $this->input->get('veh_no').' Already exists.';

		die(json_encode(['message' => $message]));
	}

    protected $validate = [
        [
            'field' => 'veh_no',
            'label' => 'Vehicle No',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'veh_sender',
            'label' => 'Vehicle Sender',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'emp_id',
            'label' => 'Employee',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'city_id',
            'label' => 'City',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'ins_date',
            'label' => 'Inspection Date',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'applicant',
            'label' => 'Applicant',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'applicant_mobile',
            'label' => 'Applicant mobile',
            'rules' => 'required|numeric|exact_length[10]',
            'errors' => [
                'required' => "%s is Required",
                'numeric' => "%s is Invalid",
                'exact_length' => "%s is Invalid",
            ]
        ],
        /* [
            'field' => 'app_no',
            'label' => 'Application No',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ], */
        /*[
            'field' => 'body_type',
            'label' => 'Body Type',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'fuel',
            'label' => 'Fuel Name',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'make',
            'label' => 'Make Name',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'variant',
            'label' => 'Variant Name',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'veh_class',
            'label' => 'Vehicle Class',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]*/
    ];
}