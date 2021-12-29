<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    protected $table = 'admins';
    protected $redirect = '';
    protected $profile = [
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'mobile',
            'label' => 'Mobile No.',
            'rules' => 'required|numeric|exact_length[10]|callback_mobile_check',
            'errors' => [
                'required' => "%s is Required",
                'numeric' => "%s is Invalid",
                'exact_length' => "%s is Invalid",
            ]
        ],
        [
            'field' => 'email',
            'label' => 'Employee E-Mail',
            'rules' => 'required|callback_email_check',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]
    ];

    public function mobile_check($str)
    {   
        if ($this->main->check($this->table, ['mobile' => $str, 'id != ' => $this->id], 'id'))
        {
            $this->form_validation->set_message('mobile_check', 'The %s is already in use');
            return FALSE;
        } else{
            return TRUE;
        }
    }

    public function email_check($str)
    {   
        if ($this->main->check($this->table, ['email' => $str, 'id != ' => $this->id], 'id'))
        {
            $this->form_validation->set_message('email_check', 'The %s is already in use');
            return FALSE;
        } else{
            return TRUE;
        }
    }

	public function index()
    {
        $data['title'] = 'dashboard';
        $data['name'] = 'dashboard';

        return $this->template->load(admin('template'), admin('dashboard'), $data);
    }

    public function profile()
    {
        $data['title'] = 'profile';
        $data['name'] = 'profile';

        $this->form_validation->set_rules($this->profile);
        if ($this->form_validation->run() == FALSE)
        {
            return $this->template->load(admin('template'), admin('profile'), $data);
        }
        else
        {
            $post = [
                'name'   => $this->input->post('name'),
                'email'  => $this->input->post('email'),
                'mobile' => $this->input->post('mobile')
            ];

            $id = $this->main->update(['id' => $this->id], $post, $this->table);

            if ($id) {
                $user = $this->main->get($this->table, 'id adminId, name, mobile, email, role, lead_type', ['id' => $this->id]);
                $this->session->set_userdata($user);
            }

            flashMsg($id, "Profile Updated Successfully.", "Profile Not Updated. Try again.", admin('profile'));
        }
    }

    public function changePassword()
    {
        $data['title'] = 'profile';
        $data['name'] = 'profile';

        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => "%s is Required"]);
        if ($this->form_validation->run() == FALSE)
        {
            return $this->template->load(admin('template'), admin('profile'), $data);
        }
        else
        {
            $post = [
                'password'   => my_crypt($this->input->post('password'))
            ];

            $id = $this->main->update(['id' => $this->id], $post, $this->table);

            flashMsg($id, "Password Changed Successfully.", "Password Not Changed. Try again.", admin('profile'));
        }
    }

    public function backup()
    {
        // Load the DB utility class
        $this->load->dbutil();
        
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download(APP_NAME.'.zip', $backup);

		return redirect(admin());
    }

    public function reset()
    {
        foreach (['australia_visa','canada_visa','student_visa','visitor_visa'] as $v) 
        {
            $data = $this->main->getall($v, 'id', ['id !=' => 0]);
            foreach ($data as $key => $va) {
                $post = ['is_deleted' => 0, 'ielts' => 0,'created_by' => 0,'assigned' => 0,'assigned_by' => 0,'consulted_by' => 0,'consult_asigned_by' => 0,'cred_create' => 0, 'ielts' => 0,'created_by' => 0,'assigned' => 0,'assigned_by' => 0,'consulted_by' => 0,'consult_asigned_by' => 0,'cred_create' => 0];
                $this->main->update($va, $post, $v);
            }
        }
        return redirect(admin());
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect(admin('login'));
    }

    public function unauthorized()
    {
        $this->load->view(admin('unauthorized'));
    }
    
    public function getEmps()
    {
        $response['data'] = array_map(function($arr){
            return ['id' => e_id($arr['id']), 'name' => $arr['name']];
        }, $this->main->getall('vehicle_sender_employee', 'id, name', ['sender_id' => d_id($this->input->get('id'))]));
        
        die(json_encode($response));
    }

    public function getVariant()
    {
        $response['data'] = array_map(function($arr){
            return ['id' => e_id($arr['id']), 'name' => $arr['variant']];
        }, $this->main->getall('variant', 'id, variant', ['make_id' => d_id($this->input->get('id'))]));
        
        die(json_encode($response));
    }

    public function getTrims()
    {
        $response['data'] = array_map(function($arr){
            return ['id' => e_id($arr['id']), 'name' => $arr['trim']];
        }, $this->main->getall('trim', 'id, trim', ['variant_id' => d_id($this->input->get('id'))]));
        
        die(json_encode($response));
    }
}