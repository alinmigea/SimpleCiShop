<?php
class News_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function getAllNews()
	{
		// returns an associative array with all news


		$this->db->select('*');
		$this->db->from('news');
		$this->db->order_by("published", "desc");

		$query = $this->db->get();
		return $query->result_array();

	}

	function getNews($newsID)
	{
		// returns an associative array with a news (one)


		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('news.newsID', $newsID);

		$query = $this->db->get();
		return $query->row_array();

	}

	function getNewsText($newsID)
	{
		$this->db->select('*');
		$this->db->from('news_text');
		$this->db->where('news_text.newsID', $newsID);

		$query = $this->db->get();
		$text = array();
		foreach ($query->result_array() as $row) {
			$text['news_textID_'.$row['language']] = $row['news_textID'];
			$text['title_'.$row['language']] = $row['title'];
			$text['description_'.$row['language']] = $row['description'];
		}
		return $text;
	}

	function addNews()
	{

		// insert to news
		$arr = array('published' => time());

		$this->db->insert('news', $arr);
		$newsID = $this->db->insert_id();

		// insert to news_text
		$this->addNewsText($newsID);

	}

	function setNews()
	{

		$newsID = $this->input->post('newsID');

		// update to news

		// update to news_text
		$this->setNewsText($newsID);
	}

	function deleteNews($newsID)
	{
		$this->db->delete('news', array('newsID' => $newsID));
		$this->db->delete('news_text', array('newsID' => $newsID));
	}


	function addNewsText($newsID)
	{
		$text_greek = array('newsID' => $newsID, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 'description' => $this->input->post('description_greek'));
		$text_german = array('newsID' => $newsID, 'language' => 'german', 'title' => $this->input->post('title_german'), 'description' => $this->input->post('description_german'));
		$text_english = array('newsID' => $newsID, 'language' => 'english', 'title' => $this->input->post('title_english'), 'description' => $this->input->post('description_english'));

		$this->db->insert('news_text', $text_greek);
		$this->db->insert('news_text', $text_german);
		$this->db->insert('news_text', $text_english);
	}

	function setNewsText($newsID)
	{
		$text_greek = array('newsID' => $newsID, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 'description' => $this->input->post('description_greek'));
		$text_german = array('newsID' => $newsID, 'language' => 'german', 'title' => $this->input->post('title_german'), 'description' => $this->input->post('description_german'));
		$text_english = array('newsID' => $newsID, 'language' => 'english', 'title' => $this->input->post('title_english'), 'description' => $this->input->post('description_english'));

		$this->db->where('news_textID', $this->input->post('news_textID_greek'));
		$this->db->update('news_text', $text_greek);
		$this->db->where('news_textID', $this->input->post('news_textID_german'));
		$this->db->update('news_text', $text_german);
		$this->db->where('news_textID', $this->input->post('news_textID_english'));
		$this->db->update('news_text', $text_english);
	}
}
