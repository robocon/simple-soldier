<?php
/**
 * 
 */
class Page extends Controller{

    public function base(){

        $db = $this->load_db();
        $sql = "SELECT a.`id`,a.`title`,a.`category`,a.`date_add`,a.`author`,
        b.`name`,b.`id` AS `depart_id`,b.`sort` AS `depart_sort`
        FROM `pages` AS a 
        LEFT JOIN `departs` AS b ON b.`id` = a.`category` 
        WHERE a.`status` = 1 
        ORDER BY b.`sort`,a.`sort` ASC";
        $db->select($sql);
        $items = $db->get_items();
        
        $groups = array();
        foreach( $items as $key => $item ){
            $key = $item['category'];
            $groups[$key][] = $item;
        }
        // dump($groups);
        // exit;

        $data = array(
            'groups' => $groups
        );
        
        $view = $this->load_view('page/index');
        $view->set_val($data);
        $view->render();
    }

    public function form(){

        $categories = $this->get_departs();
        $data = array(
            'item' => array(
                'data' => '',
                'title' => '',
                'category' => 0
            ),
            'categories' => $categories,
            'form_status' => 'new'
        );

        $view = $this->load_view('page/form');
        $view->set_val($data);
		$view->render();
    }

    public function gen_filename($length){

        $chars = '123456789qazwsxedcrfvtgbyhnujmiklpQAZWSXEDCRFVTGBYHNUJMIKLP';
        $char_len = strlen($chars);
        $ranStr = '';
        for ($i=0; $i < $length ; $i++) { 
            $ranStr .= $chars[(rand(0, $char_len - 1 ))];
        }
        return $ranStr;
    }

    public function save(){
        
        $title = input('title');
        $category = input('depart');
        $page_id = input('page_id');
        $author = $this->user->name;

        $gallery_path = 'gallerys/'.$category.'/';
        if( !file_exists($gallery_path) ){
            mkdir($gallery_path);
        }

        /**
         * @todo ทดสอบการ replace base64 ด้วย file path 
         *
         */
        // preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/', $_POST['elm1'], $matchs);

        // $replace_items = array();
        // $search_items = array();
        // foreach( $matchs['1'] as $item ){

        //     $search_items[] = $item;
        //     $img64 = preg_replace('/(data\:image\/(png|jpe?g)\;base64\,)/', '', $item);

        //     $file_name = md5($this->gen_filename(32));
        //     $file_path = $gallery_path.$file_name.'.jpg';

        //     $img_txt = base64_decode($img64);
        //     file_put_contents($file_path, $img_txt);

        //     $img_path = getUrl().$file_path;
        //     $replace_items[] = $img_path;
        // }
        // $after_txt = str_replace($search_items, $replace_items, $_POST['elm1']);
        // $data = htmlspecialchars($after_txt, ENT_QUOTES);

        $data = htmlspecialchars($_POST['elm1'], ENT_QUOTES);
        $form_status = input('form_status');
        $db = $this->load_db();
        
        if( $form_status === 'new' ){

            // เพิ่มลำดับในการ sort
            $sql = "SELECT MAX(`sort`) AS `max` FROM `pages` WHERE `category` = :category ";
            $db->select($sql, array(':category' => $category));
            $item = $db->get_item();
            $max = ( !empty($item['max']) ) ? ( $item['max'] + 1 ) : 1 ;

            // 
            $sql = "INSERT INTO `pages`
            (`title`, `data`, `category`, `date_add`, `author`, `status`, `sort`)
            VALUES
            ( :title, :data, :category, NOW(), :author, 1, :sort );";
            $data = array(
                ':title' => $title,
                ':data' => $data,
                ':category' => $category,
                ':author' => $author,
                ':sort' => $max
            );
            $insert = $db->insert($sql, $data);

        }else if( $form_status === 'edit' ){

            $sql = "UPDATE `pages`
            SET
            `title` = :title,
            `data` = :data,
            `category` = :category,
            `date_add` = NOW(),
            `author` = :author
            WHERE `id` = :page_id;";

            $data = array(
                ':title' => $title,
                ':data' => $data,
                ':category' => $category,
                ':author' => $author,
                ':page_id' => $page_id
            );

            $update = $db->update($sql, $data);
            // dump($update);
        }

        redirect('page', 'บันทึกข้อมูลเรียบร้อย');

        exit;





        $page_id = $db->get_last_id();
        
        $gallery_path = 'gallerys/'.$category.'/';
        if( !file_exists($gallery_path) ){
            mkdir($gallery_path);
        }

        foreach ($form_data as $key => $columns) {
            # code...
            foreach ($columns as $col_key => $rows) {
                # code...
                foreach ($rows as $row_key => $objects) {

                    foreach ($objects as $obj_key => $value) {
                        
                        if( preg_match('/^data:image\/(png|jpe?g);base64,/', $value, $matchs) > 0 ){

                            $img64 = preg_replace('/^data:image\/(png|jpe?g);base64,/', '', $value);
                            $file_name = md5($this->gen_filename(32));
                            $file_path = $gallery_path.$file_name.'.jpg';

                            $img_txt = base64_decode($img64);
                            file_put_contents($file_path, $img_txt);

                            $sql = "INSERT INTO `images`
                            (`path`, `page_id`, `date_time`, `author`)
                            VALUES
                            (:path_file, :page_id, NOW(), :author);";
                            $data = array(
                                ':path_file' => $file_path,
                                ':page_id' => $page_id,
                                ':author' => $author
                            );
                            $db->insert($sql, $data);
                            $img_id = $db->get_last_id();

                            // สร้างไฟล์พาธใหม่
                            $objects->img_path = $file_path;
                            $objects->img_id = $img_id;

                            // ยกเลิก
                            unset($objects->$obj_key);
                        }

                        if( preg_match('/^align.+/', $obj_key) ){
                            $objects->align = $value;
                            unset($objects->$obj_key);
                        }
                        
                    } // End Item
                }
            } // rows
        } // columns

        $form_data = json_encode($form_data);
        
        $sql = "UPDATE `pages`
        SET
        `data` = :form_data,
        `date_add` = NOW(),
        `status` = 1
        WHERE `id` = :page_id;";
        $db->update($sql, array('form_data' => $form_data, ':page_id' => $page_id));

        redirect('page', 'บันทึกข้อมูลเรียบร้อย');
        
    }

    public function lists($depart_id, $page_id = 0){

        $db = $this->load_db();

        $sql = "SELECT `id`,`title` FROM `pages` WHERE `category` = :depart_id ORDER BY `sort` ASC";
        $data = array(
            ':depart_id' => $depart_id
        );
        $db->select($sql, $data);
        $menus = $db->get_items();

        $sql = "SELECT * FROM `pages` WHERE `id` = :page_id ";
        $data = array(
            ':page_id' => $page_id
        );
        $db->select($sql, $data);
        $item = $db->get_item();
        $data = array(
            'menus' => $menus,
            'item' => $item,
            'depart_id' => $depart_id,
            'page_id' => $page_id
        );

        $view = $this->load_view('page/detail');
        $view->set_val($data);

        $view->render();

    }

    public function edit($page_id){

        $page_id = (int) $page_id;

        $db = $this->load_db();
        $sql = "SELECT * FROM `pages` WHERE `id` = :page_id ";
        $db->select($sql, array(':page_id' => $page_id));
        $item = $db->get_item();
        // dump($item);
        $categories = $this->get_departs();
        $data = array(
            'item' => $item,
            'categories' => $categories,
            'form_status' => 'edit',
            'page_id' => $page_id
        );

        $view = $this->load_view('page/form');
        $view->set_val($data);
        $view->render();
    }

    public function delete($page_id){

        $db = $this->load_db();
        $sql = "UPDATE `pages`
        SET 
        `status` = 0
        WHERE `id` = :page_id;";
        $db->update($sql, array(':page_id' => $page_id));
        
        redirect('page', 'ลบข้อมูลเรียบร้อย');
    }

    public function get_departs(){
        $db = $this->load_db();
        $sql = "SELECT `id`,`name` FROM `departs` ORDER BY `sort` ASC";
        $db->select($sql);
        $items = $db->get_items();
        return $items;
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
		$sql = "UPDATE `pages`
		SET `sort` = ( $sort1 )
		WHERE `id` = :item_id ;";
		$db->update($sql, array(':item_id' => $id));

		$sql = "UPDATE `pages`
		SET `sort` = ( $sort2 )
		WHERE `id` = :next_id ;";
		$db->update($sql, array(':next_id' => $next_id));

		redirect('page', 'เรียงลำดับข้อมูลเรียบร้อย');
	}

}
