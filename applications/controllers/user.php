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
        $sql = "SELECT `id`,`fullname`,`username`,`level`
        FROM `users`
        WHERE `id` != :my_id";

        if( $this->user->level !== 'super admin' ){
            $sql .= " AND `level` != 'super admin'
            AND `hos_id` = :hospital_id";
            // array_push($data, array(':hospital_id' => $this->user->hos_id));
            $data[':hospital_id'] = $this->user->hos_id;
        }

        $sql .= " ORDER BY `id` DESC";

        // dump($sql);
        // dump($data);
        // exit;

        $db->select($sql, $data);
        $users = $db->get_items();

		$v = $this->load_view('user/lists');
		$v->set_val(array('users' => $users));
        $v->render();

    }

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

    /**
     * @todo ตรวจสอบ email ว่าซ้ำกันรึป่าว
     *
     */
    public function edit_user(){

        if( $this->user === false ){
            redirect('error');
        }

        $db = $this->load_db();

		$sql = "SELECT `id`,`name`
		FROM `hospital`;";
		$db->select($sql);
		$hospitals = $db->get_items();

        $sql = "SELECT `id`,`fullname`,`email`,`hos_id`,`level`
        FROM `users`
        WHERE `id` = :user_id ";
        $db->select($sql, array(':user_id' => $this->user->id));
        $item = $db->get_item();

        $v = $this->load_view('user/edit_form');
		$v->set_val(array(
            'hospitals' => $hospitals,
            'item' => $item
        ));
        $v->render();

    }

    public function save_edit_form(){

        $token = check_token(input_post('token'), 'save_edit_form');
        if ( $token !== true ) {
            echo 'Invalid token';
            exit;
        }

        $fullname = input_post('fullname');
        $email = input_post('email');
        $id = $this->user->id;

        $db = $this->load_db();
        $sql = "UPDATE `users`
        SET
        `fullname` = :fullname,
        `email` = :email
        WHERE `id` = :user_id;";
        $data = array(
            ':fullname' => $fullname,
            ':email' => $email,
            ':user_id' => $id
        );

        $update = $db->update($sql, $data);
        $msg = 'บันทึกข้อมูลเรียบร้อย';
        if( isset($update['id']) ){
            $msg = errorMsg('save', $update['id']);
        }

        redirect('user/edit_user', $msg);
    }

    public function edit_password(){

        $v = $this->load_view('user/edit_password_form');
        $v->render();

    }

    public function save_password_form(){

        $token = check_token(input_post('token'), 'save_edit_password');
        if ( $token !== true ) {
            echo 'Invalid token';
            exit;
        }

        global $config;

        $old_password = input_post('old_password');
        $password = input_post('password');
        $confirm_password = input_post('confirm_password');

        $db = $this->load_db();
        $sql = "SELECT `password` 
        FROM `users` 
        WHERE `id` = :user_id ";
        $db->select($sql, array(':user_id' => $this->user->id));
        $item = $db->get_item();

        $confirm_old_pass = hash('sha256', $old_password.$this->user->username.$config['salt']);
        if( $item['password'] !== $confirm_old_pass ){
            js_alert('รหัสผ่านเก่าไม่ถูกต้อง');
            exit;
        }else{

            $new_password = hash('sha256', $password.$this->user->username.$config['salt']);

            $sql = "UPDATE `users`
            SET
            `password` = :new_password
            WHERE `id` = :user_id;";
            $update = $db->update($sql, array(':new_password' => $new_password, ':user_id' => $this->user->id));
            $msg = 'บันทึกข้อมูลเรียบร้อย';
            if ( isset($update['id']) ) {
                $msg = errorMsg('save', $update['id']);
            }
        }

        redirect('user/edit_password', $msg);
        
    }
}
