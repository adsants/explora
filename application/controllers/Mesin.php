<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesin extends CI_Controller {
		
	public function __construct() {
		parent::__construct();
		
		$this->load->model('mesin_model');
	} 

	public function index(){		
	
		//$this->load->library("count_page_pdf");
		//echo $this->count_page_pdf->getNumPagesPdf('PANDUAN-BELAJAR-MS-EXCEL.pdf');
	
	
		$like 		= null;
		$order_by 	= 'nama_mesin, id_mesin'; 
		$urlSearch 	= null;
		
		if($this->input->get('field')){
			$like = array($_GET['field'] => $_GET['keyword']);
			$urlSearch = "?field=".$_GET['field']."&keyword=".$_GET['keyword'];
		}		
		
		$this->load->library('pagination');	
		
		$config['base_url'] 	= base_url().'mesin/index'.$urlSearch;
		$this->jumlahData 		= $this->mesin_model->getCount("",$like);		
		$config['total_rows'] 	= $this->jumlahData;		
		$config['per_page'] 	= 10;		
		
		$this->pagination->initialize($config);	
		$this->showData = $this->mesin_model->showData("",$like,$order_by,$config['per_page'],$this->input->get('per_page'));
		$this->pagination->initialize($config);
		
		$this->template_view->load_view('mesin/mesin_view');
	}
	public function add(){
		$this->template_view->load_view('mesin/mesin_add_view');
	}
	public function add_data(){
		$this->form_validation->set_rules('NAMA_MESIN', '', 'trim|required');		
		
		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan yang diwajibkan untuk diisi.', 'message' => validation_errors());
		}
		else{		

			$maxIDCustomer = $this->mesin_model->getPrimaryKeyMax();
			$newId = $maxIDCustomer->MAX + 1;			
			
			$data = array(					
				'ID_MESIN' => $newId	,						
				'NAMA_MESIN' => $this->input->post('NAMA_MESIN')	,			
				'KET_MESIN' => $this->input->post('KET_MESIN')				
			);
			$query = $this->mesin_model->insert($data);							
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}
		
		echo(json_encode($status));
	}
	public function edit($IdPrimaryKey){
		$where = array('id_mesin' => $IdPrimaryKey);
		$this->oldData = $this->mesin_model->getData($where);		
		$this->template_view->load_view('mesin/mesin_edit_view');
	}
	public function edit_data(){	
		$this->form_validation->set_rules('ID_MESIN', '', 'trim|required');		
		$this->form_validation->set_rules('KET_MESIN', '', 'trim|required');		
		
		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan yang diwajibkan untuk diisi.', 'message' => validation_errors());
		}
		else{								
			$data = array(					
				'NAMA_MESIN' => $this->input->post('NAMA_MESIN')	,			
				'KET_MESIN' => $this->input->post('KET_MESIN')					
			);
			
			$where = array('id_mesin' => $this->input->post('ID_MESIN'));
			$query = $this->mesin_model->update($where,$data);							
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}
		
		echo(json_encode($status));
	}
	public function delete($IdPrimaryKey){
		$where = array('id_mesin' => $IdPrimaryKey);
		$delete = $this->mesin_model->delete($where);		
		redirect(base_url()."".$this->uri->segment(1));
	}
	public function search_customer(){
		$like = array('nama_mesin' => $this->input->get('term'));
		$datacustomer = $this->mesin_model->showData("",$like,"nama_mesin");  
		echo '[';		
		$i=1;
		foreach($datacustomer as $data){			
			
			if($i > 1){echo ",";}
			echo '{ "label":"'.$data->NAMA_customer.'","id_mesin":"'.$data->ID_customer.'"} ';
			$i++;
		}
		echo ']';
	}
	
}
