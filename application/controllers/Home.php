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
        $this->load->model('userdata_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
    }

    public function index(){
        redirect('/');
        // $this->load->view('home/index');
    }

    public function insertRecord(){

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


            // $this->load->helper(array('form', 'url'));

            // $this->load->library('form_validation');
            // $this->form_validation->set_rules('Email1', 'Email1', 'required|valid_email');

            // if ($this->form_validation->run() == FALSE)
            // {
            //     return $this->errorMsg('Enter the correct Email');
            // }
         
            $data['first_name']     =   $name;
            $data['mobile']         =   $mobile;
            $data['email']          =   $email;
            $data['address']        =   $address;
            $data['zipcode']        =   $zipcode;
            $data['sms']            =   '';
            $data['created_at'] = date('Y-m-d H:i:s');

            // $data['last_name']      =   $lastName;
            // $data['address_one']    =   $address2;
            // $data['city']           =   $city;
            // $data['state']          =   $state;
            // $data['country']        =   $country;
            

            $save = $this->login_model->insertData('userdata',$data);
            if($save){
                $this->success();
                setFlashData('success', "Submited Your Records!");
            } else {
                $this->fail();
                setFlashData('error', "Somthing Went Wrong, Please Try again!");
            }

        
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUserData()
    {
        // print_r ($this->session->userdata('role')) ;
        // print_r ($this->session->userdata('userId')) ;

        if($this->session->userdata('role') != 1)
        {
            echo(json_encode(array('status'=>'access denide')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $result = $this->userdata_model->deleteData($userId);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    public function success(){
        $this->load->view('home/success');
    }

    public function fail(){
        $this->load->view('home/fail');
    }

    public function errorMsg($value){
        $this->load->view('home/errorMsg');
    }


}