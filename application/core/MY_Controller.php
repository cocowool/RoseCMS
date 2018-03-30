<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  公共Controller
 *
 */
class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();

		if( $this->uri->segment(2) != 'login' and  $this->uri->segment(1) == 'manage'){
			$this->backendAuthCheck();
		}
	}

	public function _remap( $method, $params = array() ){
		if( method_exists($this, $method) ){
			return call_user_func_array(array($this,$method), $params);
		}else{
			$merge_params = array($method);
			foreach ($params as $key => $value) {
				array_push($merge_params, $value);
			}
			return call_user_func_array(array($this,'index'), $merge_params);
		}
	}

	public function backendAuthCheck(){
		if( !$this->session->userdata('rs_user_login') ){
			redirect('/manage/login');
		}

		return TRUE;
	}

	/**
	 * 根据用户的数据模型生成对应的表单
	 *
	 * @param string $model
	 * @param string $action
	 * @param array $extra
	 * 	array('data'=>array('key'=>'value'));
	 * @return string
	 */
	public function generate_add_form($model, $action, $extra = ''){
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->load->config('sysconfig');

		$html_form = '';
		$html_form .= form_open_multipart($action, array('id' => 'rsAddForm') );

		foreach ($model->fields as $k=>$v){
			$class = '';
			if(isset($v['form']['class'])){
				if(is_array($v['form']['class'])){
					$class = implode(' ', $v['form']['class']);
				}else{
					$class = $v['form']['class'];
				}
			}


			if(!isset($v['form']))	continue;
			$validation = '';
			if(isset($v['form']['validation'])){
				$validation = '<b>*</b>';
			}
			$error_class = '';
			switch ($v['form']['type']){
				case 'primary':
					break;
				case 'hidden':
					switch ($v['form']['data']['source']){
						case 'static':
							$html_form .= form_hidden($v['name'], $v['form']['data']['value']);
							break;
						case 'extra':
							$html_form .= form_hidden($v['name'], $extra['data'][$v['name']]);
							break;
					}
					break;
				case 'text':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}

					$extra = '';
					if(isset($v['form']['extra'])){
						$extra = $v['form']['extra'];
					}

					$default = '';
					if(isset($v['form']['default'])){
						$default = @call_user_method($v['form']['default'], $model);
					}

					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_input( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> set_value($v['name'], $default), 'class'=>'form-control ' . $class, 'placeholder'=>(isset($v['form']['tips'])?$v['form']['tips']:'') ), '' ,$extra );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'password':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}

					$extra = '';
					if(isset($v['form']['extra'])){
						$extra = $v['form']['extra'];
					}

					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_password( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> set_value($v['name']), 'class'=>'form-control ' . $class, 'placeholder'=>(isset($v['form']['tips'])?$v['form']['tips']:'') ), '' ,$extra );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'textarea':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_textarea( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> set_value($v['name']), 'class'=>'form-control ' . $class, 'placeholder'=>(isset($v['form']['tips'])?$v['form']['tips']:'') ) );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'select':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$options = '';
					switch ($v['form']['option']['type']){
						case "function":
							$this->load->model($v['form']['option']['data']['model'], 'rsD');
							$options = @call_user_method_array($v['form']['option']['data']['name'], $this->rsD, $v['form']['option']['data']['parameter']);
							break;
						case "static":
							$options = $v['form']['option']['data'];
							break;
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_dropdown( $v['name'],  $options, set_value($v['name']), 'class="form-control"' );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'file':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_upload( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> set_value($v['name']) ) );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'html':
					//echo $v['form']['data']['function'];
					//echo $v['form']['data']['parameter'];
					$html_form .= @call_user_method_array($v['form']['data']['function'], $this, $v['form']['data']['parameter']);
					break;
			}
		}

		$html_form .= form_submit(array('name'=>'rsSubmit', 'id'=>'rsSubmit', 'value'=>'保存', 'class' => 'btn btn-default'));
		$html_form .= form_close();
		return $html_form;
	}
}