<?php
class Login extends Controller{

	public function base(){

		global $config;

		$token = check_token(input_post('token'), 'login_user');
        if ( $token !== true ) {
            echo 'Invalid token';
            exit;
        }

        $username = input_post('username');
        $password = input_post('password');

		$db = $this->load_db();

		// ปิดฟีเจอร์ login แบบ username or email ไปก่อน
		// $test_email = preg_match('/.+@.+\.{1}.+/', $username);
		// if( $test_email === 0 ){
		// 	$sql = "SELECT `email` FROM `users` WHERE `username` = :username ";
		// 	$db->select($sql, array(':username' => $username));
		// 	$pre = $db->get_item();
		// 	$username = $pre['email'];
		// }

		$sql = 'SELECT `id`,`username`,`email`,`fullname`,`level`,`hos_id`
		FROM `users`
		WHERE `username` = :username
		AND `password` = :password
		AND `status` = 1';

		$data = array(
			':username' => $username,
			':password' => hash('sha256', $password.$username.$config['salt'])
		);

		$db->select($sql, $data);
		
		$user_row = $db->get_rows();
		if( $user_row === 0 ){
			redirect('login/form', 'ไม่พบผู้ใช้งานในระบบ กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง');
			
		}else{

			$user = $db->get_item();
			$user_data = array(
				'id' => (int)$user['id'],
				'username' => $user['username'],
				'email' => $user['email'],
				'fullname' => $user['fullname'],
				'level' => $user['level'],
				'hos_id' => $user['hos_id']
			);

			set_session('user', $user_data);
			redirect('mainpage');
		}
	}

	public function form(){
		global $config;

		if( $this->user !== false ){
			redirect('error');
		}

		// เปิดให้สมัครสมาชิกหรือไม่
		$open_register = $config['open_register'];

		$view = $this->load_view('login/form');
		$view->set_val(array('open_register' => $open_register));
		$view->render();
	}

}
