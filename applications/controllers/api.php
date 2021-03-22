<?php 
/**
 * API สำหรับ Formเสียบบัตรของหมอเลอปรัชตัวใหม่
 */
class Api extends Controller
{
    public function base()
    {
        echo "Hello World :) nice to meet you";
    }

    public function login()
    {
        global $config;
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $user = $data['username'];
        $pass = $data['password'];
		$response = array('resStatus' => 'n');
		if(!empty($user) AND !empty($pass))
		{
			$db = $this->load_db();
			$sql = 'SELECT a.`id`,a.`username`,a.`email`,a.`fullname`,a.`level`,a.`hos_id`,b.`name` AS `hosName`
			FROM `users` AS a 
			LEFT JOIN `hospital` AS b ON b.`id` = a.`hos_id` 
			WHERE a.`username` = :username
			AND a.`password` = :password
			AND a.`status` = 1';
			$mysqlData = array(
				':username' => $user,
				':password' => hash('sha256', $pass.$user.$config['salt'])
			);
			$db->select($sql, $mysqlData);
			$user_row = $db->get_rows();
			if( $user_row > 0 )
			{
				$user = $db->get_item();
				$response = array(
					'resStatus' => 'y',
					'id' => (int)$user['id'],
					'username' => $user['username'],
					'email' => $user['email'],
					'fullname' => $user['fullname'],
					'level' => $user['level'],
					'hos_id' => $user['hos_id'],
					'hosName' => $user['hosName']
				);
			}
		}

        header('Content-Type: application/json');
		echo json_encode($response);
        exit;
    }

	public function user()
	{
		global $config, $full_months;
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

		$idcard = $data['idcard'];
		$response = array('resStatus' => 'n');
		if(!empty($idcard))
		{
			$db = $this->load_db();
			$db->select("SET NAMES UTF8");
			$sql = "SELECT a.*,b.`name` AS `hosName`
			FROM `patients` AS a 
			LEFT JOIN `hospital` AS b ON b.`id` = a.`hos_id` 
			WHERE REPLACE(a.`idcard`, ' ', '') = :idcard 
			AND a.`status` = '1' 
			LIMIT 1 ";
			$mysqlData = array(
				':idcard' => $idcard
			);
			$db->select($sql, $mysqlData);
			$user_row = $db->get_rows();
			if ($user_row > 0) 
			{
				$user = $db->get_item();

				$address = $user['house_no'];
				if( $user['tambon'] )
				{
					$address .= 'ต.'.$user['tambon'];
				}
				if( $user['amphur'] )
				{
					$address .= 'ต.'.$user['amphur'];
				}
				if( $user['province'] )
				{
					$address .= 'จ.'.$user['province'];
				}

				$drLists = json_decode($user['doctor'],true);
				$doctor = "";
				$i = 1;
				foreach($drLists AS $drTxt)
				{
					$doctor .= "$i. ".trim($drTxt)."\n";
					$i++;
				}

				list($y,$m,$d) = explode('-', $user['date_add']);
                $date_add = $d.' '.$full_months[$m].' '.($y+543);

				$response = array(
					'resStatus' => 'y',
					'fullname' => $user['firstname'].' '.$user['lastname'],
					'idcard' => $user['idcard'],
					'address' => $address,
					'province' => $user['province'],
					'diag' => $user['diag'],
					'doctor' => $doctor,
					'regula' => $user['regula'],
					'date_add' => $date_add,
					'cert' => $user['cert'],
					'hosId' => $user['hosName'],
					'status' => $user['status'],
					'msg' => ''
				);
			}
			else
			{
				$response['msg'] = "ไม่พบข้อมูลจากเลขบัตรประชาชน $idcard";
			}
		}
		else
		{
			$response['msg'] = "ไม่พบข้อมูลจากเลขบัตรประชาชน $idcard";
		}

		header('Content-Type: application/json');
		echo json_encode($response);
        exit;
	}
}