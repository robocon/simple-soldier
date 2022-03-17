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
            `cert`,
            `status`
        FROM `patients`
        WHERE `status` = 1 ";

        if ( $this->user->level !== 'super admin' ) {
            $sql .= "AND `hos_id` = '".$this->user->hos_id."'";
        }

        $sql .= "ORDER BY `id` ASC ;";
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

        $provinces = $this->get_province();
        $year_chk = get_year_checkup(true, true);
        $data = array(
            'id' => 0,
            'day' => date('d'),
            'month' => date('m'),
            'year' => $year_chk,
            'provinces' => $provinces
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
        if( $file_ext !== 'pdf' && $file['error'] === 0 ){
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
            1 );";

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
            `date_add` = :date_add
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

        $provinces = $this->get_province();
        
        $data = array(
            'id' => $item['id'],
            'item' => $item,
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'provinces' => $provinces
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

    private function get_province(){
        $db = $this->load_db();
        $sql = "SELECT `name_th`
        FROM `provinces`;";

        $db->select($sql);
        $items = $db->get_items();
        return $items;
    }

    public function csvform(){ 
        global $full_months;
        $db = $this->load_db();

        $sql = "SELECT `id`,`name`
		FROM `hospital`;";
		$db->select($sql);
        $hospitals = $db->get_items();
        
        $v = $this->load_view('patient/csvForm');
        $v->set_val(array(
            'full_months' => $full_months,
            'hospitals' => $hospitals
        ));
        $v->render();
    }

    public function preview_csv(){
        $file = $_FILES['fileupload'];
        $content = file_get_contents($file['tmp_name']);
        if( $content !== false ){
            $preview_user = array(); 
            $content = iconv('TIS-620','UTF-8',$content);
            $items = explode("\r\n", $content);
            foreach ($items as $key => $item) { 

                if( !empty($item) ){
                    $preview_user[] = $item;
                }
                
            }// foreach

            $v = $this->load_view('patient/preview_user');
            $v->set_val(array(
                'users' => $preview_user
            ));
            $v->render();

        }// if content not false
        else {
            # code...
            redirect('patient/csvform', "ไฟล์ csv มีปัญหา กรุณาตรวจสอบความถูกต้องของไฟล์อีกครั้ง");
        }
    }

    public function importcsv(){

        $file = $_FILES['fileupload'];
        $content = file_get_contents($file['tmp_name']);
        $msg = 'บันทึกข้อมูลเรียบร้อย';
        if( $content !== false ){ 
            $items = explode("\r\n", $content);

            $db = $this->load_db();

            foreach ($items as $key => $item) { 

                if( !empty($item) ){
                    
                    list($firstname,$lastname,$idcard,$house_no,$tambon,$amphur,$province,$zipcode,$diag,$regula,$dr1,$dr2,$dr3,$day,$month,$year,$hos_id) = explode(',', $item); 

                    $dr1 = iconv('TIS-620','UTF-8',$dr1);
                    $dr2 = iconv('TIS-620','UTF-8',$dr2);
                    $dr3 = iconv('TIS-620','UTF-8',$dr3);

                    $dr1 = trim(str_replace(array("\n","\r","\n\r",'"'),'',$dr1));
                    $dr2 = trim(str_replace(array("\n","\r","\n\r",'"'),'',$dr2));
                    $dr3 = trim(str_replace(array("\n","\r","\n\r",'"'),'',$dr3));

                    $doctor = json_encode(array($dr1,$dr2,$dr3));
                    
                    $day = sprintf('%02d',$day);
                    $month = sprintf('%02d',$month);

                    $date_add = "$year-$month-$day";
                    if(preg_match("/\d{4}\-\d{2}\-\d{2}/",$date_add)==false){
                        $date_add = date('Y-m-d');
                    }
                    $owner = 'Administrator';

                    $firstname = iconv('TIS-620','UTF-8',$firstname);
                    $lastname = iconv('TIS-620','UTF-8',$lastname);
                    $firstname = trim(str_replace(array("\n","\r","\n\r",'"'),'',$firstname));
                    $lastname = trim(str_replace(array("\n","\r","\n\r",'"'),'',$lastname));

                    $house_no = iconv('TIS-620','UTF-8',$house_no);
                    $tambon = iconv('TIS-620','UTF-8',$tambon);
                    $amphur = iconv('TIS-620','UTF-8',$amphur);
                    $province = iconv('TIS-620','UTF-8',$province);
                    $diag = iconv('TIS-620','UTF-8',$diag);
                    $regula = iconv('TIS-620','UTF-8',$regula);
                    

                    $sql = "INSERT INTO `patients`
                    ( 
                        `id`,`firstname`,`lastname`,`idcard`,`house_no`,
                        `tambon`,`amphur`,`province`,`zipcode`,`diag`,
                        `regula`,`doctor`,`date_add`,`diag_etc`,`hos_id`,
                        `owner`,`date`,`cert`,`status`
                    )VALUES(
                        NULL,:firstname,:lastname,:idcard,:house_no,
                        :tambon,:amphur,:province,:zipcode,:diag,
                        :regula,:doctor,:date_add,NULL,:hos_id,
                        :owner,NOW(),NULL,1 
                    );";

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

                }
                
            }
        }
        else
        {
            $msg = 'ไม่มีไฟล์ที่ต้องการบันทึก กรุณาตรวจสอบข้อมูลอีกครั้ง';
        }
        
        if( isset($save['id']) ){
            $msg = errorMsg('save', $save['id']);
        }

        redirect('patient/csvform', $msg);
        exit;

    }

    public function importcsv2(){
        
        $data = $_POST['data'];
        $msg = 'บันทึกข้อมูลเรียบร้อย';
        foreach ($data as $item) {
            
            list($firstname,$lastname,$idcard,$house_no,$tambon,$amphur,$province,$zipcode,$diag,$regula,$dr1,$dr2,$dr3,$day,$month,$year,$hos_id) = explode('|', $item); 

            $dr1 = trim(str_replace(array("\n","\r","\n\r",'"'),'',$dr1));
            $dr2 = trim(str_replace(array("\n","\r","\n\r",'"'),'',$dr2));
            $dr3 = trim(str_replace(array("\n","\r","\n\r",'"'),'',$dr3));
            $doctor = json_encode(array($dr1,$dr2,$dr3));

            $day = sprintf('%02d',$day);
            $month = sprintf('%02d',$month);
            $date_add = "$year-$month-$day";
            if(preg_match("/\d{4}\-\d{2}\-\d{2}/",$date_add)==false){
                $date_add = date('Y-m-d');
            }
            $owner = 'Administrator';

            $db = $this->load_db();

            $sql = "INSERT INTO `patients`
            ( 
                `id`,`firstname`,`lastname`,`idcard`,`house_no`,
                `tambon`,`amphur`,`province`,`zipcode`,`diag`,
                `regula`,`doctor`,`date_add`,`diag_etc`,`hos_id`,
                `owner`,`date`,`cert`,`status`
            )VALUES(
                NULL,:firstname,:lastname,:idcard,:house_no,
                :tambon,:amphur,:province,:zipcode,:diag,
                :regula,:doctor,:date_add,NULL,:hos_id,
                :owner,NOW(),NULL,1 
            );";

            $prepare_data = array(
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
            $save = $db->insert($sql, $prepare_data);
            if( isset($save['id']) ){
                $msg = errorMsg('save', $save['id']);
                redirect('patient/csvform', $msg);
                exit;
            }
        }
        redirect('patient/csvform', $msg);
        exit;
    }

}
