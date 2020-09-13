<?php 

    class ModUser extends CI_Model{
       
       public function chkRegister($data){
        
          $this->db->select('id');
          $this->db->from('tbl_registration');
          $this->db->or_where('nidnumber', $data['nidnumber']);
          $this->db->or_where('mobaile', $data['mobaile']);
          $query = $this->db->get();
          return $num = $query->num_rows();
       }
       public function addFarmer($data){
   		  return $this->db->insert('tbl_registration',$data);
   	}
   	public function permitlogin($data){
   		$this->load->database();
   		$this->db;
   		return $this->db->get_where('tbl_registration',$data)->result_array();
   	}
    public function fetch_division(){
      $this->db->order_by("division_name", "ASC");
      $query = $this->db->get("tbl_division");
      return $query->result();
    }
    public function fetch_district($division_id){
      $this->db->where('division_id', $division_id);
      $this->db->order_by('district_name', 'ASC');
      $query = $this->db->get('tbl_district');
      $output='';
      if(!empty($query)){
        $output = '<option value="">জেলা বাছাই করুণ</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->district_id.'">'.$row->district_name.'</option>';
        }
      }else{
        
        $output = '<option value="">Select State</option>';
      
      }
      
      return $output;
    }
    public function fetch_subDistrict($district_id){
        $this->db->where('district_id', $district_id);
        $this->db->order_by('subDistrict_name', 'ASC');
        $query = $this->db->get('tbl_subDistrict');
        $output = '<option value="">উপজেলা বাছাই করুণ</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->subDistrict_id.'">'.$row->subDistrict_name.'</option>';
        }
        return $output;
        }
    public function fetch_unioun($subDistrict_id){
        $this->db->where('subDistrict_id', $subDistrict_id);
        $this->db->order_by('unioun_name', 'ASC');
        $query = $this->db->get('tbl_union');
        $output = '<option value="">ইউনিয়ন বাছাই করুণ</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->union_id.'">'.$row->unioun_name.'</option>';
        }
        return $output;

    }
    public function fetch_divisionName($division){
        $this->db->select('division_name');
        $this->db->where('id',$division);
        $q = $this->db->get('tbl_division');
        // if id is unique, we want to return just one row
        $data = array_shift($q->result_array());

        return $data['division_name'];

    }
    public function fetch_districtName($district){
        $this->db->select('district_name');
        $this->db->where('district_id',$district);
        $q = $this->db->get('tbl_district');
        // if id is unique, we want to return just one row
        $data = array_shift($q->result_array());

        return $data['district_name'];

    }
    public function fetch_subDistrictName($subDistrict){
        $this->db->select('subDistrict_name');
        $this->db->where('subDistrict_id',$subDistrict);
        $q = $this->db->get('tbl_subDistrict');
        // if id is unique, we want to return just one row
        $data = array_shift($q->result_array());

        return $data['subDistrict_name'];

    }
    public function fetch_uniounName($unioun){
        $this->db->select('unioun_name');
        $this->db->where('union_id',$unioun);
        $q = $this->db->get('tbl_union');
        // if id is unique, we want to return just one row
        $data = array_shift($q->result_array());

        return $data['unioun_name'];

    }

   
    public function fetch_profile($id){
         $this->db->where('id', $id);
        $result = $this->db->get('tbl_registration');
        return $result->row_array();
           
      }
      public function fetch_product(){
      $this->db->order_by("product_name", "ASC");
      $query = $this->db->get("tbl_product");
      return $query->result();
    }
    public function fetch_notice(){
      $this->db->order_by("notice_id", "ASC");
      $query = $this->db->get("tbl_notice");
      return $query->result();
    }
    public function fetch_news(){
      $this->db->order_by("id", "ASC");
      $query = $this->db->get("tbl_news");
      return $query->result();
    }
    public function fetch_comment(){
      $this->db->order_by("id","ASC");
      $query = $this->db->get("tbl_news_comment");
      return $query->result();
    }
    public function fetch_finalOrder(){
      $this->db->order_by("id","ASC")->group_by("product_name");
      $query = $this->db->get("tbl_order");
      return $query->result();
    }
    public function fetch_fSell(){
      $this->db->order_by("id","ASC")->group_by("product_name");
      $query = $this->db->get("tbl_farmerSell");
      return $query->result();
    }


    public function fetch_price($product_id){
       
        $this->db->where('id',$product_id);
      $query = $this->db->get('tbl_product');
      $output='';
      if(!empty($query)){
        
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->sell_price.'">'.$row->sell_price.'</option>';
        }
      }else{
        
        $output = '<option value="">Select State</option>';
      
      }
      
      return $output;

    }

         public function fetch_productName($id){
            $this->db->select('product_name');
            $this->db->where('id',$id);
            $q = $this->db->get('tbl_product')->row();
            // if id is unique, we want to return just one row
            

            return $q->product_name;

            }
    public function farmerbokroy($data){
      
        return $this->db->insert('tbl_farmerSell',$data);
    }

    public function uniounNameById(){
        
                $id=$this->session->userdata('id');
                $this->db->where('id',$id);
                $query = $this->db->get('tbl_registration');

                if ($query->num_rows() > 0) {
                    return $query->row('unioun');
                }

                return false;

    }
    public function fetch_all_product(){
      $this->db->select('*');
      $data =$this->db->get('tbl_product');
      
      return $data->row_array();

    }
    public function fetch_productById($id){
            

            $this->db->where('id', $id);
            $result = $this->db->get('tbl_product');
            return $result->row_array();

            }
    public function insertOrder($data){
      $a=$this->session->userdata('id');
      $this->db->select('id');
      $this->db->from('tbl_order');
      $arr=[
             'user_id' =>$a,
             'product_name' => $data['product_name']

      ];
      $this->db->where($arr);
      $query = $this->db->get();
      $num = $query->num_rows();
      if ($num==0) {
        $array=[
        'user_id' => $a,
        'img' => $data['img'],
        'product_name' => $data['product_name'],
        'product_price' => $data['sell_price'],
        'total_price' => $data['sell_price'],
        'product_quantity' => '1'
      ];
      return $this->db->insert('tbl_order',$array);
      }
      else if($num>0){
            $this->db->select('product_quantity');
            $this->db->or_where('user_id',$a);
            $this->db->or_where('product_name',$data['product_name']);
            $q = $this->db->get('tbl_order');
        // if id is unique, we want to return just one row
            $dat = array_shift($q->result_array());

              $qn=$dat['product_quantity'];


            $array=[
              'product_quantity' => $qn+1
            ];
            $this->db->set($array);
            $ar=[
              'user_id' =>$a,
              'product_name' => $data['product_name']

            ];
            $this->db->where($ar);
            $this->db->update('tbl_order');
      }
      
      
      
    }
    public function insertOrderCount($id){
      $this->db->where('user_id',$id);
      $this->db->from('tbl_order');
      $query = $this->db->get();
      return $num = $query->num_rows();

    }
    public function UserOrder(){
        $user=$this->session->userdata('id');
        $this->db->where('user_id', $user);
        $result = $this->db->get('tbl_order');
        return $result->result();

    }
    public function fetch_subProduct($product_id){
        $this->db->where('product_id',$product_id);
        $result = $this->db->get('tbl_subProduct');
        return $result->result();
        

    }
    public function fetch_allComments($id){
        $this->db->where('news_id',$id);
        $result = $this->db->get('tbl_news_comment');
        return $result->result();
        

    }
    public function fetch_subProductForCart($id){
        $this->db->where('id', $id);
        $result = $this->db->get('tbl_product');
        return $result->row_array();
    }
    public function deleteOrder($id){
      $cond  = ['id' => $id];
    $query = $this->db->where($cond);
    return $this->db->delete('tbl_order');
    }
    public function deleteAllOrder($id){
      $cond  = ['user_id' => $id];
    $query = $this->db->where($cond);
    return $this->db->delete('tbl_order');
    }
    public function insertFinalOrder($data){
      return $this->db->insert('tbl_finalOrder',$data);
    }
    
    public function addComment($data){
        $a=$this->db->insert('tbl_news_comment',$data);
        $last_row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('tbl_news_comment');
        $output='';
      if(!empty($last_row)){
        
        foreach($last_row->result() as $row)
        {
         $output .= '<table class="table alert alert-success"><thead class="thead-dark"><tr><th scope="col">'.$this->session->userdata('name').'</th></tr></thead><tbody><tr><td><a>'.$row->comment.'</a></td></tr></tbody></table>';
        }
      }else{
        
        $output = '<option value="">Select State</option>';
      
      }
      
      return $output;
        
        

    }
    public function latestComment(){
      $last_row=$this->db->select('*')->order_by('id',"desc")->limit(3)->get('tbl_news_comment');
      return $last_row->result();
    }
    public function like_post($data){
      $qry=$this->db->insert('tbl_likes',$data);
      $output='';
      if ($qry) {
        $qry=$this->db->select('*')->from('tbl_likes')->where('post_id',$data['post_id'])->get()->result();
        $output .= '<span class="alert alert-success">'.sizeof($qry).'</span>';
      }
      return $output;

    }
    public function count_post_like($id){
      $qry=$this->db->select('*')->from('tbl_likes')->where('post_id',$id)->get()->result();
      return $qry;
    }
    public function search_Unioun($title){
    $this->db->like('unioun_name', $title , 'both');
    $this->db->order_by('unioun_name', 'ASC');
    $this->db->limit(10);
    return $this->db->get('tbl_union')->result();
  }
  public function chekSearchableUnioun($data){
        $array=array(
           'username'=>$data['searchByUnioun']
           
        );
           
            $result = $this->db->get_where('tbl_admin',$array);
            return $result->row();
        }
  public function uniounSearch($data){

    $array= array('username' => $data['searchByUnioun'] );

        $this->db->where($array);
        $result = $this->db->get('tbl_admin');
        return $result->result();
    }
  public function sendMessage($data){
      return $this->db->insert('tbl_message',$data);
    }
  public function fetch_allMessage(){
      $array= array('sender_id'=>$this->session->userdata('id')
      );
      $this->db->where($array);
      $this->db->group_by("reply_by");
      $query = $this->db->get("tbl_message");
      return $query->result();
    }
    public function specificUserMessage($data){
        $array = array( 'urs'=>'1');
        $arr=array('sender_id' => $data['sender_id'],
                    'reply_by' => $data['reply_b']
            );
        $this->db->where($arr);
        $this->db->update('tbl_message',$array);
        $this->db->select('*');
        $this->db->from('tbl_message');
        $array = array('sender_id' => $data['sender_id'],
                    'reply_by' => $data['reply_b']
        );
        $this->db->where($array);
        $last_row = $this->db->get();
        $output='';
        if ($last_row->num_rows()==0) {
          $output .='<h3 class="card" style="background-color:green;color:white"><center>'.$this->session->userdata('unioun').'</center></h3>';
           $output .= '<input type="hidden" id="reply_by" name="sender_id" value="'.$this->session->userdata('unioun').'"></input>';
        }
        if(!empty($last_row)){
        $hcount=0;
        foreach ($last_row->result() as $row) {
          if (!empty($row->reply_by)) {
            if ($row->reply_by==$data['reply_b']) {
             if ($hcount==0) {
           $output .='<h3 class="card" style="background-color:green;color:white"><center>'.$row->reply_by.'</center></h3>';
           $output .= '<input type="hidden" id="reply_by" name="sender_id" value="'.$row->reply_by.'"></input>';
           $hcount++;
          }
            }
            
          }
        }
        foreach($last_row->result() as $row)
        {
          
          
         
          if ($row->conType=='1') {
           $output .='<p class="text-left card-body"><span class="card">'.$row->message.'</span></p>';
         }
         else{
          
          $output .='<p class="text-right card-body"><span class="card" style="background-color:#007bff;color:white;font-weight:bold">'.$row->message.'</span></p>';
         }
          
        }
        
      }
      else {
        echo $last_row->num_rows();
        exit();
        $output .='<h3 class="card" style="background-color:green;color:white"><center>'.$this->session->userdata('id').'</center></h3>';
           $output .= '<input type="hidden" id="reply_by" name="sender_id" value="'.$this->session->userdata('id').'"></input>';
      }

 
     
      return $output;
     
    }
    public function replyUserMessage($data){

        //update Portion
      $this->db->insert('tbl_message',$data);
        $this->db->where('sender_id',$data['sender_id']);
        $this->db->select('*');
      $this->db->from('tbl_message');
      $array = array('sender_id' => $data['sender_id'],
                    'reply_by' => $data['reply_by']
       );
      $this->db->where($array);
      $last_row = $this->db->get();
        $output='';

      if(!empty($last_row)){
        $hcount=0;
        foreach ($last_row->result() as $row) {
          if (!empty($row->reply_by)) {
            if ($row->reply_by==$data['reply_by']) {
             if ($hcount==0) {
           $output .='<h3 class="card" style="background-color:green;color:white"><center>'.$row->reply_by.'</center></h3>';
           $output .= '<input type="hidden" id="reply_by" name="sender_id" value="'.$row->reply_by.'"></input>';
           $hcount++;
          }
            }
            
          }
        }
        foreach($last_row->result() as $row)
        {
          
          
         
          if ($row->conType=='1') {
           $output .='<p class="text-left card-body"><span class="card">'.$row->message.'</span></p>';
         }
         else{
          
          $output .='<p class="text-right card-body"><span class="card" style="background-color:#007bff;color:white;font-weight:bold">'.$row->message.'</span></p>';
         }
          
        }
        
      }else{
        
        $output = '<option value="">Select State</option>';
      
      }
      return $output;
    }
    public function chkUnreadMessage(){
      $array = array('urs' => '0',
        'sender_id'=>$this->session->userdata('id')
                       );
      return $this->db->get_where('tbl_message',$array)->result_array();
    }
    public function showGraphById($id){
      $this->db->select('*');
      $this->db->from('tbl_graph');
      $array = array('product_id' => $id
       );
      $this->db->where($array);
      $last_row = $this->db->get();
      return $last_row;
    }
        public function countUserNotification(){
      $array = array('request' => '1',
        'status' =>'0',
        'user_id'=>$this->session->userdata('id')
                       );
      return $this->db->get_where('tbl_farmerSell',$array)->result_array();
    }
      public function fetch_AllNotification(){
      $array= array('user_id'=>$this->session->userdata('id'),
        'request' => '1',
        'status' =>'0'
      );
      $this->db->where($array);
      $query = $this->db->get("tbl_farmerSell");
      return $query->result();
    }
     public function addProductRequest($data){
      return $this->db->insert('tbl_product_request',$data);
    }
    public function chekStockByProductId($name){
        $array=array(
           'product_name'=>$name
        );
           
            $result = $this->db->get_where('tbl_product',$array);
            return $result->row();
        }
    public function checkStockForBajer($id){
      $array=array(
           'id'=>$id
        );
           
            $result = $this->db->get_where('tbl_product',$array);
            return $result->row();

    }
    public function checkPNExistence($data){
      $array = array('product_name' => $data['product_name']
      );
      return $this->db->get_where('tbl_admin_graph',$array)->result_array();
    }
    public function addToAdminGraph($data){
        return $this->db->insert('tbl_admin_graph',$data);
    }
    public function fetchSellPriceOfAdminGraph($data){

        $array=array(
           'product_name' => $data['product_name']
         );
           
            $result = $this->db->get_where('tbl_admin_graph',$array);
            return $result->row();
        }
        public function fetchBuyPriceOfAdminGraph($data){
      
        $array=array(
           'product_name' => $data
         );
           
            $result = $this->db->get_where('tbl_admin_graph',$array);
            return $result->row();
        }
    public function UpdateSellPriceOfAdminGraph($data,$count){
         $this->db->where('product_name',$data['product_name']);
         $array=array('sell_count' => $count );
         return $this->db->update('tbl_admin_graph',$array);
      }
      public function UpdateBuyPriceOfAdminGraph($data,$count){
         $this->db->where('product_name',$data['product_name']);
         $array=array('buy_count' => $count );
         return $this->db->update('tbl_admin_graph',$array);
      }
    public function addComplain($data){
        return $this->db->insert('tbl_complain',$data);
    }
    public function fetch_productTopEight(){
      $this->db->limit(8);
      $this->db->order_by("product_name", "ASC");
      $query = $this->db->get("tbl_product");
      return $query->result();
    }
    public function fetch_newsTopEight(){
      $this->db->limit(3);
      $this->db->order_by("id", "ASC");
      $query = $this->db->get("tbl_news");
      return $query->result();
    }
 
     }



 ?>