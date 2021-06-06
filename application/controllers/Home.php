<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Home extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        // $this->set_timezone();
    }

    public function index(){
        $this->load->view('home/index');
        // $this->loadViews("dashboard", $this->global, NULL , NULL);
    }

    public function insertRecord(){
        

        $name       = strtolower($this->security->xss_clean($this->input->post("name")));
        $mobile     = strtolower($this->security->xss_clean($this->input->post("mobile")));
        $email      = strtolower($this->security->xss_clean($this->input->post("email")));
        $address    = strtolower($this->security->xss_clean($this->input->post("address")));
        $city       = strtolower($this->security->xss_clean($this->input->post("city")));
        $state      = strtolower($this->security->xss_clean($this->input->post("state")));
        $zipcode    = strtolower($this->security->xss_clean($this->input->post("zipcode")));

        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('mobile','Mobile','trim|required|number');

        
        $data['name']   =   $name;
        $data['mobile']   =   $mobile;
        $data['email']   =   $email;
        $data['address']   =   $address;
        $data['city']   =   $city;
        $data['state']   =   $state;
        $data['zipcode']   =   $zipcode;
        $data['comments']   =   '$comments';
        $data['created_at'] = date('Y-m-d H:i:s');
        

        $save = $this->login_model->insertData('userdata',$data);
        if($save){
            setFlashData('success', "Submited Your Records!");
        } else {
            setFlashData('error', "Somthing Went Wrong, Please Try again!");
        }
        $this->index();
    }


}