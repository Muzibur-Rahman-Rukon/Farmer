<?php


class Home extends CI_Controller {

	
	public function index()
	{
        $data['product'] = $this->modUser->fetch_productTopEight();
        $data['news'] = $this->modUser->fetch_newsTopEight();
		$this->load->view('frontEnd/header');
		$this->load->view('frontEnd/navbar');
		$this->load->view('frontEnd/index',$data);
		$this->load->view('frontEnd/footer');
		
	}
	public function login(){
		
		$this->load->view('frontEnd/header');
		$this->load->view('frontEnd/navbar');
		$this->load->view('frontEnd/login');
		$this->load->view('frontEnd/footer');

	}
	public function bazer(){
		$finalOrder['fOrder'] = $this->modUser->fetch_finalOrder();
		$farmerSell['fSell'] = $this->modUser->fetch_fSell();
		$this->load->view('frontEnd/header');
		$this->load->view('frontEnd/navbar',$finalOrder);
		$this->load->view('frontEnd/bazer',$farmerSell);
		$this->load->view('frontEnd/footer');
	}
	public function khobor(){
		$comment['comment'] = $this->modUser->fetch_comment();
		$data['notice'] = $this->modUser->fetch_notice();
		$News['allNews'] = $this->modUser->fetch_news();
		
		$this->load->view('frontEnd/header',$comment);
		$this->load->view('frontEnd/navbar',$News);
		$this->load->view('frontEnd/khobor',$data);
		$this->load->view('frontEnd/footer');
	}
	public function priceList(){
		$data['product'] = $this->modUser->fetch_product();
		$this->load->view('frontEnd/header');
		$this->load->view('frontEnd/navbar');
		$this->load->view('frontEnd/priceList',$data);
		$this->load->view('frontEnd/footer');

	}
	public function gaidline(){
		$this->load->view('frontEnd/header');
		$this->load->view('frontEnd/navbar');
		$this->load->view('frontEnd/gaidline');
		$this->load->view('frontEnd/footer');
	}
	public function rgisterpage(){
	$data['division'] = $this->modUser->fetch_division();
	$this->load->view('frontEnd/header');
	$this->load->view('frontEnd/navbar');
	$this->load->view('frontEnd/registration',$data);	
	$this->load->view('frontEnd/footer');
	}
	public function registration()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		/*$this->form_validation->set_rules('name','Name','required|alpha',
        array('alpha' => 'আপনার সঠিক নামে প্রবেশ করুন'));*/
        $path=realpath('assets/img/');
                    $config['upload_path']=$path;
                    $config['allowed_types']='gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if (!$this->upload->do_upload('pic')) {
                        echo "ok";
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['pic']=$fileName['file_name'];
                        $data['date']=date('Y-M-d h:i:sa');
                       
                    }
		
		$this->form_validation->set_rules('nidnumber','nidnumber','required|exact_length[13]',array('exact_length' => '১৩ ডিজিটের জাতীয় পরিচয় পএের নম্বর নিশ্চিত করুণ।'));
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			
            $data['division'] = $this->modUser->fetch_division();
			$this->load->view('frontEnd/header');
			$this->load->view('frontEnd/navbar');
			$this->load->view('frontEnd/registration',$data);	
			$this->load->view('frontEnd/footer');
		}
        else{
			$data['division']=$this->input->post('division',true);
			if ($this->input->post('division')) 
				{
 $query=$this->modUser->fetch_divisionName($this->input->post('division'));
 $data['division']=$query;
 
		  }
		  $data['district']=$this->input->post('district',true);
			if ($this->input->post('district')) 
				{
 $query=$this->modUser->fetch_districtName($this->input->post('district'));
 $data['district']=$query;
 
		  }
		  $data['upozila']=$this->input->post('upozila',true);
			if ($this->input->post('upozila')) 
				{
 $query=$this->modUser->fetch_subDistrictName($this->input->post('upozila'));
 $data['upozila']=$query;
 
		  }
		  $data['unioun']=$this->input->post('unioun',true);
			if ($this->input->post('unioun')) 
				{
 $query=$this->modUser->fetch_uniounName($this->input->post('unioun'));
 $data['unioun']=$query;
 
		  }
			
		$data['name']=$this->input->post('name',true);
		$data['nidnumber']=$this->input->post('nidnumber',true);
		$data['mobaile']=$this->input->post('mobaile',true);
		$date['pic']=$this->input->post('pic',true);
		$data['password']=$this->input->post('password',true);
		if (!empty($data['name'])  && !empty($data['district']) &&!empty($data['upozila']) && !empty($data['unioun']) && !empty($data['nidnumber']) &&!empty($data['password']) ) {
			$chkRegister=$this->modUser->chkRegister($data);
			if ($chkRegister==0) {
				$addFarmer=$this->modUser->addFarmer($data);
				if ($addFarmer) {
					$this->session->set_flashdata('class','alert-success');
					$this->session->set_flashdata('message','অভিনন্দন আপনি সফল ভাবে নিবন্ধিত হয়েছেন');
					redirect('Home/rgisterpage');
                    
				}
				else{
					$this->session->set_flashdata('class','alert-danger');
					$this->session->set_flashdata('message','সরি,আপনাকে নিবন্ধন করা যাচ্ছে না');
					redirect('Home/rgisterpage');
				}
			}
			else{
					$this->session->set_flashdata('class','alert-danger');
					$this->session->set_flashdata('message','সরি,আপনাকে নিবন্ধন করা যাচ্ছে না');
					redirect('Home/rgisterpage');
				}
		}
	}
	
	}
	public function permitlogin(){
		$data['mobaile']=$this->input->post('nidnumber',true);
        $data['password']=$this->input->post('password',true);
        if(!empty($data['mobaile']) && !empty($data['password'])){
               $permitlogin=$this->modUser->permitlogin($data);
               if (count($permitlogin)==1) {
                 
                     $forSession=array(
                        'id'=> $permitlogin[0]['id'],
                        'nidnumber'=> $permitlogin[0]['nidnumber'],
                        'name'=> $permitlogin[0]['name'],
                        'unioun'=> $permitlogin[0]['unioun'],
                         'logged_in' => TRUE
                        
                );
                    $this->session->set_userdata($forSession);
                    if ($this->session->userdata('id')) {
                    	
                        redirect('home');
                    }
                    else{
                        echo "Session not Created";
                    }
                    
                }
                else{
                	$this->session->set_flashdata('class','alert-danger');
					$this->session->set_flashdata('message','দয়া করে, মোবাইল নাম্বার অথবা পাসওয়ার্ড চেক করুন');
					redirect('home/login');

                }
	}
}
      public function logout(){
            
            if ($this->session->userdata('id')) {
                $this->session->unset_userdata('id','');
                $this->session->unset_userdata('unioun','');
                redirect('home');
                /*$this->session->set_flashdata('error','You have successfully loged out');
                redirect('home/login');*/
            }
            else{
            $this->session->set_flashdata('error','Please log in');
               

            }
        }
        public function profile(){
        	$id=$this->session->userdata('id');
        	$datam = $this->modUser->fetch_profile($id);
        	$data['name']=$datam['name'];
        	$data['division']=$datam['division'];
        	$data['district']=$datam['district'];
        	$data['upozila']=$datam['upozila'];
        	$data['unioun']=$datam['unioun'];
        	$data['mobaile']=$datam['mobaile'];
        	$data['pic']=$datam['pic'];
        	if ($this->session->userdata('id')) {
		        $this->load->view('frontEnd/header');
				$this->load->view('frontEnd/navbar');
				$this->load->view('frontEnd/profile',$data);
				$this->load->view('frontEnd/footer');
        	}

        }
        public function bkroy(){
        	$data['product'] = $this->modUser->fetch_product();

             	$this->load->view('frontEnd/header');
				$this->load->view('frontEnd/navbar');
				$this->load->view('frontEnd/bkroy',$data);
				$this->load->view('frontEnd/footer');



        }
        public function fetch_district(){
        	if($this->input->post('division_id'))
		  {
		   echo $this->modUser->fetch_district($this->input->post('division_id'));
		  }
        }
        public function fetch_subDistrict(){
        	if($this->input->post('district_id'));
		  {
		   echo $this->modUser->fetch_subDistrict($this->input->post('district_id'));
		  }
        }
        public function fetch_unioun(){
        	if($this->input->post('subDistrict_id'));
		  {
		   echo $this->modUser->fetch_unioun($this->input->post('subDistrict_id'));
		  }

        }
        public function fetch_price(){
        	if($this->input->post('product_id'))
		  {
		   echo $this->modUser->fetch_price($this->input->post('product_id'));
		  }
        }
        public function showbikroy(){
        	
        	$dat['product_name']=$this->modUser->fetch_productName($this->input->post('product_name'));
        	$dat['product_price']=$this->input->post('product_price');
        	$dat['quantity']=$this->input->post('quantity');
        	$dat['price']=$dat['product_price']*$dat['quantity'];
        	$this->session->set_flashdata('dat',$dat['price']);
        	$this->session->set_flashdata('pn',$dat['product_name']);
        	$this->session->set_flashdata('qn',$dat['quantity']);
        	$this->session->set_flashdata('unitPrice',$dat['product_price']);
        	redirect('home/bikroy');
        }
        public function showSuccessbikroy($product_id){
        	$this->load->helper(array('form', 'url'));
		    $this->load->library('form_validation');
        	$data['user_id']=$this->session->userdata('id');
        	$data['product_name']=$this->input->post('name');
        	$data['unit_price']=$this->input->post('price');
        	$data['quantity']=$this->input->post('qty');
        	$data['total_price']=$this->input->post('item_total');
            $data['request']='0';
            $existence=$this->modUser->checkPNExistence($data);
        
            if (count($existence)==0) {
            $dat['product_name']=$data['product_name'];
            $dat['buy_count']=1;
$addToAdminGraph=$this->modUser->addToAdminGraph($dat);
            }
            else{
$sellCountOfAdminGraph=$this->modUser->fetchBuyPriceOfAdminGraph($data['product_name']);
$inc=$sellCountOfAdminGraph->buy_count+1;
$update=$this->modUser->UpdateBuyPriceOfAdminGraph($data,$inc);
            }
        	
        	$data=$this->modUser->farmerbokroy($data);
        	if ($data) {
        $this->cart->destroy();
        $this->session->set_flashdata('message','কিছুক্ষণের মধ্যে আপনার বিক্রয় অনুরোধের ব্যাপারে জানানো হবে দয়া করে নোটিফিকেশন বার চেক করুন');
        $this->session->set_flashdata('class','btn btn-success');

		$dat['product'] = $this->modUser->fetch_product();
        $this->load->view('frontEnd/header');
        $this->load->view('frontEnd/navbar');
        $this->load->view('frontEnd/bajer',$dat);
        $this->load->view('frontEnd/footer');
        	}

        	
        	

        }
        public function buy(){
        	$data['product'] = $this->modUser->fetch_product();
        	    $this->load->view('frontEnd/header');
				$this->load->view('frontEnd/navbar');
				$this->load->view('frontEnd/buy',$data);
				$this->load->view('frontEnd/footer');

        }
        public function CartById($cid){

        	if ($this->session->userdata('id')) {
        		$data=$this->modUser->fetch_productById($cid);
        		$set=$this->modUser->insertOrder($data);
        		redirect('home/bajer');
        	}

        }
        public function cart(){
        	$data['cart']=$this->modUser->UserOrder();
        	$this->load->view('frontEnd/header');
			$this->load->view('frontEnd/navbar');
			$this->load->view('frontEnd/Cart',$data);
			$this->load->view('frontEnd/footer');
        }
        public function fetch_subProduct($id){
        	

		$data['subProduct']= $this->modUser->fetch_subProduct($id);

		
		    $this->load->view('frontEnd/header');
			$this->load->view('frontEnd/navbar');
			$this->load->view('frontEnd/subProduct',$data);
			$this->load->view('frontEnd/footer');
		 

        }
        public function farmerSellCart($id){
        	
            $allproduct=$this->modUser->fetch_subProductForCart($id);
            $product['product_name']=$allproduct['product_name'];
           

            
                   
       $data = array(
			'id' => $allproduct['id'], 
			'name' => ' ', 
			'price' => $allproduct['buy_price'], 
			'qty' => 1, 
		);
         $this->cart->insert($data);
         /*$this->cart->destroy();*/
            
            echo $this->cart->total_items();
           
           
            $this->load->view('frontEnd/header');
			$this->load->view('frontEnd/navbar');
			$this->load->view('frontEnd/farmerSellCart',$allproduct);
			$this->load->view('frontEnd/footer');


        }
        public function destroyCart($product_id){
        $this->cart->destroy();
        $data['product'] = $this->modUser->fetch_product();
        $this->load->view('frontEnd/header');
        $this->load->view('frontEnd/navbar');
        $this->load->view('frontEnd/bajer',$data);
        $this->load->view('frontEnd/footer');
        	
        }
        public function deleteOrder($id){
        	$delete=$this->modUser->deleteOrder($id);
        	if ($delete) {
        		redirect('home/cart');
        	}

        }
        public function deleteAllOrder($id){
           $delete=$this->modUser->deleteAllOrder($id);
           if ($delete) {
        		redirect('home/bajer');
        	}
        }
        public function farmerFinalOrder(){

        	$data['user_id']=$this->session->userdata('id');
        	$data['product_name']=$this->input->post('name',true);
        	$data['product_price']=$this->input->post('price',true);
        	$data['product_quantity']=$this->input->post('qty',true);
        $data['total_price']=$this->input->post('item_total',true);
$d=$this->modUser->chekStockByProductId($data['product_name']);
    if ($d->sell_amount>=$data['product_quantity']) {
        $existence=$this->modUser->checkPNExistence($data);

        
            if (count($existence)==0) {

            $dat['product_name']=$data['product_name'];
            $dat['sell_count']=1;
$addToAdminGraph=$this->modUser->addToAdminGraph($dat);
            }
            else{

                $dat['product_name']=$data['product_name'];
$sellCountOfAdminGraph=$this->modUser->fetchSellPriceOfAdminGraph($data);
$inc=$sellCountOfAdminGraph->sell_count+1;
$update=$this->modUser->UpdateSellPriceOfAdminGraph($data,$inc);
            }
        if ($data) {
                $set=$this->modUser->insertFinalOrder($data);
                $delete=$this->modUser->deleteAllOrder($this->session->userdata('id'));
                $un=$this->modUser->uniounNameById();
                $this->session->set_flashdata('message','অভিন্দন আপনার ক্রয় অনুরোধ গ্রহণ করা হয়েছে।');
            echo $this->session->set_flashdata('class','btn btn-success');
                echo $this->session->set_flashdata('un',$un);
                $this->session->set_flashdata('taka',$data['total_price']);

                redirect('home/bajer');
            }

            }
        
    
    else{
        $this->session->set_flashdata('class','alert-danger');
        $this->session->set_flashdata('message','আপনি যে পরিমাণ পণ্য ক্রয় করতে চাচ্ছেন এই পরিমাণ পণ্য সরকারের কাছে মজুদ নেই ');
        redirect('home/cart');

    }
        }
        public function commentSubmit()
    {
        if ($this->input->post('msg')) {
          $data['news_id']=$this->input->post('post_id');
          $data['comment']=$this->input->post('msg');
          $data['user_id']=$this->session->userdata('id');
          $data['user_name']=$this->session->userdata('name');
          echo $this->modUser->addComment($data);
        }

    }
    public function like_post(){
        
        $post_id=$this->input->post('post_id');
        $user_id=$this->session->userdata('id');
        $date=date('Y-m-d h:ia');
        $data=array(
            'post_id'=>$post_id,
            'user_id' =>$user_id,
            'date' => $date
        );
       echo $this->modUser->like_post($data); 
    }
    public function communication(){
        $this->load->view('frontEnd/header');
        $this->load->view('frontEnd/navbar');
        $this->load->view('frontEnd/communication');
        $this->load->view('frontEnd/footer');
    }
    public function get_autocomplete(){
    if (isset($_GET['term'])) {
        $result = $this->modUser->search_Unioun($_GET['term']);
        if (count($result) > 0) {
        foreach ($result as $row)
          $arr_result[] = array(
          'label'     => $row->unioun_name,
         
        );
          echo json_encode($arr_result);
        }
    }
  }
  public function uniounSearch(){
    $data['searchByUnioun']=$this->input->post('searchByUnioun',true);
    $d=$this->modUser->chekSearchableUnioun($data);
    if ($d->state >'0') {
        $district=$d->district_name;
        $subDistrict_name=$d->subDistrict_name;
        $unioun=$d->unioun_name;
        $this->session->set_flashdata('district',$district);
    $this->session->set_flashdata('subDistrict_name',$subDistrict_name);
        $this->session->set_flashdata('unioun',$unioun);
        $this->session->set_flashdata('class','alert-success');
        redirect('home/communication');
    }
    elseif ($d->state=='0') {
        $district=$d->district_name;
        $subDistrict_name=$d->subDistrict_name;
        $unioun=$d->unioun_name;
        $this->session->set_flashdata('distric',$district);
        $this->session->set_flashdata('subDistrict_nam',$subDistrict_name);
        $this->session->set_flashdata('uniou',$unioun);
        $this->session->set_flashdata('class','alert-success');
        redirect('home/communication');
    }
    else{
        $this->session->set_flashdata('class','alert-danger');
        $this->session->set_flashdata('mes','আপনার অনুসন্ধানকৃত জায়গায় আমাদের সার্ভিসটি এখনো চালু হয়নি');
        redirect('home/communication');
    }

  }
  public function sendMessage(){
    $data['product_name']=$this->input->post('product_name',true);
    $data['description']=$this->input->post('description',true);
    $data['user_id']=$this->input->post('user_id',true);
    

                    if (!empty($data['product_name'])) {
                    $path=realpath('assets/img/');
                    $config['upload_path']=$path;
                    $config['allowed_types']='gif|png|jpg|jpeg';
                    $this->load->library('upload',$config);
                    if (!$this->upload->do_upload('img')) {
                        $error=$this->upload->display_errors();
                        
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Image not found');
                    redirect('home/communication');
                    }
                    else{
                        $fileName=$this->upload->data();
                        $data['img']=$fileName['file_name'];
                        

                    }

                          
            $addData=$this->modAdmin->checkProductExistence($data);
    $addData1=$this->modAdmin->checkProductRequestExistence($data);

                    if ($addData->num_rows()>0) {
                $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','এই পণ্য ইতিমধ্যে বিদ্যমান');
                    redirect('home/communication');
                       
                    }
                    if ($addData1->num_rows()>0) {
                $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','এই অনুরোধটি ইতিমধ্যে বিদ্যমান');
                    redirect('home/communication');
                       
                    }
                    else{
            $addData=$this->modUser->addProductRequest($data);
                    if ($addData) {
                       
                        $this->session->set_flashdata('class','alert-success');
                   $this->session->set_flashdata('message','পণ্য অনুরোধ সফলভাবে যুক্ত করা হয়েছে');
                    redirect('home/communication');
                    }
                    else{
                       
                         $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Product not Added');
                    redirect('home/communication');
                    }
                    }
                    
                }
                else{
                   $this->session->set_flashdata('class','alert-danger');
                   $this->session->set_flashdata('message','Give Product Name');
                    redirect('home/communication'); 
                }
    
  }
  public function farmerMessenger(){
    $data['allMessage'] = $this->modUser->fetch_allMessage();
    $this->load->view('frontEnd/header');
    $this->load->view('frontEnd/navbar');
    $this->load->view('frontEnd/farmerMessenger',$data);
    $this->load->view('frontEnd/footer');
  }
  public function specificUserMessage(){
        $data['sender_id']=$this->input->post('msg');
        $data['reply_b']=$this->input->post('reply_by');
        echo $this->modUser->specificUserMessage($data);
}
  public function replyUserMessage(){
        $data['reply_by']=$this->input->post('reply_by');
        $data['reply_to']=$this->input->post('sender_id');
        $data['sender_id']=$this->input->post('sender_id');
        $data['message']=$this->input->post('message');
        echo $this->modUser->replyUserMessage($data);
  }
  public function bajer(){
        $data['product'] = $this->modUser->fetch_product();
        $this->load->view('frontEnd/header');
        $this->load->view('frontEnd/navbar');
        $this->load->view('frontEnd/bajer',$data);
        $this->load->view('frontEnd/footer');
    
  }
  public function details($id){
        $data['product'] = $this->modUser->fetch_productById($id);
        $this->load->view('frontEnd/header');
        $this->load->view('frontEnd/navbar');
        $this->load->view('frontEnd/details',$data);
        $this->load->view('frontEnd/footer');
  }
  public function allNotification(){
    $data['allNotification'] = $this->modUser->fetch_AllNotification();
    $this->load->view('frontEnd/header');
    $this->load->view('frontEnd/navbar');
    $this->load->view('frontEnd/farmerNotification',$data);
    $this->load->view('frontEnd/footer');
  }
  public function sendComplain(){
    $data['farmer_id']=$this->input->post('user_id',true);
    $data['body']=$this->input->post('body',true);
    $addComplain=$this->modUser->addComplain($data);
    if ($addComplain) {
    $this->session->set_flashdata('class','alert-success');
    $this->session->set_flashdata('message','ধন্যবাদ আপনার অভিযোগটি গ্রহণ করা হয়েছে');
    redirect('Home/communication');
                    
                }
    
  }
   
}
