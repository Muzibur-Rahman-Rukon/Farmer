<?php 

    class ModAdmin extends CI_Model{

    	public function checkAdmin($data){
   		$array = array('username' => $data['username'],
                        'password' => $data['password']
   	  );
   		return $this->db->get_where('tbl_admin',$array)->result_array();
   	}
   	 public function fetch_division(){
      $this->db->order_by("division_name", "ASC");
      $query = $this->db->get("tbl_division");
      return $query->result();
    }
     public function fetch_district(){
    
    $this->db->select('tbl_division.*, tbl_district.*');
	$this->db->from('tbl_division');
	$this->db->join('tbl_district', 'tbl_division.id = tbl_district.division_id');
	$query = $this->db->get();
	return $query->result();
    }
     public function fetch_districtById($id){
    
    $this->db->select('tbl_division.*, tbl_district.*');
  $this->db->from('tbl_division');
  $this->db->where('tbl_division.id',$id);
  $this->db->join('tbl_district', 'tbl_division.id = tbl_district.division_id');
  $query = $this->db->get();
  return $query->result();
    }
    public function fetch_SubDistrict(){
    $this->db->select('*');
	$this->db->join('tbl_district', 'tbl_district.division_id = tbl_division.id');
	$this->db->join('tbl_subDistrict', 'tbl_subDistrict.district_id = tbl_district.district_id');
	$this->db->from('tbl_division');
	$query = $this->db->get();
	return $query->result();
    }
    public function fetch_SubDistrictById($id){
    $this->db->select('*');
  $this->db->join('tbl_district', 'tbl_district.division_id = tbl_division.id');
  $this->db->join('tbl_subDistrict', 'tbl_subDistrict.district_id = tbl_district.district_id');
  $this->db->from('tbl_division');
  $this->db->where('tbl_division.id',$id);
  $query = $this->db->get();
  return $query->result();
    }
    public function fetch_SubDistrictDIById($id){
    $this->db->select('*');
  $this->db->join('tbl_district', 'tbl_district.division_id = tbl_division.id');
  $this->db->join('tbl_subDistrict', 'tbl_subDistrict.district_id = tbl_district.district_id');
  $this->db->from('tbl_division');
  $this->db->where('tbl_district.district_id',$id);
  $query = $this->db->get();
  return $query->result();
    }

    public function fetch_unioun(){
    $this->db->select('*');
	$this->db->join('tbl_district', 'tbl_district.division_id = tbl_division.id');
	$this->db->join('tbl_subDistrict', 'tbl_subDistrict.district_id = tbl_district.district_id');
	$this->db->join('tbl_union', 'tbl_union.subDistrict_id = tbl_subDistrict.subDistrict_id');
	$this->db->from('tbl_division');
	$query = $this->db->get();
	return $query->result();
    }
    public function fetch_uniounById($id){
    $this->db->select('*');
  $this->db->join('tbl_district', 'tbl_district.division_id = tbl_division.id');
  $this->db->join('tbl_subDistrict', 'tbl_subDistrict.district_id = tbl_district.district_id');
  $this->db->join('tbl_union', 'tbl_union.subDistrict_id = tbl_subDistrict.subDistrict_id');
  $this->db->from('tbl_division');
  $this->db->where('tbl_district.district_id',$id);
  $query = $this->db->get();
  return $query->result();
    }
    public function fetch_uniounBySDId($id){
     
    $this->db->select('*');
  $this->db->join('tbl_district', 'tbl_district.division_id = tbl_division.id');
  $this->db->join('tbl_subDistrict', 'tbl_subDistrict.district_id = tbl_district.district_id');
  $this->db->join('tbl_union', 'tbl_union.subDistrict_id = tbl_subDistrict.subDistrict_id');
  $this->db->from('tbl_division');
  $this->db->where('tbl_subDistrict.subDistrict_id',$id);
  $query = $this->db->get();
  return $query->result();
    }
    public function fetch_uniounByDId($id){
     
    $this->db->select('*');
  $this->db->join('tbl_district', 'tbl_district.division_id = tbl_division.id');
  $this->db->join('tbl_subDistrict', 'tbl_subDistrict.district_id = tbl_district.district_id');
  $this->db->join('tbl_union', 'tbl_union.subDistrict_id = tbl_subDistrict.subDistrict_id');
  $this->db->from('tbl_division');
  $this->db->where('tbl_division.id',$id);
  $query = $this->db->get();
  return $query->result();
    }
    public function checkDivisionExistencs($data){
   		$array = array('division_name' => $data['division_name']);
   		return $this->db->get_where('tbl_division',$array);
   	}
   	public function addDivision($data){
   		return $this->db->insert('tbl_division',$data);
   	}
   	public function addDivisionAsAdmin($data){
   		return $this->db->insert('tbl_admin',$data);
   	}
   	public function chekDivisionById($id){
         $array = array('id' => $id);
         return $this->db->get_where('tbl_division',$array)->result_array();
      }
    public function updateDivision($data,$id){
         $this->db->where('id',$id);
         return $this->db->update('tbl_division',$data);
      }
       public function deleteDivision($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_division');
      }
    public function chekDivExistenceInAdmin($data,$district_id){
      $array = array('username' => $data,
        'division_id'=>$district_id
      );
      return $this->db->get_where('tbl_admin',$array)->result_array();
    }
    public function chekExistenceInAdmin($data,$district_id){
   		$array = array('username' => $data,
        'district_id'=>$district_id
   	  );
   		return $this->db->get_where('tbl_admin',$array)->result_array();
   	}
    public function chekSubDisExistenceInAdmin($data,$district_id){
      $array = array('username' => $data,
        'subDistrict_id'=>$district_id
      );
      return $this->db->get_where('tbl_admin',$array)->result_array();
    }
    public function chekUniounExistenceInAdmin($data,$district_id){
      $array = array('username' => $data,
        'union_id'=>$district_id
      );
      return $this->db->get_where('tbl_admin',$array)->result_array();
    }
   	public function checkDivisionExistencsOnAdmin($data){
   		$array = array('username' => $data['division_name']
   	  );
   		return $this->db->get_where('tbl_admin',$array)->result_array();
   	}
   	public function chekStateByDivision($id,$username){
      $array=array(
        'username'=>$username,
        'division_id' => $id
      );
            
            $result = $this->db->get_where('tbl_admin',$array);
            return $result->row();
        }
    public function updateAdminForState($data,$id){
         $this->db->where('division_id',$id);
         return $this->db->update('tbl_admin',$data);
      }
      public function updateAdminDIForState($data,$id){
         $this->db->where('district_id',$id);
         return $this->db->update('tbl_admin',$data);
      }
       public function updateAdminSubDIForState($data,$id){
         $this->db->where('subDistrict_id',$id);
         return $this->db->update('tbl_admin',$data);
      }
      public function updateAdminUIForState($data,$id){
         $this->db->where('union_id',$id);
         return $this->db->update('tbl_admin',$data);
      }
    public function deleteAdmin($id){
         $this->db->where('division_id',$id);
         return $this->db->delete('tbl_admin');
      }
      public function deleteAdminByDistrictId($id){
         $this->db->where('district_id',$id);
         return $this->db->delete('tbl_admin');
      }
      public function deleteAdminBySubDistrictid($id){
         $this->db->where('subDistrict_id',$id);
         return $this->db->delete('tbl_admin');
      }

    public function deleteDistrict($id){
         $this->db->where('district_id',$id);
         return $this->db->delete('tbl_district');
      }
      public function deleteSubDistrict($id){
         $this->db->where('subDistrict_id',$id);
         return $this->db->delete('tbl_subDistrict');
      }
      public function deleteUnion($id){
         $this->db->where('union_id',$id);
         return $this->db->delete('tbl_union');
      }
    public function chekDistrictById($id){
         $array = array('district_id' => $id);
         return $this->db->get_where('tbl_district',$array)->result_array();
      }
      public function chekSubDistrictById($id){
         $array = array('subDistrict_id' => $id);
         return $this->db->get_where('tbl_subDistrict',$array)->result_array();
      }
      public function checkDistrictExistencsOnAdmin($data){
   		$array = array('username' => $data['username']
   	  );
   		return $this->db->get_where('tbl_admin',$array)->result_array();
   	}
   	public function addDistrictAsAdmin($data){
   		return $this->db->insert('tbl_admin',$data);
   	}
   		public function chekStateByDistrict($id,$username){
        $array=array(
           'username'=>$username,
           'district_id'=>$id
        );
           
            $result = $this->db->get_where('tbl_admin',$array);
            return $result->row();
        }
        public function chekStateBySubDistrict($id,$name){
          $array=array(
            'subDistrict_id'=>$id,
            'username'=>$name
          );
          $result = $this->db->get_where('tbl_admin',$array);
          return $result->row();
        }
        public function chekStateByUnioun($id){
            $this->db->where('union_id', $id);
            $result = $this->db->get('tbl_admin');
            return $result->row();
        }
        public function chekUniounById($id){
         $array = array('union_id' => $id);
         return $this->db->get_where('tbl_union',$array)->result_array();
      }
      public function deleteAdminByunionid($id){
         $this->db->where('union_id',$id);
         return $this->db->delete('tbl_admin');
      }
      public function checkProductExistence($data){
      $array = array('product_name' => $data['product_name']);
      return $this->db->get_where('tbl_product',$array);
    }
    public function checkSubProductExistence($data){
      $array = array('subProduct_name' => $data['subProduct_name']);
      return $this->db->get_where('tbl_subProduct',$array);
    }
    public function addProduct($data){
      return $this->db->insert('tbl_product',$data);
    }
    public function addSubProduct($data){
      return $this->db->insert('tbl_subProduct',$data);
    }
    public function fetchallProduct(){
         $query= $this->db->get('tbl_product');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
   public function deleteProduct($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_product');
      }
      public function chekProductById($id){
         $array = array('id' => $id);
         return $this->db->get_where('tbl_product',$array)->result_array();
      }
      public function chekSubProductById($id){
         $array = array('id' => $id);
         return $this->db->get_where('tbl_subProduct',$array)->result_array();
      }
       public function fetchProductNameById($id){
         $array = array('id' => $id);
         return $this->db->get_where('tbl_product',$array)->row();

      }
      public function fetchFarmerNameById($id){
        $id=intval($id);
         $array = array('id' => $id);
         return $this->db->get_where('tbl_registration',$array)->row();

      }
      public function updateProduct($data,$category_id){
         $this->db->where('id',$category_id);
         return $this->db->update('tbl_product',$data);
      }
      public function updateSubProduct($data,$category_id){
         $this->db->where('id',$category_id);
         return $this->db->update('tbl_product',$data);
      }
      public function updateGraph($data,$category_id){
        $d['product_id']=$category_id;
        $d['buy_price']=$data['buy_price'];
        $d['sell_price']=$data['sell_price'];
        $this->db->insert('tbl_graph',$d);

      }
      public function fetchallSubProduct(){
           $query= $this->db->get('tbl_subProduct');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
    }
    public function deleteSubProduct($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_subProduct');
      }
      public function checkNewsExistence($data){
      $array = array('news_body' => $data['news_body']);
      return $this->db->get_where('tbl_news',$array);
    }
    public function addNews($data){
      return $this->db->insert('tbl_news',$data);
    }
        public function fetchallNews(){
         $query= $this->db->get('tbl_news');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function fetchallNotice(){
         $query= $this->db->get('tbl_notice');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function deleteNews($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_news');
      }
      public function chekNewsById($id){
         $array = array('id' => $id);
         return $this->db->get_where('tbl_news',$array)->result_array();
      }
      public function updateNews($data,$category_id){
         $this->db->where('id',$category_id);
         return $this->db->update('tbl_news',$data);
      }
      public function deleteNotice($id){
         $this->db->where('notice_id',$id);
         return $this->db->delete('tbl_notice');
      }
      public function chekNoticeById($id){
         $array = array('notice_id' => $id);
         return $this->db->get_where('tbl_notice',$array)->result_array();
      }
      public function updateNotice($data,$category_id){
         $this->db->where('notice_id',$category_id);
         return $this->db->update('tbl_notice',$data);
      }
       public function checkNoticeExistence($data){
      $array = array('notice_body' => $data['notice_body']);
      return $this->db->get_where('tbl_notice',$array);
    }
    public function addNotice($data){
      return $this->db->insert('tbl_notice',$data);
    }
    public function fetchallFarmer(){
         $query= $this->db->get('tbl_registration');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
    public function deleteFarmer($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_registration');
      }
    public function fetchallOrder(){
         $query= $this->db->get('tbl_finalOrder');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function chekFarmerById($id){
        $id=intval($id);
         $array = array('id' => $id);
         return $this->db->get_where('tbl_registration',$array)->result_array();
      }
      public function chekStateByOrderNumber($id){
            $this->db->where('id', $id);
            $result = $this->db->get('tbl_finalOrder');
            return $result->row();
        }
        public function updateOrderForStatus($data,$id){
         $this->db->where('id',$id);
         return $this->db->update('tbl_finalOrder',$data);
      }
      public function deleteSuccessOrder($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_finalOrder');
      }
      public function fetchallSell(){
        $this->db->where('request','1');
         $query= $this->db->get('tbl_farmerSell');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function chekStateBySellNumber($id){
            $this->db->where('id', $id);
            $result = $this->db->get('tbl_farmerSell');
            return $result->row();
        }
      public function updateSellForStatus($data,$id){
         $this->db->where('id',$id);
         return $this->db->update('tbl_farmerSell',$data);
      }
      public function deleteSuccessSell($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_farmerSell');
      }
      public function numberOfRegistredFarmer(){
         
         return $this->db->get('tbl_registration')->result_array();
      }
      public function numberOfRegistredFarmerInDiv(){
         $array=array('division' => $this->session->userdata('name') );
         return $this->db->get_where('tbl_registration',$array)->result_array();
      }
      public function numberOfRegistredFarmerInDis(){
         $array=array('district' => $this->session->userdata('name') );
         return $this->db->get_where('tbl_registration',$array)->result_array();
      }
      public function numberOfRegistredFarmerInSubDis(){
         $array=array('upozila' => $this->session->userdata('name') );
         return $this->db->get_where('tbl_registration',$array)->result_array();
      }
      public function numberOfRegistredFarmerInUnioun(){
         $array=array('unioun' => $this->session->userdata('name') );
         return $this->db->get_where('tbl_registration',$array)->result_array();
      }
      public function countSellProduct(){
         
         return $this->db->get('tbl_farmerSell')->result_array();
      }
      public function countBuyProduct(){
         
         return $this->db->get('tbl_finalOrder')->result_array();
      }
      public function countActiveBranches(){
         
         return $this->db->get('tbl_admin')->result_array();
      }
      public function checkDistrictExistencs($data){
      $array = array('division_id' => $data['division_id'],
                     'district_name' => $data['district_name']
    );
      return $this->db->get_where('tbl_district',$array);
    }
    public function addDistrict($data){
      return $this->db->insert('tbl_district',$data);
    }
    public function addSubDistrict($data){
      return $this->db->insert('tbl_subDistrict',$data);
    }public function addUnioun($data){
      return $this->db->insert('tbl_union',$data);
    }
    public function checkSubDistrictExistencs($data){
      $array = array('district_id' => $data['district_id'],
                     'subDistrict_name' => $data['subDistrict_name']
    );
      return $this->db->get_where('tbl_subDistrict',$array);
    }
    public function checkUniounExistencs($data){
      $array = array('subDistrict_id' => $data['subDistrict_id'],
                     'unioun_name' => $data['unioun_name']
    );
      return $this->db->get_where('tbl_union',$array);
    }
    public function chkUnreadMessage(){
      $array = array('read_status' => '0'
                       );
      return $this->db->get_where('tbl_message',$array)->result_array();
    }
    public function fetch_allMessage(){
      $this->db->group_by("sender_id");
      $query = $this->db->get("tbl_message");
      return $query->result();
    }
        public function specificUserMessage($data){
          $array = array( 'read_status'=>'1'
          );
      $this->db->where('sender_id',$data['sender_id']);
      $this->db->update('tbl_message',$array);
      $this->db->select('*');
      $this->db->from('tbl_message');
      $this->db->or_where('sender_id', $data['sender_id']);
      $this->db->or_where('reply_to', $data['sender_id']);
      $last_row = $this->db->get();
        $output='';
        $output .='<h3 class="card" style="background-color:green;color:white"><center>'.$data['sender_name'].'</center></h3>';

      if(!empty($last_row)){
         

        //Header
        
        foreach($last_row->result() as $row)
        {
         
          if ($row->conType=='1') {
           $output .='<p class="text-right card-body"><span class="card" style="background-color:#007bff;color:white;font-weight:bold">'.$row->message.'</span></p>';
         }
         else{
          $output .='<p class="text-left card-body"><span class="card">'.$row->message.'</span></p>';
         }
          
        }
        $output .= '<input type="hidden" id="sender_id" name="sender_id" value="'.$row->sender_id.'"></input>';
      }else{
        
        $output = '<option value="">Select State</option>';
      
      }
      return $output;
     
    }
    public function replyUserMessage($data){
      $this->db->insert('tbl_message',$data);
      $this->db->select('*');
      $this->db->from('tbl_message');
      $this->db->or_where('sender_id', $data['reply_to']);
      $this->db->or_where('reply_to', $data['reply_to']);
      $last_row = $this->db->get();
        /*$array = array('sender_id' => $data['reply_to'],
                       'reply_to' =>  $data['reply_to']
    );
      $last_row= $this->db->get_where('tbl_message',$array);*/
        $output='';
      if(!empty($last_row)){
        
        foreach($last_row->result() as $row)
        {
         if ($row->conType=='1') {
           $output .='<p class="text-right card-body"><span class="card" style="background-color:#007bff;color:white;font-weight:bold">'.$row->message.'</span></p>';
         }
         else{
          $output .='<p class="text-left card-body"><span class="card">'.$row->message.'</span></p>';
         }
          
        }
        $output .= '<input type="hidden" id="sender_id" name="sender_id" value="'.$row->sender_id.'"></input>';
      }else{
        
        $output = '<option value="">Select State</option>';
      
      }
      return $output;
     
    }
    public function countPendingSellRequest(){
      $array = array('request' => '0'
                       );
      return $this->db->get_where('tbl_farmerSell',$array)->result_array();
    }
    public function fetchAllSellRequest(){
        $this->db->where('request','0');
         $query= $this->db->get('tbl_farmerSell');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
          public function checkProductRequestExistence($data){
      $array = array('product_name' => $data['product_name']);
      return $this->db->get_where('tbl_product_request',$array);
    }
        public function fetchallProductRequest(){
         $query= $this->db->get('tbl_product_request');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
         public function deleteProductRequest($id){
         $this->db->where('id',$id);
         return $this->db->delete('tbl_product_request');
      }
          public function fetchallFarmerusingDivision($div){
         $array=array('division' =>$div );
         $query= $this->db->get_where('tbl_registration',$array);
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function fetchDivNameById($id){
        $array=array(
           'id'=>$id
        );
           
            $result = $this->db->get_where('tbl_division',$array);
            return $result->row();
        }
        public function fetchDisNameById($id){
        $array=array(
           'district_id'=>$id
        );
           
            $result = $this->db->get_where('tbl_district',$array);
            return $result->row();
        }
        public function fetchallFarmerusingDistrict($dis){
         $array=array('district' =>$dis );
         $query= $this->db->get_where('tbl_registration',$array);
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
        public function fetchSubDisNameById($id){
        $array=array(
           'subDistrict_id'=>$id
        );
           
          $result = $this->db->get_where('tbl_subDistrict',$array);
            return $result->row();
        }
        public function fetchallFarmerusingSubDistrict($subdis){
         $array=array('upozila' =>$subdis );
         $query= $this->db->get_where('tbl_registration',$array);
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function fetchSubUniounNameById($id){
        $array=array(
           'union_id'=>$id
        );
           
          $result = $this->db->get_where('tbl_union',$array);
            return $result->row();
        }
      public function fetchallFarmerusingUnioun($unioun){
         $array=array('unioun' =>$unioun);
         $query= $this->db->get_where('tbl_registration',$array);
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function fetchDivNameforFarmerOrderById($id){
        
        $array=array(
           'id'=>$id
        );
           
        $result = $this->db->get_where('tbl_registration',$array);
        return $result->row();
        }
        public function countFarmerSellByPlace(){
        $query= $this->db->get('tbl_farmerSell');
        $data=0;
        if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
               
                $d=$this->modAdmin->fetchDivNameforFarmerOrderById($row->user_id);
      $array=array('id' =>$row->user_id ,
           'division'=>$this->session->userdata('name')
       );
      $compareDivAndUserName=$this->modAdmin->compareDivAndUserName($array);
      $array1=array('id' =>$row->user_id ,
           'district'=>$this->session->userdata('name')
       );
      $array2=array('id' =>$row->user_id ,
           'upozila'=>$this->session->userdata('name')
       );
      $array3=array('id' =>$row->user_id ,
           'unioun'=>$this->session->userdata('name')
       );
      $compareDisAndUserName=$this->modAdmin->compareDisAndUserName($array1);
      $compareSubDisAndUserName=$this->modAdmin->compareSubDisAndUserName($array2);
      $compareUniounAndUserName=$this->modAdmin->compareUniounAndUserName($array3);
      
      if (count($compareDivAndUserName)==1) {
                 $data++;

                }
                elseif (count($compareDisAndUserName)==1) {
                 $data++;

                }
                elseif (count($compareSubDisAndUserName)==1) {
                 $data++;

                }
                elseif (count($compareUniounAndUserName)==1) {
                 $data++;

                }
             }
             return $data;
         }
         return false; 
        }
        public function countFarmerBuyByPlace(){
        $query= $this->db->get('tbl_finalOrder');
        $data=0;
        if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
               
                $d=$this->modAdmin->fetchDivNameforFarmerOrderById($row->user_id);
                if (strcmp($d->division,$this->session->userdata('name'))==1) {
                 $data++;

                }
                elseif (strcmp($d->district,$this->session->userdata('name'))==0) {
                 $data++;

                }
                elseif (strcmp($d->upozila,$this->session->userdata('name'))==0) {
                 $data++;

                }
                elseif (strcmp($d->unioun,$this->session->userdata('name'))==0) {
                 $data++;

                }
             }
             return $data;
         }
         return false; 
        }
        public function countActiveByPlace(){
        $this->db->where('state !=', 0);
        $query= $this->db->get('tbl_admin');
        $data=0;
        if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
               
                
                if (strcmp($row->division_name,$this->session->userdata('name'))==1) {
                 $data++;

                }
                elseif (strcmp($row->district_name,$this->session->userdata('name'))==0) {
                 $data++;

                }
                elseif (strcmp($row->subDistrict_name,$this->session->userdata('name'))==0) {
                 $data++;

                }
                elseif (strcmp($row->unioun_name,$this->session->userdata('name'))==0) {
                 $data++;

                }
             }
             return $data;
         }
         return false; 
        }
        public function countFarmerSellRequestByPlace(){
        $this->db->where('request',0);
        $query= $this->db->get('tbl_farmerSell');
        $data=0;
        if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
               
                $d=$this->modAdmin->fetchDivNameforFarmerOrderById($row->user_id);
                if (strcmp($d->division,$this->session->userdata('name'))==1) {
                 $data++;

                }
                elseif (strcmp($d->district,$this->session->userdata('name'))==0) {
                 $data++;

                }
                elseif (strcmp($d->upozila,$this->session->userdata('name'))==0) {
                 $data++;

                }
                elseif (strcmp($d->unioun,$this->session->userdata('name'))==0) {
                 $data++;

                }
             }
             return $data;
         }
         return false; 
        }
        public function sendProductRequestToSec($data,$id){
         $this->db->where('id',$id);
         return $this->db->update('tbl_product_request',$data);
        }
        public function showGraphOfAllProduct(){
          $this->db->select('*');
          $this->db->from('tbl_admin_graph');
          $last_row = $this->db->get();
          return $last_row;
    }
    public function fetchallComplain(){
         $query= $this->db->get('tbl_complain');
         if ($query->num_rows()>0) {
             foreach ($query ->result() as $row) {
                $data[]=$row;
             }
             return $data;
         }
         return false;
      }
      public function compareDivAndUserName($array){
      
      return $this->db->get_where('tbl_registration',$array)->result_array();
    }
    public function compareDisAndUserName($array){
      
      return $this->db->get_where('tbl_registration',$array)->result_array();
    }
    public function compareSubDisAndUserName($array){
      
      return $this->db->get_where('tbl_registration',$array)->result_array();
    }
    public function compareUniounAndUserName($array){
      
      return $this->db->get_where('tbl_registration',$array)->result_array();
    }
    public function fgfg($id){
        $array=array(
           '  subDistrict_id'=>$id
           
        );
           
            $result = $this->db->get_where('tbl_admin',$array);
            return $result->row();
        }
      
        

    }



 ?>