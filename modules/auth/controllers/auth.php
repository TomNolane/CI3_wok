<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('auth/ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('permissions');
		
		$this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}

	function index()
	{
		if ($from = $this->input->get_post('from'))
		{//Перенаправляем на предыдущую страницу
			redirect($from);
		}
		/*
		if (is_admin())
		{//Админ
			redirect('/sites/admin');
		}
		elseif (is_member())
		{//Пользователь
			redirect('/sites/my');
		}*/
		else
		{//Посетитель
			$this->login();
		}
	}

	function login()
	{
		if (logged_in())
		{
			if ($from = $this->input->get_post('from'))
			{//Перенаправляем на предыдущую страницу
				redirect($from);
			}
			else
			{
				redirect('/dashboard');
			}
		}
		
		//$data['title'] = "Вход";
		
		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == true)
		{ 
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');
			
			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{ 
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				if ($from = $this->input->get_post('from'))
				{//Перенаправляем на предыдущую страницу
					redirect($from);
				}
				else
				{
					redirect('/dashboard');
				}
			}
			else
			{ 
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{  
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			$data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);
			$data['from'] = $this->input->get_post('from');
			
			$page['title'] = 'Вход';
			$page['content'] = $this->load->view('auth/login', $data, true);
			
			$this->load->view('auth', $page);
			//$this->load->view('template', $page);
		}
	}
	
	function logout()
	{
		//log the user out
		$logout = $this->ion_auth->logout();
		
		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('/auth/login');
	}
	
	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', 'Old password', 'required');
		$this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('/auth/login');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{ 
			//display the form
			//set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$data['min_password_length'].'}.*$',
			);
			$data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$data['min_password_length'].'}.*$',
			);
			$data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);
			
			//$page['title'] = 'Меняем пароль';
			$page['content'] = $this->load->view('auth/change_password', $data, true);
			
			$this->load->view('auth', $page);
			//$this->load->view('template', $page);
		}
		else
		{
			$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));
			
			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
			
			if ($change)
			{ 
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password');
			}
		}
	}
	
	//forgot password
	function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email Address', 'required');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$data['email'] = array('name' => 'email',
				'id' => 'email',
			);
			
			//set any errors and display the form
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			//$page['title'] = 'Восстановление пароля';
			$page['content'] = $this->load->view('auth/forgot_password', $data, true);
			
			$this->load->view('auth', $page);
			//$this->load->view('template', $page);
		}
		else
		{
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));
			
			if ($forgotten)
			{ 
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('auth/login'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/forgot_password');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}
		
		$user = $this->ion_auth->forgotten_password_check($code);
		
		if ($user)
		{  
			//if the code is valid then display the password reset form
			
			$this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');
			
			if ($this->form_validation->run() == false)
			{
				//display the form
				
				//set the flash data error message if there is one
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				
				$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$data['min_password_length'].'}.*$',
				);
				$data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$data['min_password_length'].'}.*$',
				);
				$data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$data['csrf'] = $this->_get_csrf_nonce();
				$data['code'] = $code;
				
				//render
				//$this->load->view('auth/reset_password', $data);
				//$page['title'] = 'Сброс пароля';
				$page['content'] = $this->load->view('auth/reset_password', $data, true);
				
				$this->load->view('auth', $page);
				//$this->load->view('template', $page);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) 
				{
					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);
					
					show_error('This form post did not pass our security checks.');
				} 
				else 
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
					
					if ($change)
					{ 
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code);
					}
				}
			}
		}
		else
		{ 
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/forgot_password');
		}
	}

	//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}
		
		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/forgot_password');
		}
	}

	//create a new user
	function register()//create_user()
	{
		$data['title'] = 'Регистрация';
		
		if ($this->ion_auth->logged_in())
		{
			redirect('auth');
		}
		
		$referer = abs(intval($this->input->cookie('referer', true)));
		$invite  = $this->input->cookie('invite', true);// Определяем приглашение
		
		//validate form input
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('password', 'Пароль', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		//$this->form_validation->set_rules('password_confirm', 'Подтверждение пароля', 'required');
		
		if ($this->form_validation->run() == true)
		{
			//$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$username = '';
			$email    = $this->input->post('email');
			//$password = $this->input->post('password');
			// Генерируем пароль
			$this->load->helper('password');
			$password = password($this->config->item('min_password_length', 'ion_auth'));
		}
		
		if ($this->form_validation->run() == true && $user_id = $this->ion_auth->register($username, $password, $email))
		{
			//$this->load->model('members/members_model', 'members');
			//$this->members->set_org_id($user_id, $user_id);
			
			$this->load->library('email');
			$this->email->from($this->config->item('noreply_mail'), $this->config->item('mail_name'));
			$this->email->to($this->config->item('owner_mail'));
			$this->email->subject('[еКонтора] Новый пользователь');
			$this->email->message($this->load->view('email/admin_new_member', array('id' => $user_id,
												'email' => $email,
												'referer' => $referer,
												'invite' => $invite), true));
			$this->email->send();
			
			//check to see if we are creating the user
			//redirect them back to the admin page
			/*$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth');*/
			
			if ($this->ion_auth->login($email, $password, true))
			redirect('create');
		}
		else
		{ 
			//display the create user form
			//set the flash data error message if there is one
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'email',
				'value' => $this->form_validation->set_value('email'),
			);
			$data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			$data['invite'] = $invite;
			
			$data['content'] = $this->load->view('auth/create_user', $data, true);
			
			$this->load->view('auth', $data);
			//$this->load->view('template', $data);
		}
	}
	
	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}
