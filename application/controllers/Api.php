<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('api');
        $this->load->model('ApiModel', 'api');
        // mobile();
    }

    protected $table = 'employees';

    public function login()
    {
        post();
        verifyRequiredParams(['mobile', 'password']);

        $post = [
                'mobile'     => $this->input->post('mobile'),
                'password'   => my_crypt($this->input->post('password')),
                'is_deleted' => 0
            ];

        if($row = $this->main->get($this->table, 'id, name, mobile, email', $post))
        {
            $response['row'] = $row;
            $response['error'] = FALSE;
            $response['message'] ="Login successful.";
            echoRespnse(200, $response);
        }
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Login not successful.";
            echoRespnse(400, $response);
        }
    }

    public function add_task()
    {
        post();
        $api = authenticate($this->table);
        verifyRequiredParams(['veh_no', 'app_no', 'veh_sender', 'applicant', 'city_id', 'ins_date', 'engine_no', 'chassis_no', 'reg_date', 'km_driven', 'contact_no']);

        $this->load->helper('string');
        $post = [
                'veh_no'       => $this->input->post('veh_no'),
                'engine_no'    => $this->input->post('engine_no'),
                'chassis_no'   => $this->input->post('chassis_no'),
                'reg_date'     => date('Y-m-d', strtotime($this->input->post('reg_date'))),
                'app_no'       => $this->input->post('app_no'),
                'created_by'   => $api,
                'created_type' => 'Employee',
                'ref_no'       => random_string('numeric', 5),
                'created_at'   => date('Y-m-d H:i:s'),
                'veh_sender'   => $this->input->post('veh_sender'),
                'applicant'    => $this->input->post('applicant'),
                'contact_no'   => $this->input->post('contact_no'),
                'payment'      => 0,
                'payment_id'   => 'Pending',
                'city_id'      => $this->input->post('city_id'),
                'emp_id'       => $api,
                'ins_date'     => date('Y-m-d', strtotime($this->input->post('ins_date'))),
                'images'       => '{"front":"","front_left":"","front_right":"","rear":"","rear_left":"","rear_right":"","chassis_no":"","number_plate":"","oddo_meter":"","open_dickey":"","accessories":"","selfie_with_vehicle":"","rc_front":"","rc_back":"","id_proof":""}',
                'condition'    => '{"engine":"","chassis":"","body_cabin":"","transmission":"","load_body":"","steering":"","tyres":"","electrical_parts":"","battery":"","ac_system":"","upholstery":"","hydraulic":"","other":"","overall":"","odo":"'.$this->input->post('km_driven').'","color":"","approx_today":"","approx_purchase":"","demand":"","absolute":""}'
            ];
            
        if($row = $this->main->add($post, "tasks"))
        {
            $response['error'] = FALSE;
            $response['message'] ="Task add successful.";
            echoRespnse(200, $response);
        }
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Task add not successful.";
            echoRespnse(400, $response);
        }
    }
    
    public function update_task($id)
    {
        post();
        $api = authenticate($this->table);
        verifyRequiredParams(['veh_no', 'app_no', 'veh_sender', 'applicant', 'city_id', 'ins_date', 'engine_no', 'chassis_no', 'reg_date', 'km_driven', 'contact_no']);

        $this->load->helper('string');
        $post = [
                'veh_no'       => $this->input->post('veh_no'),
                'engine_no'    => $this->input->post('engine_no'),
                'chassis_no'   => $this->input->post('chassis_no'),
                'reg_date'     => date('Y-m-d', strtotime($this->input->post('reg_date'))),
                'app_no'       => $this->input->post('app_no'),
                'veh_sender'   => $this->input->post('veh_sender'),
                'applicant'    => $this->input->post('applicant'),
                'contact_no'   => $this->input->post('contact_no'),
                'city_id'      => $this->input->post('city_id'),
                'ins_date'     => date('Y-m-d', strtotime($this->input->post('ins_date'))),
                'images'       => '{"front":"","front_left":"","front_right":"","rear":"","rear_left":"","rear_right":"","chassis_no":"","number_plate":"","oddo_meter":"","open_dickey":"","accessories":"","selfie_with_vehicle":"","rc_front":"","rc_back":"","id_proof":""}',
                'condition'    => '{"engine":"","chassis":"","body_cabin":"","transmission":"","load_body":"","steering":"","tyres":"","electrical_parts":"","battery":"","ac_system":"","upholstery":"","hydraulic":"","other":"","overall":"","odo":"'.$this->input->post('km_driven').'","color":"","approx_today":"","approx_purchase":"","demand":"","absolute":""}'
            ];
            
        if($row = $this->main->update(['id' => $id], $post, "tasks"))
        {
            $response['error'] = FALSE;
            $response['message'] ="Task update successful.";
            echoRespnse(200, $response);
        }
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Task update not successful.";
            echoRespnse(400, $response);
        }
    }

    public function update_payment()
    {
        post();
        $api = authenticate($this->table);
        verifyRequiredParams(['payment', 'payment_id', 'status', 'task_id']);
        
        $post = [
                'pay_type'   => 'Recieved',
                'payment'    => $this->input->post('payment'),
                'payment_id' => $this->input->post('payment_id'),
                'status'     => $this->input->post('status')
            ];
            
        if($row = $this->main->update(['id' => $this->input->post('task_id')], $post, "tasks"))
        {
            $response['error'] = FALSE;
            $response['message'] ="Payment update successful.";
            echoRespnse(200, $response);
        }
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Payment update not successful.";
            echoRespnse(400, $response);
        }
    }

    public function city_list()
    {
        get();
        $api = authenticate($this->table);
        
        if($row = $this->main->getall('city', 'id, city', ['is_deleted' => 0]))
        {
            $response['row'] = $row;
            $response['error'] = FALSE;
            $response['message'] ="City list successful.";
            echoRespnse(200, $response);
        }
        else
        {
            $response["error"] = TRUE;
            $response['message'] = "City list not successful.";
            echoRespnse(400, $response);
        }
    }

    public function sender_list()
    {
        get();
        $api = authenticate($this->table);
        
        if($row = $this->main->getall('vehicle_sender', 'id, name', ['is_deleted' => 0]))
        {
            $response['row'] = $row;
            $response['error'] = FALSE;
            $response['message'] ="Sender list successful.";
            echoRespnse(200, $response);
        }
        else
        {
            $response["error"] = TRUE;
            $response['message'] = "Sender list not successful.";
            echoRespnse(400, $response);
        }
    }

    public function task_list()
    {
        get();
        $api = authenticate($this->table);
        verifyRequiredParams(['status']);
        
        if($row = $this->api->task_list($api))
        {
            $response['row'] = $row;
            $response['error'] = FALSE;
            $response['message'] ="Task list successful.";
            echoRespnse(200, $response);
        }
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Task list not successful.";
            echoRespnse(400, $response);
        }
    }

    public function task()
    {
        get();
        $api = authenticate($this->table);
        verifyRequiredParams(['task_id']);
        
        if($row = $this->main->get('tasks', '*', ['id' => $this->input->get('task_id')]))
        {
            $row['images'] = json_decode($row['images']);
            $row['condition'] = json_decode($row['condition']);
            $response['row'] = $row;
            $response['error'] = FALSE;
            $response['message'] ="Task successful.";
            echoRespnse(200, $response);
        }
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Task not successful.";
            echoRespnse(400, $response);
        }
    }

    public function upload_image()
    {
        post();
        $api = authenticate($this->table);
        verifyRequiredParams(['task_id', 'image_name']);
        $image_name = $this->input->post('image_name');
        $task_id = $this->input->post('task_id');
        
        $this->load->helper('string');
        $config = [
            'upload_path'      => "assets/images/vehicles/",
            'allowed_types'    => 'jpg|jpeg|png',
            'file_name'        => random_string('nozero', 5),
            'file_ext_tolower' => TRUE
        ];
        
        $imgs = $this->main->get('tasks', 'id, images', ['id' => $task_id]);

        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload("image")) {
            $response["error"] = TRUE;
            $response['message'] = strip_tags($this->upload->display_errors());
            echoRespnse(400, $response);
        }else{
            $imgs['images'] = (array) json_decode($imgs['images']);
            
            $source_path = $this->upload->data('full_path');
            $target_path = $this->upload->data('file_path');
            $config_manip = array(
                'image_library' => 'gd2',
                'source_image' => $source_path,
                'new_image' => $target_path,
                'maintain_ratio' => TRUE,
                'create_thumb' => TRUE,
                'thumb_marker' => '',
                'width' => 520,
                'height' => 350
            );

            $this->load->library('image_lib', $config_manip);
            $this->image_lib->resize();
            
            $this->image_lib->clear();

            $unlink = $imgs['images'][$image_name];
            $imgs['images'][$image_name] = $this->upload->data("file_name");

            if ($this->main->update(['id' => $task_id], ['images' => json_encode($imgs['images'])], 'tasks')) {
                if ($unlink && file_exists($config['upload_path'].$unlink))
                    unlink($config['upload_path'].$unlink);
                $response['row'] = $imgs;
                $response['error'] = FALSE;
                $response['message'] = "Image upload successful.";
                echoRespnse(200, $response);
            }else{
                if (file_exists($config['upload_path'].$this->upload->data("file_name")))
                    unlink($config['upload_path'].$this->upload->data("file_name"));

                $response["error"] = TRUE;
                $response['message'] = "Image upload not successful.";
                echoRespnse(400, $response);
            }
        }
    }
}