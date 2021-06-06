<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Userdata_model extends CI_Model
{

    function userdataListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('userdata as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.city  LIKE '%".$searchText."%'
                            OR  BaseTbl.state  LIKE '%".$searchText."%'
                            OR  BaseTbl.address  LIKE '%".$searchText."%'
                            OR  BaseTbl.zipcode LIKE '%".$searchText."%'
                            )";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isDeleted', 0);
        // $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function userdataListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('userdata as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(
                                BaseTbl.email  LIKE '%".$searchText."%'
                                OR  BaseTbl.name  LIKE '%".$searchText."%'
                                OR  BaseTbl.city  LIKE '%".$searchText."%'
                                OR  BaseTbl.state  LIKE '%".$searchText."%'
                                OR  BaseTbl.address  LIKE '%".$searchText."%'
                                OR  BaseTbl.zipcode LIKE '%".$searchText."%'
                            )";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isDeleted', 0);
        // $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

}