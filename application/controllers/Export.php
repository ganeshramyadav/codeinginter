<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Export extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        // load base_url 
        $this->load->helper('url');

        // Load Model 
        $this->load->model('userData_model');

        $this->isLoggedIn();
    }

    // Export data in CSV format 
    public function exportCSV()
    {
        // file name 
        $filename = 'users_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $usersData = $this->userData_model->getUserDataDetails();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("First Name", "Email", "Mobile", "Address","Sms","Zipcode");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);

        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
}
