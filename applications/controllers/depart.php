<?php
/**
*
*/
class Depart extends Controller
{
	public function base(){
		
		$db = $this->load_db();
		$sql = "SELECT a.`id`,a.`name`,a.`latest_date`, b.`page_count`
		FROM `departs` a
		LEFT JOIN (
			select COUNT(`id`) AS `page_count`,`category`
			FROM `pages`
			WHERE `status` = 1
			GROUP BY `category`
		) AS b ON b.`category` = a.`id`
		GROUP BY a.`id`
		ORDER BY a.`sort` ASC";
		$db->select($sql);
		$items = $db->get_items();
		$data = array(
			'items' => $items
		);

		$view = $this->load_view('depart/index');
		$view->set_val($data);
		$view->render();
	}

	public function form(){
        $view = $this->load_view('depart/form');
        $data = array(
        	'id' => '0',
        	'form' => 'new',
        	'title' => ''
        );
        $view->set_val($data);
		$view->render();
    }

    public function save(){

    	$title = input('title');
    	$author = $this->user->name;
    	$id = (int) input('id');
    	$form = input('form');

    	$db = $this->load_db();
    	if( $id === 0 ){

			//
			$sql = "SELECT MAX(`sort`) AS `max`
			FROM `departs` LIMIT 1";
			$db->select($sql);
			$item = $db->get_item();

    		$sql = "INSERT INTO `departs`
			(`id`,`name`,`latest_date`,`author`,`sort`)
			VALUES
			(NULL, :title, NOW(), :author, :sort);";
			$data = array(
				':title' => $title,
				':author' => $author,
				':sort' => ( $item['max'] + 1 )
			);
	    	$db->insert($sql, $data);
    	}else if( $id > 0 ){
    		$sql = "UPDATE `departs` SET
			`name` = :title,
			`latest_date` = NOW(),
			`author` = :author
			WHERE `id` = :item_id;
			";
			$data = array(
				':title' => $title,
				':author' => $author,
				':item_id' => $id
			);
			$db->update($sql, $data);
    	}

    	redirect('depart', 'บันทึกข้อมูลเรียบร้อย');
    }

    public function edit( $id = false ){

    	$id = (int) $id;

    	$db = $this->load_db();
    	$sql = "SELECT `id`,`name` FROM `departs` WHERE `id` = :item_id ";
    	$db->select($sql, array(':item_id' => $id));
    	$item = $db->get_item();

    	$data = array(
    		'title' => $item['name'],
    		'id' => $item['id'],
    		'form' => 'edit'
    	);
    	$view = $this->load_view('depart/form');
    	$view->set_val($data);
		$view->render();
    }

    public function delete( $id = false ){
    	$id = (int) $id;

    	$db = $this->load_db();
    	$sql = "DELETE FROM `departs`
		WHERE `id` = :item_id ;";
		$db->delete($sql, array(':item_id' => $id));

		//@todo

		// เรียงลำดับใหม่
		$sql = "SELECT `id`, `sort`
		FROM `departs` ORDER BY `sort` ASC";
		$db->select($sql);
		$items = $db->get_items();
		$i = 1;
		foreach( $items as $key => $item ){
			$sql = "UPDATE `departs`
			SET `sort` = :sort_number
			WHERE `id` = :item_id ;";
			$db->update($sql, array(':sort_number' => $i, ':item_id' => $item['id']));
			$i++;
		}

		redirect('depart', 'ลบข้อมูลเรียบร้อย');
    }

	public function sort($status, $id, $next_id){

		$id = (int) $id;
		$next_id = (int) $next_id;

		if( $status === 'down' ){
			$sort1 = "`sort` + 1";
			$sort2 = "`sort` - 1";
		}else if( $status === 'up' ){
			$sort1 = "`sort` - 1";
			$sort2 = "`sort` + 1";
		}

		$db = $this->load_db();
		$sql = "UPDATE `departs`
		SET `sort` = ( $sort1 )
		WHERE `id` = :item_id ;";
		$db->update($sql, array(':item_id' => $id));

		$sql = "UPDATE `departs`
		SET `sort` = ( $sort2 )
		WHERE `id` = :next_id ;";
		$db->update($sql, array(':next_id' => $next_id));

		redirect('depart', 'เรียงลำดับข้อมูลเรียบร้อย');
	}
}
