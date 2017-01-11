<?php
/**
 *
 */
class Patient extends Controller{

    public function base(){

        if( $this->user === false ){
            redirect('error');
        }

        $db = $this->load_db();

        /**
         *
         */
        $sql = "SELECT `id`,
            `firstname`,
            `lastname`,
            `idcard`,
            `province`,
            `regula`,
            `doctor`,
            `date_add`,
            `status`
        FROM `patients`
        WHERE `status` = 1 ";

        if ( $this->user->level !== 'super admin' ) {
            $sql .= "AND `hos_id` = '".$this->user->hos_id."'";
        }

        $sql .= "ORDER BY `id` DESC ;";
        $db->select($sql);
        $items = $db->get_items();

        $data = array(
            'items' => $items
        );

        $view = $this->load_view('patient/index');
        $view->set_val($data);
        $view->render();


    }

    public function form(){

        if( $this->user === false ){
            redirect('error');
        }

        $data = array(
            'id' => 0,
            'day' => date('d'),
            'month' => date('m'),
            'year' => date('Y'),
        );

        $view = $this->load_view('patient/form');
        $view->set_val($data);
		$view->render();
    }

    public function save(){

        $token = check_token(input_post('token'), 'save_patient');
        if ( $token !== true OR $this->user === false ) {
            redirect('error');
        }

        $file = $_FILES['cert'];
        $file_ext = substr($file['name'], strrpos($file['name'], '.') + 1);
        if( $file_ext !== 'pdf' ){
            js_alert('อนุญาตเฉพาะไฟล์ pdf เท่านั้น');
        }

        $firstname = input_post('firstname');
        $lastname = input_post('lastname');
        $idcard = input_post('idcard');
        $house_no = input_post('house_no');
        $tambon = input_post('tambon');
        $amphur = input_post('amphur');
        $province = input_post('province');
        $zipcode = input_post('zipcode');
        $diag = input_post('diag');
        $regula = input_post('regula');
        $doctor = input_post('doctor');
        $date_add = input_post('year').'-'.input_post('month').'-'.input_post('day');
        $hos_id = $this->user->hos_id; // อิงข้อมูล รพ.ของผู้ป่วยตามผู้กรอกไปก่อน
        $owner = $this->user->fullname;
        $doctor = json_encode($_POST['doctor']);
        $id = input_post('id');

        $db = $this->load_db();

        if( $id === false ){

            $sql = "INSERT INTO `patients`
            (`id`,
            `firstname`,
            `lastname`,
            `idcard`,
            `house_no`,
            `tambon`,
            `amphur`,
            `province`,
            `zipcode`,
            `diag`,
            `regula`,
            `doctor`,
            `date_add`,
            `diag_etc`,
            `hos_id`,
            `owner`,
            `date`,
            `cert`,
            `status`)
            VALUES
            (NULL,
            :firstname,
            :lastname,
            :idcard,
            :house_no,
            :tambon,
            :amphur,
            :province,
            :zipcode,
            :diag,
            :regula,
            :doctor,
            :date_add,
            NULL,
            :hos_id,
            :owner,
            NOW(),
            NULL,
            0 );";

            $data = array(
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':idcard' => $idcard,
                ':house_no' => $house_no,
                ':tambon' => $tambon,
                ':amphur' => $amphur,
                ':province' => $province,
                ':zipcode' => $zipcode,
                ':diag' => $diag,
                ':regula' => $regula,
                ':doctor' => $doctor,
                ':date_add' => $date_add,
                ':hos_id' => $hos_id,
                ':owner' => $owner,
            );
            $save = $db->insert($sql, $data);
            $item_id = $db->get_last_id();

        } else {
            $sql = "UPDATE `patients`
            SET
            `firstname` = :firstname,
            `lastname` = :lastname,
            `idcard` = :idcard,
            `house_no` = :house_no,
            `tambon` = :tambon,
            `amphur` = :amphur,
            `province` = :province,
            `zipcode` = :zipcode,
            `diag` = :diag,
            `regula` = :regula,
            `doctor` = :doctor,
            `date_add` = :date_add,
            `hos_id` = :hos_id,
            `owner` = :owner
            WHERE `id` = :current_id;";

            $data = array(
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':idcard' => $idcard,
                ':house_no' => $house_no,
                ':tambon' => $tambon,
                ':amphur' => $amphur,
                ':province' => $province,
                ':zipcode' => $zipcode,
                ':diag' => $diag,
                ':regula' => $regula,
                ':doctor' => $doctor,
                ':date_add' => $date_add,
                ':hos_id' => $hos_id,
                ':owner' => $owner,
                ':current_id' => $id
            );
            $save = $db->update($sql, $data);
            $item_id = $id;
        }

        $msg = 'บันทึกข้อมูลเรียบร้อย';
        if( isset($save['id']) ){
            $msg = errorMsg('save', $save['id']);
        }

        $update = false;

        if( $save === true && $file['error'] === 0 ){

            if( $file_ext === 'pdf' ){
                $file_name = md5($file['name'].time()).'.'.$file_ext;

                $dir_path = getcwd().'/files';
                if( file_exists($dir_path) === false ){
                    mkdir($dir_path);
                }
                move_uploaded_file( $file['tmp_name'], 'files/'.$file_name );

                $sql = "UPDATE `patients`
                SET
                `cert` = :cert,
                `status` = 1
                WHERE `id` = :id ;";

                $data = array(
                    ':cert' => $file_name,
                    ':id' => $item_id
                );

                $update = $db->update($sql, $data);
                if( isset($update['id']) ){
                    $msg = errorMsg('save', $update['id']);
                }
            }
        }

        redirect('patient', $msg);
    }


    public function edit($item_id, $token){

        $get_token = check_token($token, 'item'.$item_id);
        if ( $get_token !== true OR $this->user === false ) {
            redirect('error');
        }

        $item_id = (int) $item_id;

        $db = $this->load_db();
        $sql = "SELECT *
        FROM `patients`
        WHERE `id` = :item_id ;";
        $db->select($sql, array(':item_id' => $item_id));
        $item = $db->get_item();

        $item['doctor'] = json_decode($item['doctor']);
        list($year, $month, $day) = explode('-', $item['date_add']);
        $data = array(
            'id' => $item['id'],
            'item' => $item,
            'day' => $day,
            'month' => $month,
            'year' => $year,
        );

        $view = $this->load_view('patient/form');
        $view->set_val($data);
        $view->render();
    }

    public function delete($item_id, $token){

        $get_token = check_token($token, 'item'.$item_id);
        if ( $get_token !== true OR $this->user === false ) {
            redirect('error');
        }

        $db = $this->load_db();
        $sql = "UPDATE `patients`
        SET
        `status` = 0
        WHERE `id` = :item_id;";
        $db->update($sql, array(':item_id' => $item_id));

        redirect('patient', 'ลบข้อมูลเรียบร้อย');
    }

}
