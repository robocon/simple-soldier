<?php
class User extends Controller{

    public function base(){

        if( $this->user === false ){
            redirect('error');
        }

        // ถ้าไม่ใช่ super admin จะเห็นเฉพาะ รพ.ตัวเอง
        $data = array(
            ':my_id' => $this->user->id
        );
        $db = $this->load_db();
        $sql = "SELECT `id`,`fullname`,`level`
        FROM `users`
        WHERE `id` != :my_id";

        if( $this->user->level !== 'super admin' ){
            $sql .= " AND `level` != 'super admin'
            AND `hos_id` = :hospital_id";
            array_push($data, array(':hospital_id' => $this->user->hos_id));
        }

        $sql .= " ORDER BY `id` DESC";

        $db->select($sql, $data);
        $users = $db->get_items();

		$v = $this->load_view('user/lists');
		$v->set_val(array('users' => $users));
        $v->render();

    }

	// public function register_form(){
    //     global $ranks, $config;
    //     if( $this->user !== false ){
    //         redirect('');
    //     }

	// 	$open_register = $config['open_register'];
	// 	if( $open_register === false ){
	// 		redirect('');
	// 	}

    //     $view = $this->load_view('user/register_form');
    //     $view->set_val(array('ranks' => $ranks));
	// 	$view->render();
    // }

    public function logout(){
        Session_helper::destroy();
        redirect();
    }

    public function form(){

		$db = $this->load_db();
		$sql = "SELECT `id`,`name`
		FROM `hospital`;";
		$db->select($sql);
		$hospitals = $db->get_items();

        $v = $this->load_view('user/form');
		$v->set_val(array('hospitals' => $hospitals));
        $v->render();

    }

	public function save(){

		global $config;

        $token = check_token(input_post('token'), 'save_user');
        if ( $token !== true OR $this->user === false ) {
            redirect('error');
        }

		$fullname = input_post('fullname');
		$hospital = input_post('hospital');
		$email = input_post('email');
		$username = input_post('username');
		$password = input_post('password');
		$level = input_post('level');

		$password = hash('sha256', $password.$username.$config['salt']);

		$sql = "INSERT INTO `users`
		(`fullname`,`username`,`password`,`email`,`level`,`status`,`hos_id`,`date`)
		VALUES
		(:fullname , :username, :password, :email, :level, 1, :hos_id, NOW());";
		$data = array(
			':fullname' => $fullname,
			':username' => $username,
			':password' => $password,
			':email' => $email,
			':level' => $level,
			':hos_id' => $hospital,
		);

		$db = $this->load_db();
		$insert = $db->insert($sql, $data);

		redirect('user');
    }

	public function check_username(){
        $token = check_token(input_post('token'), 'check_username');
        if ( $token !== true ) {
            echo 'Invalid token';
            exit;
        }

        $username = input_post('username');
        $db = $this->load_db();
        $sql = "SELECT `id`
            FROM `users`
            WHERE `username` = :username ;";
        $db->select($sql, array(':username' => $username));
        $rows = $db->get_rows();
        $res = 'invalid';
        if( $rows === 0 ){
            $res = 'valid';
        }
        header('Content-Type: application/json');
		echo json_encode(array('checker' => $res));
        exit;
	}

	public function check_email(){

        $token = check_token(input_post('token'), 'check_email');
        if ( $token !== true ) {
            echo 'Invalid token';
            exit;
        }

		$email = input_post('email');
        $match = preg_match('/.+@.+\.{1}.+/', $email);
        if ( $match > 0 ) {
            $db = $this->load_db();
            $sql = "SELECT `id`
            FROM `users`
            WHERE `email` = :email_checker ;";
            $db->select($sql, array(':email_checker' => $email));
            $rows = $db->get_rows();

            $res = 'invalid';
            if( $rows === 0 ){
                $res = 'valid';
            }
        }else{
            $res = 'invalid_format';
        }

        header('Content-Type: application/json');
		echo json_encode(array('checker' => $res));
		exit;
	}
}
