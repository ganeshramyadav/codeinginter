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
        // $this->load->library('form_validation'); 

        // $this->form_validation->set_rules('Name_First','Full Name','requird');
        // $this->form_validation->set_rules('Email1', 'Email', 'required'); 
        // $this->form_validation->set_rules('PhoneNumber_countrycode', 'PhoneNumber', 'required|max_length[20]'); 
        
        // if($this->form_validation->run() != FALSE)
        // {
        //     $this->index();
        //     // redirect(base_url());
        // }else
        // // if ($this->form_validation->run() == FALSE) 
        // {

            $name       = strtolower($this->security->xss_clean($this->input->post("Name_First")));
            $lastName       = strtolower($this->security->xss_clean($this->input->post("Name_Last")));
            $mobile     = strtolower($this->security->xss_clean($this->input->post("PhoneNumber_countrycode")));
            $email      = strtolower($this->security->xss_clean($this->input->post("Email1")));
            $address    = strtolower($this->security->xss_clean($this->input->post("Address_AddressLine1")));
            $address2    = strtolower($this->security->xss_clean($this->input->post("Address_AddressLine2")));
            $city       = strtolower($this->security->xss_clean($this->input->post("Address_City")));
            $state      = strtolower($this->security->xss_clean($this->input->post("Address_Region")));
            $zipcode    = strtolower($this->security->xss_clean($this->input->post("Address_ZipCode")));
            $country    = strtolower($this->security->xss_clean($this->input->post("Address_Country")));

            // $this->load->library('form_validation');
            // $this->form_validation->set_rules('mobile','Mobile','trim|required|number');

            
            $data['first_name']   =   $name;
            $data['last_name']   =   $lastName;
            $data['mobile']   =   $mobile;
            $data['email']   =   $email;
            $data['address']   =   $address;
            $data['address_one']   =   $address2;
            $data['city']   =   $city;
            $data['state']   =   $state;
            $data['zipcode']   =   $zipcode;
            $data['country']   =   $country;
            $data['comments']   =   '$comments';
            $data['created_at'] = date('Y-m-d H:i:s');
            

            $save = $this->login_model->insertData('userdata',$data);
            if($save){
                $this->success();
                setFlashData('success', "Submited Your Records!");
            } else {
                $this->fail();
                setFlashData('error', "Somthing Went Wrong, Please Try again!");
            }

        // }
        // else{
        //     redirect(base_url());
        // }
        
    }

    public function success(){
        $this->load->view('home/success');
    }

    public function fail(){
        $this->load->view('home/fail');
    }


}