<?php

class News extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->list_news();
	}

	function list_news()
	{
		// gets all products from database
		$data['title'] = "Διαχείριση Συστήματος Ακινήτων";
		$data['heading'] = "Λίστα Νέων";

		$news = $this->news_model->get_all_news();
		foreach($news as $new => $value) {
			$news[$new] = array_merge($news[$new], $this->news_model->get_news_text($news[$new]['news_id']));
		}
		$data['contents'] = $this->load->view('news/list_tpl', array('news' => $news), TRUE);
		$this->load->view('container_tpl',$data);
	}

	function view_news()
	{
		// displays a product form
		$form_data['news_id'] = "";
		$form_data['published'] = "";
		$form_data['action'] = $this->uri->segment(3, "add_news");
		if ($form_data['action'] === "edit_news")
		{
			$form_data['news_id'] = $this->uri->segment(4);
			$form_data = array_merge($form_data, $this->news_model->get_news($form_data['news_id']));
			$form_data = array_merge($form_data, $this->news_model->get_news_text($form_data['news_id']));
		}

		$data['contents'] = $this->load->view('news/news_tpl', $form_data, TRUE);

		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Προσθήκη/Προβολή Νέου";

		$this->load->view('container_tpl',$data);
	}

	function add_news()
	{
		// adds a product

        	$this->news_model->add_news();
		redirect('news');
	}

	function edit_news()
	{
		// updates a product

        	$this->news_model->set_news();
		redirect('news');
	}

	function delete_news()
	{
		// deletes a product

        	$this->news_model->delete_news($this->uri->segment(3));
		redirect('news');
	}
}
