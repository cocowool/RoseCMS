<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spider extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function rkpass($save = ''){
		$this->load->helper('date');
		set_time_limit(0);

		$cache = array();
		$stats = array();

		$start_url = "http://www.rkpass.cn/tk_timu/3_509_6_xuanze.html";

		$cache[md5($start_url)] = $start_url;
		$this->load->library('Curl');

		while($start_url != ''){
			$html_data = $this->curl->simple_get($start_url);

			//提取下一题地址
			preg_match_all('/pass_next_tihao_url=(.*)"/sU', $html_data, $next_url);
			if(!empty($next_url[1][0])){
				$next_url = "http://www.rkpass.cn/tk_timu/" . $next_url[1][0];
				$start_url = $next_url;
			}else{
				$next_url = '';
				$start_url = '';
			}

			//提取题号
			preg_match_all('/<td width="80%" height="32" align="left"  style=""  ><span class="shisi_text_hui">第(\d+)题/iu', $html_data, $question_no);
			$data['q_tihao'] = $question_no[1][0];

			//提取试卷
			$data['q_paper'] = '2017年上半年 系统分析师 上午试卷 综合知识';
			$data['q_type'] = '选择题';
			$data['q_status'] = 'open';
			$data['q_author'] = 1;

			//提取题目信息
			preg_match_all('/\<td  height=""   width="100%" align="left" \>(.*)\<\/td\>/sU', $html_data, $title);
			$title = $title[1][0];

			$data['q_title'] = trim(strip_tags($title));

			//提取选项
			preg_match_all('/>A.&nbsp;\s+(.*)<\/span>/sU', $html_data, $option_a);
			$data['q_option_1'] = $option_a[1][0]; 

			preg_match_all('/>B.&nbsp;\s+(.*)<\/span>/sU', $html_data, $option_a);
			$data['q_option_2'] = $option_a[1][0]; 

			preg_match_all('/>C.&nbsp;\s+(.*)<\/span>/sU', $html_data, $option_a);
			$data['q_option_3'] = $option_a[1][0]; 

			preg_match_all('/>D.&nbsp;\s+(.*)<\/span>/sU', $html_data, $option_a);
			$data['q_option_4'] = $option_a[1][0]; 

			$this->load->model('Question_Model', 'q');
			$data['q_insert_time'] = 	unix_to_human( local_to_gmt(), TRUE, 'eu');

			$result = $this->q->insert($data);
			if($result){
				echo("<br />Rkpass Insert Success! No . " . $result );
			}else{
				echo("Failed");
			}			
		}

	}
}