<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		
		$this->load->view('Admin/login');
		
		
	}
	public function deshboard(){
		$this->load->view('Admin/header');
		$this->load->view('Admin/admin_header');
		$this->load->view('Admin/deshboard');
		$this->load->view('Admin/admin_footer');
		$this->load->view('Admin/footer');
	}
    public function chkAdmin(){
            $data['username']=$this->input->post('username',true);
            $data['password']=$this->input->post('password',true);
            if(!empty($data['username']) && !empty($data['password'])){
                 $admin=$this->modAdmin->checkAdmin($data);
            
                if (count($admin)==1) {
                    if ($admin[0]['state']>0) {
                        $forSession=array(
                        'name'=> $admin[0]['username'],
                        'state'=> $admin[0]['state'],
                        'division_id'=> $admin[0]['division_id'],
                        'division'=> $admin[0]['division'],
                        'district_id'=> $admin[0]['district_id'],
                        'district'=> $admin[0]['district'],
                    'subDistrict_id'=> $admin[0]['subDistrict_id'],
                        'union_id'=> $admin[0]['union_id'],
                        'upozila'=> $admin[0]['upozila'],
                        'unioun'=> $admin[0]['unioun'],
                        'subDistrict_id'=> $admin[0]['subDistrict_id'],
                         'logged_in' => TRUE
                        
                );
                    $this->session->set_userdata($forSession);
                    if ($this->session->userdata('name')) {
                        redirect('Admin/deshboard');
                    }
                    else{
                        echo "Session not Created";
                    }
                       
                    }
                    else{
                    $this->session->set_flashdata('class','alert-danger');
                    $this->session->set_flashdata('message','Sorry Your Login Permission Is Suspended For This Time');
                    redirect('Admin');

                    }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                    $this->session->set_flashdata('message','Please Chek User Name or Password Correctly');
                    redirect('Admin');
                }
            }
            else{
                $this->session->set_flashdata('class','alert-danger');
                    $this->session->set_flashdata('message','Please Chek The Required Field');
                    redirect('index');
                
            }
        }
        public function logout(){
            
            if ($this->session->userdata('name')) {
                echo $this->session->userdata('name');
                
                $this->session->set_userdata('name','');
                $this->session->set_userdata('state','');
                $this->session->set_userdata('logged_in','');
                $this->session->set_userdata('division_id','');
                $this->session->set_userdata('subDistrict_id','');
                $this->session->set_userdata('union_id','');
                $this->session->set_userdata('division','');
                $this->session->set_userdata('district','');
                $this->session->set_userdata('upozila','');
                $this->session->set_userdata('unioun','');
                $this->session->set_flashdata('class','alert-success');
                $this->session->set_flashdata('message','You Have Successfully Loged Out');
                redirect('Admin');
                
            }
            else{
                $this->session->set_flashdata('error','Please log in');
               

            }
        }
    public function Division(){
        $data['division'] = $this->modAdmin->fetch_division();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/Division',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
    }
    public function addDivision(){
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/addDivision');
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
    }
    public function adDivision(){

   /*         if (adminLogedIn()){*/
                $data['division_name']= $this->input->post('division_name','true');
                if (!empty($data['division_name'])) {
                    
                $addData=$this->modAdmin->checkDivisionExistencs($data);
                    if ($addData->num_rows()>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This Panel is Alredy Exist');
                        redirect('admin/addDivision');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addDivision($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Division Added Successfully');
                        redirect('admin/addDivision');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Division not Added');
                        redirect('admin/addDivision');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Division Name Required');
                        redirect('admin/addDivision'); 

                }

        }
        public function editDivision($id){
                if(!empty($id) && isset($id)){
                $data['division']=$this->modAdmin->chekDivisionById($id);
                  if (count($data['division'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editDivision',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
                  else{
                   setFlashData('alert-danger','Category not found','home/allCategory');
                  }
                }
                else{
                    setFlashData('alert-danger','Category not found','home/allCategory');


                }
        }
        public function updateDivision(){
                $data['division_name']=$this->input->post('division_name',true);
                $id=$this->input->post('id',true);
                if (!empty($data['division_name'])&& isset($data['division_name'])) {

                    $reply=$this->modAdmin->updateDivision($data,$id);
                    if ($reply) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Division is successfully updated');
                        redirect('admin/Division');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','You can not updated now');
                        redirect('admin/Division');
                    }
                }
                else{
                    
                    $this->session->set_flashdata('class','alert-danger');
                    $this->session->set_flashdata('message','Panel Name is required');
                        redirect('admin/Division');


                }
           
        }
        public function DeleteDivision($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteDivision($id);
                  $d=$this->modAdmin->deleteAdmin($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Division Delated');
                        redirect('admin/Division');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Division not found');
                    redirect('admin/Division');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Division Can not found');
                    redirect('admin/Division');


                }

        }
        public function AddDivisionAsAdmin($id){
            $data['division']=$this->modAdmin->chekDivisionById($id);

            if (count($data['division'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/AddDivisionAsAdmin',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
            public function divisionadmin(){
                $data['division_name']= $this->input->post('division_name','true');
                if (!empty($data['division_name'])) {
                    
                $addData=$this->modAdmin->checkDivisionExistencsOnAdmin($data);
                    if (count($addData)>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This User Name is Alredy Exist');
                        redirect('admin/Division');
                       
                    }
                    else{
        $data['username']= $this->input->post('username','true');
        $data['division_id']= $this->input->post('division_id','true');
    $data['division_name']= $this->input->post('division_name','true');
    $data['password']= $this->input->post('password','true');
    $data['state']= 1;
    $addData=$this->modAdmin->addDivisionAsAdmin($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Division Access Successfully Allowed');
                        redirect('admin/Division');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Division Access Denied');
                        redirect('admin/Division');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Please Check All Field Then Go To Action');
                        redirect('admin/Division'); 

                }

        }
        public function abortAccess($id){
            $data['state']='0';
            $updateAdmin=$this->modAdmin->updateAdminForState($data,$id);
            redirect('admin/Division'); 
        }
        public function abortDistrictAccess($id){
            $data['state']='0';
            $updateAdmin=$this->modAdmin->updateAdminDIForState($data,$id);
            redirect('admin/District'); 
        }
        public function abortSubAccess($id){
            $data['state']='0';
            $updateAdmin=$this->modAdmin->updateAdminSubDIForState($data,$id);
            redirect('admin/SubDistrict'); 
        }
        public function abortUnionAccess($id){
            $data['state']='0';
            $updateAdmin=$this->modAdmin->updateAdminUIForState($data,$id);
            redirect('admin/Unioun'); 
        }
        public function givePermissionForAdmin($id){
            $data['state']='1';
            $updateAdmin=$this->modAdmin->updateAdminForState($data,$id);
            redirect('admin/Division'); 
        }
        public function givePermissionByDIForAdmin($id){
            $data['state']='3';
            $updateAdmin=$this->modAdmin->updateAdminDIForState($data,$id);
            redirect('admin/District'); 
        }
        public function givePermissionBySubDIForAdmin($id){
            $data['state']='4';
            $updateAdmin=$this->modAdmin->updateAdminSubDIForState($data,$id);
            redirect('admin/SubDistrict'); 
        }
         public function givePermissionByUIForAdmin($id){
            $data['state']='5';
            $updateAdmin=$this->modAdmin->updateAdminUIForState($data,$id);
            redirect('admin/Unioun'); 
        }
        public function District(){
        if ($this->session->userdata('state')==2) {
        $data['district'] = $this->modAdmin->fetch_district();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/District',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        else{
        $data['district'] = $this->modAdmin->fetch_districtById($this->session->userdata('division_id'));
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/District',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
            
        }
        
        
    }
    public function DeleteDistrict($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteDistrict($id);
                  $d=$this->modAdmin->deleteAdminByDistrictId($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','District Delated');
                        redirect('admin/District');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','District not found');
                    redirect('admin/District');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','District Can not found');
                    redirect('admin/District');


                }

        }
        public function AddDistrictAsAdmin($id,$d){

            $data['division']=$this->modAdmin->chekDivisionById($id);
            
            $data1['district']=$this->modAdmin->chekDistrictById($d);
           

            if (count($data['division'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header',$data1);
            $this->load->view('Admin/AddDistrictAsAdmin',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
         public function districtadmin(){
    $data['username']= $this->input->post('username','true');
                if (!empty($data['username'])) {
                    
                $addData=$this->modAdmin->checkDistrictExistencsOnAdmin($data);
                    if (count($addData)>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This User Name is Alredy Exist');
                        redirect('admin/District');
                       
                    }
                    else{
        $data['username']= $this->input->post('username','true');
        $data['division_id']= $this->input->post('division_id','true');
        $data['district_id']= $this->input->post('district_id','true');
    $data['division_name']= $this->input->post('division_name','true');
    $data['district_name']= $this->input->post('district_name','true');
    $data['password']= $this->input->post('password','true');
    $data['state']= 3;
    $addData=$this->modAdmin->addDistrictAsAdmin($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','District Access Successfully Allowed');
                        redirect('admin/District');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Division Access Denied');
                        redirect('admin/District');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Please Check All Field Then Go To Action');
                        redirect('admin/District'); 

                }

        }
        public function SubDistrict(){
        if ($this->session->userdata('state')==2) {
        $data['subdistrict'] = $this->modAdmin->fetch_SubDistrict();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/SubDistrict',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        elseif ($this->session->userdata('state')==3) {
$data['subdistrict'] = $this->modAdmin->fetch_SubDistrictDIById($this->session->userdata('district_id'));
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/SubDistrict',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        else{
$data['subdistrict'] = $this->modAdmin->fetch_SubDistrictById($this->session->userdata('division_id'));
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/SubDistrict',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        
        
    }
    public function DeleteSubDistrict($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteSubDistrict($id);
                  $d=$this->modAdmin->deleteAdminBySubDistrictid($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','District Delated');
                        redirect('admin/District');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','District not found');
                    redirect('admin/District');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','District Can not found');
                    redirect('admin/District');


                }

        }
    public function AddSubDistrictAsAdmin($id,$d,$e){

            $data['division']=$this->modAdmin->chekDivisionById($id);
            
            $data1['district']=$this->modAdmin->chekDistrictById($d);
            $data2['subdistrict']=$this->modAdmin->chekSubDistrictById($e);
           

            if (count($data['division'])==1) {
            $this->load->view('Admin/header',$data2);
            $this->load->view('Admin/admin_header',$data1);
            $this->load->view('Admin/AddSubDistrictAsAdmin',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
     public function subdistrictadmin(){
    $data['username']= $this->input->post('username','true');
                if (!empty($data['username'])) {
                    
                $addData=$this->modAdmin->checkDistrictExistencsOnAdmin($data);
                    if (count($addData)>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This User Name is Alredy Exist');
                        redirect('admin/District');
                       
                    }
                    else{
        $data['username']= $this->input->post('username','true');
        $data['division_id']= $this->input->post('division_id','true');
        $data['district_id']= $this->input->post('district_id','true');
    $data['subDistrict_id']= $this->input->post('subdistrict_id','true');
    $data['division_name']= $this->input->post('division_name','true');
    $data['district_name']= $this->input->post('district_name','true');
$data['subDistrict_name']= $this->input->post('subdistrict_name','true');
    $data['password']= $this->input->post('password','true');
    $data['state']= 4;
    $addData=$this->modAdmin->addDistrictAsAdmin($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Sub District Access Successfully Allowed');
                        redirect('admin/SubDistrict');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sub District Access Denied');
                        redirect('admin/SubDistrict');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Please Check All Field Then Go To Action');
                        redirect('admin/SubDistrict'); 

                }

        }
        public function Unioun(){
        if ($this->session->userdata('state')==2) {
        $data['unioun'] = $this->modAdmin->fetch_unioun();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/Unioun',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        elseif ($this->session->userdata('state')==4) {
           $data['unioun'] = $this->modAdmin->fetch_uniounBySDId($this->session->userdata('subDistrict_id'));
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/Unioun',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        elseif ($this->session->userdata('state')==1) {
$data['unioun'] = $this->modAdmin->fetch_uniounByDId($this->session->userdata('division_id'));
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/Unioun',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        else{
        $data['unioun'] = $this->modAdmin->fetch_uniounById($this->session->userdata('district_id'));
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/Unioun',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        
        
    }
    public function AddUniounAsAdmin($id,$d,$e,$f){

            $data['division']=$this->modAdmin->chekDivisionById($id);
            
            $data1['district']=$this->modAdmin->chekDistrictById($d);
        $data2['subdistrict']=$this->modAdmin->chekSubDistrictById($e);
        $data['unioun']=$this->modAdmin->chekUniounById($f);
           

            if (count($data['division'])==1) {
            $this->load->view('Admin/header',$data2);
            $this->load->view('Admin/admin_header',$data1);
            $this->load->view('Admin/AddUniounAsAdmin',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
    public function uniounadmin(){
    $data['username']= $this->input->post('username','true');
                if (!empty($data['username'])) {
                    
                $addData=$this->modAdmin->checkDistrictExistencsOnAdmin($data);
                    if (count($addData)>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This User Name is Alredy Exist');
                        redirect('admin/Unioun');
                       
                    }
                    else{
        $data['username']= $this->input->post('username','true');
        $data['division_id']= $this->input->post('division_id','true');
        $data['district_id']= $this->input->post('district_id','true');
    $data['subDistrict_id']= $this->input->post('subdistrict_id','true');
    $data['union_id']= $this->input->post('union_id','true');
    $data['division_name']= $this->input->post('division_name','true');
    $data['district_name']= $this->input->post('district_name','true');
$data['subDistrict_name']= $this->input->post('subdistrict_name','true');
$data['unioun_name']= $this->input->post('unioun_name','true');
    $data['password']= $this->input->post('password','true');
    $data['state']= 5;
    $addData=$this->modAdmin->addDistrictAsAdmin($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Unioun Access Successfully Allowed');
                        redirect('admin/Unioun');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Unioun Access Denied');
                        redirect('admin/Unioun');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Please Check All Field Then Go To Action');
                        redirect('admin/Unioun'); 

                }

        }
    public function DeleteUnioun($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteUnion($id);
                  $d=$this->modAdmin->deleteAdminByunionid($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Union Delated');
                        redirect('admin/Unioun');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Union not found');
                    redirect('admin/Unioun');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Uninoun Can not found');
                    redirect('admin/Unioun');


                }

        }
        public function addProduct(){
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/addProduct');
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
         public function productAdd(){
        $data['addedBy']= $this->input->post('addedBy','true');
        $data['product_name']= $this->input->post('product_name','true');
        $data['description']= $this->input->post('description','true');
        $data['sell_price']= $this->input->post('sell_price','true');
        $data['sell_amount']= $this->input->post('sell_amount','true');
        $data['buy_price']= $this->input->post('buy_price','true');
        $data['post_time']=date("Y/m/d");
                if (!empty($data['product_name'])) {
                    $path=realpath('assets/img/');
                    $config['upload_path']=$path;
                    $config['allowed_types']='gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if (!$this->upload->do_upload('img')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image not found');
                    redirect('admin/addProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img']=$fileName['file_name'];
                        $data['post_time']=date('Y-M-d h:i:sa');

                    }
                    if (!$this->upload->do_upload('img1')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image-1 not found');
                    redirect('admin/addProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img1']=$fileName['file_name'];
                        $data['post_time']=date('Y-M-d h:i:sa');
                          }
                          if (!$this->upload->do_upload('img2')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image-1 not found');
                    redirect('admin/addProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img2']=$fileName['file_name'];
                        $data['post_time']=date('Y-M-d h:i:sa');
                          }
                        if (!$this->upload->do_upload('img3')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image-2 not found');
                    redirect('admin/addProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img3']=$fileName['file_name'];
                        $data['post_time']=date('Y-M-d h:i:sa');
                          }
                        if (!$this->upload->do_upload('img3')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image-3 not found');
                    redirect('admin/addProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img3']=$fileName['file_name'];
                        $data['post_time']=date('Y-M-d h:i:sa');
                          }
                          if (!$this->upload->do_upload('img4')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image-4 not found');
                    redirect('admin/addProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img4']=$fileName['file_name'];
                        $data['post_time']=date('Y-M-d h:i:sa');
                          }
                $addData=$this->modAdmin->checkProductExistence($data);
                    if ($addData->num_rows()>0) {
                $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Sorry This Product is Alredy Exist');
                    redirect('admin/addProduct');
                       
                    }
                    else{
                    $addData=$this->modAdmin->addProduct($data);
                    if ($addData) {
                       
                        $this->session->set_flashdata('class','alert-success');
                   $this->session->set_flashdata('message','Product Added Successfully');
                    redirect('admin/addProduct');
                    }
                    else{
                       
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product not Added');
                    redirect('admin/addProduct');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Check All Field please');
                    redirect('admin/addProduct');

                }

        }
        public function addSubProduct(){
            $data['allProduct']=$this->modAdmin->fetchallProduct();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/addSubProduct',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
        public function sunProductAdd(){
        $data['addedBy']= $this->input->post('addedBy','true');
        $data['product_id']= $this->input->post('product_id','true');
$data['subProduct_name']= $this->input->post('subProduct_name','true');
        $data['sell_price']= $this->input->post('sell_price','true');
        $data['buy_price']= $this->input->post('buy_price','true');
        $data['post_time']=date("Y/m/d");
                if (!empty($data['subProduct_name'])) {
                    $path=realpath('assets/img/');
                    $config['upload_path']=$path;
                    $config['allowed_types']='gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if (!$this->upload->do_upload('img')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image not found');
                    redirect('admin/addSubProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img']=$fileName['file_name'];
                        $data['post_time']=date('Y-M-d h:i:sa');
                       

                    }
            $addData=$this->modAdmin->checkSubProductExistence($data);
                    if ($addData->num_rows()>0) {
                        
                        $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Sorry This Product is Alredy Exist');
                    redirect('admin/addSubProduct');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addSubProduct($data);
                    if ($addData) {
                       
                        $this->session->set_flashdata('class','alert-success');
                   $this->session->set_flashdata('message','Sub Product Added Successfully');
                    redirect('admin/addSubProduct');
                    }
                    else{
                       
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product not Added');
                    redirect('admin/addSubProduct');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Check All Field please');
                    redirect('admin/addSubProduct');

                }

        }
        public function viewProduct(){
            $data['allProduct']=$this->modAdmin->fetchallProduct();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewProduct',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
        public function deleteProduct($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteProduct($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Product Delated');
                        redirect('admin/viewProduct');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product not found');
                    redirect('admin/viewProduct');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product Can not found');
                    redirect('admin/viewProduct');


                }

        }
        public function editProduct($id){

            $data['product']=$this->modAdmin->chekProductById($id);
            if (count($data['product'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editProduct',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
        public function updateProduct(){        
            $data['product_name']=$this->input->post('product_name',true);
        $data['description']=$this->input->post('description',true);
            $data['sell_price']=$this->input->post('sell_price',true);
            $data['buy_price']=$this->input->post('buy_price',true);
           $data['post_time']=date("Y/m/d"); 
           $data['id']=$this->input->post('id',true); 
                $oldimg=$this->input->post('img',true);
                if (!empty($data['product_name'])&& isset($data['sell_price'])&& isset($data['buy_price'])) {
                    if(isset($_FILES['img']) && is_uploaded_file($_FILES['img']['tmp_name'])){
                    $path=realpath('assets/img/');
                    $config['upload_path']=$path;
                    $config['allowed_types']='gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if (!$this->upload->do_upload('img')) {
                        $error=$this->upload->display_errors();
                        setFlashData('alert-danger','$error','admin/viewProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img']=$fileName['file_name'];
                        
                    }

                    }//Image Chaking Here
                    $reply=$this->modAdmin->updateProduct($data,$data['id']);
                    if ($reply) {
                        if (!empty($data['img']) && isset($data['img'])) {
                            if (file_exists($path.'/'.$oldimg)) {
                                unlink($path.'/'.$oldimg);
                            }
                        }
                $this->session->set_flashdata('class','alert-success');
                $this->session->set_flashdata('message','Product Updated Successfully');
                redirect('admin/viewProduct');
                        
                    }
                    else{
                        setFlashData('alert-danger','You can not updated now','admin/viewProduct');
                    }
                    # code...
                }
                else{
                    setFlashData('alert-danger','Please Check Every Field','admin/viewProduct');

                }
           
        }
        public function viewSubProduct(){
            $data['allSubProduct']=$this->modAdmin->fetchallSubProduct();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewSubProduct',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
         public function deleteSubProduct($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteSubProduct($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Product Delated');
                        redirect('admin/viewSubProduct');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product not found');
                    redirect('admin/viewSubProduct');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product Can not found');
                    redirect('admin/viewSubProduct');


                }

        }
        public function editSubProduct($id){

            $data['product']=$this->modAdmin->chekSubProductById($id);
            if (count($data['product'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editSubProduct',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
    public function updateSubProduct(){        
            $data['product_name']=$this->input->post('product_name',true);
        $data['sell_price']=$this->input->post('sell_price',true);
        $data['sell_amount']=$this->input->post('sell_amount',true);
            $data['buy_price']=$this->input->post('buy_price',true);
           $data['description']=$this->input->post('description',true);
           $data['post_time']=date("Y/m/d"); 
           $data['id']=$this->input->post('id',true); 
                $oldimg=$this->input->post('img',true);
                if (!empty($data['product_name'])&& isset($data['sell_price'])&& isset($data['buy_price'])) {
                    if(isset($_FILES['img']) && is_uploaded_file($_FILES['img']['tmp_name'])){
                    $path=realpath('assets/img/');
                    $config['upload_path']=$path;
                    $config['allowed_types']='gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if (!$this->upload->do_upload('img')) {
                        $error=$this->upload->display_errors();
                        setFlashData('alert-danger','$error','admin/viewProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img']=$fileName['file_name'];
                        
                    }
                    if (!$this->upload->do_upload('img1')) {
                        $error=$this->upload->display_errors();
                        setFlashData('alert-danger','$error','admin/viewProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img1']=$fileName['file_name'];
                        
                    }
                    if (!$this->upload->do_upload('img2')) {
                        $error=$this->upload->display_errors();
                        setFlashData('alert-danger','$error','admin/viewProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img2']=$fileName['file_name'];
                        
                    }
                    if (!$this->upload->do_upload('img3')) {
                        $error=$this->upload->display_errors();
                        setFlashData('alert-danger','$error','admin/viewProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img3']=$fileName['file_name'];
                        
                    }
                    if (!$this->upload->do_upload('img4')) {
                        $error=$this->upload->display_errors();
                        setFlashData('alert-danger','$error','admin/viewProduct');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img4']=$fileName['file_name'];
                        
                    }

                    }//Image Chaking Here
                    $reply=$this->modAdmin->updateSubProduct($data,$data['id']);
                    $this->modAdmin->updateGraph($data,$data['id']);

                    if ($reply) {
                        if (!empty($data['img']) && isset($data['img'])) {
                            if (file_exists($path.'/'.$oldimg)) {
                                unlink($path.'/'.$oldimg);
                            }
                        }
                $this->session->set_flashdata('class','alert-success');
                $this->session->set_flashdata('message','Product Updated Successfully');
                redirect('admin/viewProduct');
                        
                    }
                    else{
                        setFlashData('alert-danger','You can not updated now','admin/viewProduct');
                    }
                    # code...
                }
                else{
                    setFlashData('alert-danger','Please Check Every Field','admin/viewProduct');

                }
           
        }
        public function addNews(){
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/addNews');
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
        public function newsAdd(){
        $data['news_title']= $this->input->post('news_title','true');
        $data['news_body']= $this->input->post('news_body','true');
        $data['post_time']=date("Y/m/d");
                if (!empty($data['news_body'])) {
                    $path=realpath('assets/img/');
                    $config['upload_path']=$path;
                    $config['allowed_types']='gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if (!$this->upload->do_upload('img')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image not found');
                    redirect('admin/addNews');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img']=$fileName['file_name'];
                        $data['post_time']=date('Y-M-d h:i:sa');
                       

                    }
            $addData=$this->modAdmin->checkNewsExistence($data);
                    if ($addData->num_rows()>0) {
                        
                        $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Sorry This News is Alredy Exist');
                    redirect('admin/addNews');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addNews($data);
                    if ($addData) {
                       
                        $this->session->set_flashdata('class','alert-success');
                   $this->session->set_flashdata('message','News Added Successfully');
                    redirect('admin/addNews');
                    }
                    else{
                       
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','News not Added');
                    redirect('admin/addNews');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Check All Field please');
                    redirect('admin/addNews');

                }

        }
        public function viewNews(){
            $data['allNews']=$this->modAdmin->fetchallNews();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewNews',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
        public function deleteNews($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteNews($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','News Delated');
                        redirect('admin/viewNews');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','News not found');
                    redirect('admin/viewNews');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','News  not found');
                    redirect('admin/viewNews');


                }

        }
        public function editNews($id){

            $data['product']=$this->modAdmin->chekNewsById($id);
            if (count($data['product'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editNews',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
         public function updateNews(){        
            $data['news_title']=$this->input->post('news_title',true);
            $data['news_body']=$this->input->post('news_body',true);
           $data['post_time']=date("Y/m/d"); 
           $data['id']=$this->input->post('id',true); 
                $oldimg=$this->input->post('img',true);
                if (!empty($data['news_body'])&& isset($data['news_title'])&& isset($data['id'])) {
                    if(isset($_FILES['img']) && is_uploaded_file($_FILES['img']['tmp_name'])){
                    $path=realpath('assets/img/');
                    $config['upload_path']=$path;
                    $config['allowed_types']='gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if (!$this->upload->do_upload('img')) {
                        $error=$this->upload->display_errors();
                        setFlashData('alert-danger','$error','admin/viewNews');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img']=$fileName['file_name'];
                        
                    }

                    }//Image Chaking Here
                    $reply=$this->modAdmin->updateNews($data,$data['id']);
                    if ($reply) {
                        if (!empty($data['img']) && isset($data['img'])) {
                            if (file_exists($path.'/'.$oldimg)) {
                                unlink($path.'/'.$oldimg);
                            }
                        }
                $this->session->set_flashdata('class','alert-success');
                $this->session->set_flashdata('message','News Updated Successfully');
                redirect('admin/viewNews');
                        
                    }
                    else{
                        setFlashData('alert-danger','You can not updated now','admin/viewNews');
                    }
                    # code...
                }
                else{
                    setFlashData('alert-danger','Please Check Every Field','admin/viewNews');

                }
           
        }
        public function viewNotice(){
            $data['allNotice']=$this->modAdmin->fetchallNotice();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewNotice',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
        public function deleteNotice($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteNotice($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Notice Delated');
                        redirect('admin/viewNotice');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Notice not found');
                    redirect('admin/viewNotice');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Notice  not found');
                    redirect('admin/viewNotice');


                }

        }
        public function editNotice($id){

            $data['product']=$this->modAdmin->chekNoticeById($id);
            if (count($data['product'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/editNotice',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
         public function updateNotice(){        
        $data['notice_title']=$this->input->post('notice_title',true);
            $data['notice_body']=$this->input->post('notice_body',true);
           $data['time']=date("Y/m/d"); 
           $data['notice_id']=$this->input->post('notice_id',true); 
                if (!empty($data['notice_body'])&& isset($data['notice_title'])&& isset($data['notice_id'])) {
                    
                    $reply=$this->modAdmin->updateNotice($data,$data['notice_id']);
                    if ($reply) {
                        
                $this->session->set_flashdata('class','alert-success');
                $this->session->set_flashdata('message','Notice Updated Successfully');
                redirect('admin/viewNotice');
                        
                    }
                    else{
                        setFlashData('alert-danger','You can not updated now','admin/viewNotice');
                    }
                    # code...
                }
                else{
                    setFlashData('alert-danger','Please Check Every Field','admin/viewNotice');

                }
           
        }
        public function addNotice(){
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/addNotice');
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        }
         public function noticeAdd(){
        $data['notice_title']= $this->input->post('notice_title','true');
        $data['notice_body']= $this->input->post('notice_body','true');
        $data['time']=date("Y/m/d");
                if (!empty($data['notice_body'])) {
                    
            $addData=$this->modAdmin->checkNoticeExistence($data);
                    if ($addData->num_rows()>0) {
                        
                        $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Sorry This Notice is Alredy Exist');
                    redirect('admin/addNotice');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addNotice($data);
                    if ($addData) {
                       
                        $this->session->set_flashdata('class','alert-success');
                   $this->session->set_flashdata('message','Notice Added Successfully');
                    redirect('admin/addNotice');
                    }
                    else{
                       
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Notice not Added');
                    redirect('admin/addNotice');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Check All Field please');
                    redirect('admin/addNotice');

                }

        }
        public function viewFarmer(){
            if ($this->session->userdata('state')=='2') {
            $data['allFarmer']=$this->modAdmin->fetchallFarmer();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewFarmer',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
            }
            elseif ($this->session->userdata('state')=='1') {
            $d=$this->modAdmin->fetchDivNameById($this->session->userdata('division_id'));
$data['allFarmer']=$this->modAdmin->fetchallFarmerusingDivision($d->division_name);
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewFarmer',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
            }
            elseif($this->session->userdata('state')=='3'){
                $d=$this->modAdmin->fetchDisNameById($this->session->userdata('district_id'));
$data['allFarmer']=$this->modAdmin->fetchallFarmerusingDistrict($d->district_name);
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewFarmer',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
            }
            elseif($this->session->userdata('state')=='4'){
                $d=$this->modAdmin->fetchSubDisNameById($this->session->userdata('subDistrict_id'));
$data['allFarmer']=$this->modAdmin->fetchallFarmerusingSubDistrict($d->subDistrict_name);
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewFarmer',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
            }
            elseif($this->session->userdata('state')=='5'){
                
                $d=$this->modAdmin->fetchSubUniounNameById($this->session->userdata('union_id'));
$data['allFarmer']=$this->modAdmin->fetchallFarmerusingUnioun($d->unioun_name);
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewFarmer',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
            }
            
        }
        public function deleteFarmer($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteFarmer($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Farmer Delated');
                        redirect('admin/viewFarmer');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Farmer not found');
                    redirect('admin/viewFarmer');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Farmer  not found');
                    redirect('admin/viewFarmer');


                }

        }
        public function farmerOrder(){
            $data['allorder']=$this->modAdmin->fetchallOrder();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/farmerOrder',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
        public function viewFarmerAddress($id){

            $data['product']=$this->modAdmin->chekFarmerById($id);
            if (count($data['product'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewFarmerAddress',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
        public function viewFarmerAddress1($id){

            $data['product']=$this->modAdmin->chekFarmerById($id);
            if (count($data['product'])==1) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/viewFarmerAddress1',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
                  }
        }
        public function changeDelivaryStatus($id){
            $data['status']='1';
            $updateAdmin=$this->modAdmin->updateOrderForStatus($data,$id);
            redirect('admin/farmerOrder'); 
        }
        public function deleteFarmerSuccessDelivary($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteSuccessOrder($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Order Delated');
                        redirect('admin/farmerOrder');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Farmer not found');
                    redirect('admin/farmerOrder');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Farmer  not found');
                    redirect('admin/farmerOrder');


                }

        }
         public function farmerSell(){
            $data['allsell']=$this->modAdmin->fetchallSell();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/farmerSell',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
        public function changeFSStatus($id){
            $data['status']='1';
            $updateAdmin=$this->modAdmin->updateSellForStatus($data,$id);
            redirect('admin/farmerSell'); 
        }
               public function deleteFarmerSuccessSell($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteSuccessSell($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Seled info Delated');
                        redirect('admin/farmerSell');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Farmer not found');
                    redirect('admin/farmerSell');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Farmer  not found');
                    redirect('admin/farmerSell');


                }

        }
        public function addDistrict(){
            $data['division'] = $this->modUser->fetch_division();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/addDistrict',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
        public function adDistrict(){

   /*         if (adminLogedIn()){*/
        $data['division_id']= $this->input->post('division','true');
        $data['district_name']= $this->input->post('district_name','true');
                if (!empty($data['district_name'])) {
                    
                $addData=$this->modAdmin->checkDistrictExistencs($data);
                    if ($addData->num_rows()>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This District is Alredy Exist');
                        redirect('admin/addDistrict');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addDistrict($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','District Added Successfully');
                        redirect('admin/addDistrict');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','District not Added');
                        redirect('admin/addDistrict');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','District Name Required');
                        redirect('admin/addDistrict'); 

                }

        }
        public function addSubDistrict(){
            $data['division'] = $this->modUser->fetch_division();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/addSubDistrict',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
        public function adSubDistrict(){
        $data['district_id']= $this->input->post('district','true');
        $data['subDistrict_name']= $this->input->post('subDistrict_name','true');
                if (!empty($data['subDistrict_name'])) {
                    
            $addData=$this->modAdmin->checkSubDistrictExistencs($data);
                    if ($addData->num_rows()>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This Sub District is Alredy Exist');
                        redirect('admin/addSubDistrict');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addSubDistrict($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Sub District Added Successfully');
                        redirect('admin/addSubDistrict');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sub District not Added');
                        redirect('admin/addSubDistrict');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sub District Name Required');
                        redirect('admin/addSubDistrict'); 

                }

        }
        public function addUnioun(){
            $data['division'] = $this->modUser->fetch_division();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/addUnioun',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }
        public function adUnioun(){
        $data['subDistrict_id']= $this->input->post('upozila','true');
        $data['unioun_name']= $this->input->post('unioun_name','true');
                if (!empty($data['unioun_name'])) {
                    
            $addData=$this->modAdmin->checkUniounExistencs($data);
                    if ($addData->num_rows()>0) {
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Sorry This Unioun is Alredy Exist');
                        redirect('admin/addUnioun');
                       
                    }
                    else{
                        $addData=$this->modAdmin->addUnioun($data);
                    if ($addData) {
                        $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Unioun Added Successfully');
                        redirect('admin/addUnioun');
                    }
                    else{
                        $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Unioun not Added');
                        redirect('admin/addUnioun');
                    }
                    }
                    
                }
                else{
                   
                   $this->session->set_flashdata('class','alert-danger');
                        $this->session->set_flashdata('message','Unioun Name Required');
                        redirect('admin/addUnioun'); 

                }

        }
    public function showMessage(){
        
        $data['allMessage'] = $this->modAdmin->fetch_allMessage();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/showMessage',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');
        
    }
    public function specificUserMessage(){
        $data['sender_id']=$this->input->post('msg');
        $data['sender_name']=$this->input->post('sender_name');
        echo $this->modAdmin->specificUserMessage($data);
    }
    public function replyUserMessage(){
        $data['reply_by']=$this->input->post('reply_by');
        $data['reply_to']=$this->input->post('reply_to');
        $data['sender_id']=$this->input->post('reply_to');
        $data['message']=$this->input->post('message');
        $data['conType']='1';
        echo $this->modAdmin->replyUserMessage($data);
    }
    public function sellRequest(){
            $data['allsell']=$this->modAdmin->fetchAllSellRequest();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/sellRequest',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
    }
            public function changeFSrequestStatus($id){
            $data['request']='1';
            $updateAdmin=$this->modAdmin->updateSellForStatus($data,$id);
            redirect('admin/sellRequest'); 
        }
        public function productRequest(){
    $data['allProduct']=$this->modAdmin->fetchallProductRequest();
        $this->load->view('Admin/header');
        $this->load->view('Admin/admin_header');
        $this->load->view('Admin/productRequest',$data);
        $this->load->view('Admin/admin_footer');
        $this->load->view('Admin/footer');

        }
        public function deleteProductRequest($id){
            if(!empty($id) && isset($id)){
                  $data=$this->modAdmin->deleteProductRequest($id);
                  if ($data) {
                    $this->session->set_flashdata('class','alert-success');
                        $this->session->set_flashdata('message','Product Request Delated');
                        redirect('admin/productRequest');
                    
                  }
                  else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product Request not found');
                    redirect('admin/productRequest');
                  }
                }
                else{
                    $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product Request Can not found');
                    redirect('admin/productRequest');


                }

        }
        public function sendProductRequestToSec($id){
            $data['requestToSac']='1';
            $updateAdmin=$this->modAdmin->sendProductRequestToSec($data,$id);
            redirect('admin/productRequest');
        }
        public function complainBox(){
            $data['allorder']=$this->modAdmin->fetchallComplain();
            $this->load->view('Admin/header');
            $this->load->view('Admin/admin_header');
            $this->load->view('Admin/complainBox',$data);
            $this->load->view('Admin/admin_footer');
            $this->load->view('Admin/footer');
        }




        


}

