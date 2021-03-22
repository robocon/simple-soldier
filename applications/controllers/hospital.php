<?php
/**
* อนุญาตเฉพาะ super admin
*/
class Hospital extends Controller
{
	public function base(){

		if( $this->user === false ){
            redirect('error');
        }

		$db = $this->load_db();
		$sql = "SELECT `id`,`name`
		FROM `hospital`;";
		$db->select($sql);
		$items = $db->get_items();
		
		// var_dump($items);
		// exit;
		$data = array(
			'items' => $items,
			'page_count' => 0
		);

		$view = $this->load_view('hospital/index');
		$view->set_val($data);
		$view->render();
	}

	public function form(){

		if( $this->user === false ){
            redirect('error');
        }

        $view = $this->load_view('hospital/form');
        $data = array(
        	'id' => '0',
        	'form' => 'new',
        	'name' => ''
        );
        $view->set_val($data);
		$view->render();
    }

    public function save(){

		if( $this->user === false ){
            redirect('error');
        }

		$id = (int) input('id', 0);
    	$name = input('name');
    	$author = $this->user->fullname;
    	$form = input('form');

    	$db = $this->load_db();

    	if( $id === 0 ){

    		$sql = "INSERT INTO `hospital`
			(`id`,`name`,`date`,`author`)
			VALUES
			(NULL, :name, NOW(), :author);";
			$data = array(
				':name' => $name,
				':author' => $author
			);
	    	$db->insert($sql, $data);

    	}else if( $id > 0 ){
    		$sql = "UPDATE `hospital` SET
			`name` = :name,
			`date` = NOW(),
			`author` = :author
			WHERE `id` = :item_id;
			";
			$data = array(
				':name' => $name,
				':author' => $author,
				':item_id' => $id
			);
			$db->update($sql, $data);
    	}

    	redirect('hospital', 'บันทึกข้อมูลเรียบร้อย');
    }

    public function edit( $id = false ){

		if( $this->user === false ){
            redirect('error');
        }

    	$id = (int) $id;

    	$db = $this->load_db();
    	$sql = "SELECT `id`,`name` FROM `hospital` WHERE `id` = :item_id ";
    	$db->select($sql, array(':item_id' => $id));
    	$item = $db->get_item();

    	$data = array(
    		'name' => $item['name'],
    		'id' => $item['id'],
    		'form' => 'edit'
    	);
    	$view = $this->load_view('hospital/form');
    	$view->set_val($data);
		$view->render();
    }

    public function delete( $id = false ){

		if( $this->user === false ){
            redirect('error');
        }

    	$id = (int) $id;
    	$db = $this->load_db();

		$sql = "SELECT COUNT(b.`id`) AS `patient_rows`, COUNT(c.`id`) AS `user_rows`
		FROM `hospital` AS a
		LEFT JOIN `patients` AS b ON b.`hos_id` = a.`id`
		LEFT JOIN `users` AS c ON c.`hos_id` = a.`id`
		WHERE a.`id` = :hospital_id ;";

		$db->select($sql, array(':hospital_id' => $id));
		$row = $db->get_item();
		$patient_rows = (int) $row['patient_rows'];
		$user_rows = (int) $row['user_rows'];

		$msg = 'ยังมีข้อมูลผู้ป่วยและข้อมูลผู้ใช้งานในระบบ ไม่สามารถลบข้อมูลโรงพยาบาลได้';
		if( $patient_rows === 0 AND $user_rows === 0 ){

	    	$sql = "DELETE FROM `hospital`
			WHERE `id` = :item_id ;";
			$db->delete($sql, array(':item_id' => $id));
			$msg = 'ลบข้อมูลเรียบร้อย';

		}
		redirect('hospital', $msg);
    }

}
