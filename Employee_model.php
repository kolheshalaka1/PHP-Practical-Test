<?php
defined ('BASEPATH') OR exit('No direct script access allowed');
class Employee_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function GetData($table,$field='',$condition='',$order='',$group='',$limit='',$result='')
    {
        
        if($field!='')
        $this->db->select($field);
        if($condition!='')
        $this->db->where($condition);
        if($order!='')
        $this->db->order_by($order);
        if($group!='')
        $this->db->group_by($group);
        if($limit!='')
        $this->db->limit($limit);
        if($result!='')
        {
            $return=$this->db->get($table)->row();
        }
        else{
            $return=$this->db->get($table)->result();
        }
        return $return;
    }
   

    public function get_all_employee($limit=50)
    {
        $this->db->limit($limit);
        return $this->db->get('employee')->result_array();
    }

    public function SaveData($table,$data,$condition=""){
    $DataArray= array();
    $table_fields=$this->db->list_fields($table);
    foreach($data as $field=>$value)
    {
        if(in_array($field,$table_fields))
        {
            $DataArray[$field]= $value;
        }
    }
    if($condition!= '')
    {
        $DataArray['modified']=date("Y-m-d H:i:s");
        $this->db->where($condition);
        $this->db->update($table, $DataArray);
    }
    else{
        $DataArray['created']=date("Y-m-d H:i:s");
        $this->db->insert($table,$DataArray);
    }
    if($this->db->affected_rows()>0){
        return true;
    }else{
        return false;
    }
}
public function get_employee_by_id($id){
    $this->db->where('id',$id);
    $query=$this->db->get('employee');
    if($query->num_rows()>0){
        return $query->row();

    }
    return null;
}
public function UpdateData($table,$data,$where){
    return $this->db->update($table,$data,$where);

}
public function DeleteData($table,$where)
{
    $this->db->where($where);
    return $this->db->delete($table);
}
}
?>