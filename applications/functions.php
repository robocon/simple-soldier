<?php
$ranks = array(
    'จอมพล', 'พลเอก', 'พลโท', 'พลตรี', 'พลจัตวา',
    'พันเอก (พิเศษ)', 'พันเอก', 'พันโท', 'พันตรี', 'ร้อยเอก',
    'ร้อยโท', 'ร้อยตรี', 'จ่าสิบเอก', 'จ่าสิบโท', 'จ่าสิบตรี',
    'สิบเอก', 'สิบโท', 'สิบตรี', 'สิบตรีกองประจำการ', 'นาย',
    'นาง', 'นางสาว'
);

$short_months = array(
    '01' => 'ม.ค.',
    '02' => 'ก.พ.',
    '03' => 'มี.ค.',
    '04' => 'เม.ษ.',
    '05' => 'พ.ค.',
    '06' => 'มิ.ย.',
    '07' => 'ก.ค.',
    '08' => 'ส.ค.',
    '09' => 'ก.ย.',
    '10' => 'ต.ค.',
    '11' => 'พ.ย.',
    '12' => 'ธ.ค.'
);

$full_months = array(
    '01' => 'มกราคม',
    '02' => 'กุมภาพันธ์',
    '03' => 'มีนาคม',
    '04' => 'เมษายน',
    '05' => 'พฤษภาคม',
    '06' => 'มิถุนายน',
    '07' => 'กรกฎาคม',
    '08' => 'สิงหาคม',
    '09' => 'กันยายน',
    '10' => 'ตุลาคม',
    '11' => 'พฤศจิกายน',
    '12' => 'ธันวาคม'
);

$th_number = array('1' => '๑','2' => '๒','3' => '๓','4' => '๔','5' => '๕','6' => '๖','7' => '๗','8' => '๘','9' => '๙','0' => '๐');

$alphabet = array(
    0 => 'A','B','C','D','E','F','G','H','I','J',
    'K','L','M','N','O','P','Q','R','S','T',
    'U','V','W','X','Y','Z'
);

function set_session($name, $value = null){
    $_SESSION[$name] = $value;
}

function get_session($name){
    return ( isset($_SESSION[$name]) ) ? $_SESSION[$name] : false ;
}

/**
 * เรียกใช้งาน $_GET โดยสามารถกำหนดค่า default และ filter เองได้
 */
function input_get($name, $default = false, $filter = FILTER_SANITIZE_STRING){
	$val = filter_input(INPUT_GET, $name, $filter);
	return ( empty($val) ) ? $default : $val ;
}

/**
 * เรียกใช้งาน $_POST โดยสามารถกำหนดค่า default และ filter เองได้
 */
function input_post($name, $default = false, $filter = FILTER_SANITIZE_STRING){
	$val = filter_input(INPUT_POST, $name, $filter);
	return ( empty($val) ) ? $default : $val ;
}

function input_etc($name, $default = false){
    $txt = htmlspecialchars( strip_tags($name), ENT_QUOTES );
    return ( empty($txt) ) ? $default : $txt ;
}

function input($t, $d = false){
    $v = ( isset($_POST[$t]) ) ? trim($_POST[$t]) : ( ( isset($_GET[$t]) ) ? trim($_GET[$t]) : $d ) ;
    if( !empty($v) ){
        return htmlspecialchars(strip_tags($v), ENT_QUOTES);
    }else{
        $res = $v;
    }
    return $res;
}

function dump($t){
    echo '<pre>';
    var_dump($t);
    echo '</pre>';
}

function domain(){
	$protocal = strtolower(getenv('HTTPS')) == 'on' ? 'https' : 'http';
    $domain = $protocal.'://'.getenv('HTTP_HOST');
    return $domain;
}

function get_baseurl(){
    global $config;
    $base = ( $config['base_url'] === '/' ) ? '' : $config['base_url'] ;
    return $base;
}

function getUrl(){
    $test_url = domain().'/'.get_baseurl();
    return domain().'/'.get_baseurl();
}

function redirect($url = false, $msg = false){

    $refer_url = domain().'/'.get_baseurl().$url;
    if( $msg !== false ){
        set_session('x_msg', $msg);
    }
    header('Location: '.$refer_url);
    exit;
}

if( !function_exists('toNumber') ){
    function toNumber($number){
        $number = empty($number) ? 0 : $number ;
        return number_format($number, 2);
    }
}

/**
 * เปลี่ยนจากเลข Column เป็น A, B, C ...
 */
function setCol($col){
    global $alphabet;
    $new_col = array();
    foreach( $col as $key => $col_val){

        if( strlen($col['0']) === 13 ){ // ถ้า column แรกมีเลข 13 หลัก
            if( $key > 25 ){
                $sub_key = ($key % 26);
                $main_key = (int) (floor($key / 26) - 1 );
                $final_key = $alphabet[$main_key].$alphabet[$sub_key];

                if( $alphabet[$sub_key] === 'A' ){
                    $col_val = (string) $col_val;
                }

                $new_col[$final_key] = $col_val;

            }else{
                $get_key = $alphabet[$key];
                if( $get_key === 'A' ){
                    $col_val = (string) $col_val;
                }
                $new_col[$get_key] = $col_val;
            }
        }
    }
    return $new_col;
}

/* แจ้งเตือน เป็น Alert แบบใช้ Javascript */
function js_alert($msg){
    ?>
    <script type="text/javascript">
        alert('<?=$msg;?>');
        window.history.back(-1);
    </script>
    <?php
    exit;
}

/**
 * ค.ศ. เป็น พ.ศ.
 */
if( !function_exists('ad_to_bc') ){
	function ad_to_bc($time = null){
		$time = preg_replace_callback('/^\d{4,}/', 'cal_to_bc', $time);
		return $time;
	}
}

if( !function_exists('cal_to_bc') ){
	function cal_to_bc($match){
		return ( $match['0'] + 543 );
	}
}

/**
 * พ.ศ. เป็น ค.ศ.
 */
if( !function_exists('bc_to_ad') ){
	function bc_to_ad($time = null){
		$time = preg_replace_callback('/^\d{4,}/', 'cal_to_ad', $time);
		return $time;
	}
}

if( !function_exists('cal_to_ad') ){
	function cal_to_ad($match){
		if( intval($match['0']) === 0 ){
			return $match['0'];
		}
		return ( $match['0'] - 543 );
	}
}

function val($value){
    return ( isset($value) !== false ) ? $value : '' ;
}

function to_thai_number($number){
	global $th_number;
	$lists = str_split($number);
	$th_str = '';
	foreach( $lists as $key => $item ){

		if( isset($th_number[$item]) ){
			$th_str .= $th_number[$item];
		}else{
			$th_str .= $item;
		}

	}
	return $th_str;
}

function getDateList($name = 'days', $match = null, $class_name = false){
	$def_day = range(1, 31);
	?>
	<select name="<?=$name;?>" class="<?=$class_name;?>">
		<?php foreach($def_day as $key => $day): ?>
		<?php $select = ( $match == $day ) ? 'selected="selected"' : '' ; ?>
		<option value="<?=$day;?>" <?=$select;?>><?=$day;?></option>
		<?php endforeach; ?>
	</select>
	<?php
}

/**
 * แสดงเดือนเป็น Dropdown
 * $name string ชื่อของตัวแปร
 * $match string ค่าที่จับคู่ใน value
 */
function getMonthList($name = 'months', $match = null, $class_name = false){
	global $short_months;
	if( empty($short_months) ){
		echo 'กรุณาเปิด global variable ใน php.ini';
		exit;
	}
	?>
	<select name="<?=$name;?>" class="<?=$class_name;?>">
		<?php foreach($short_months as $key => $month): ?>
		<?php $select = ( $match == $key ) ? 'selected="selected"' : '' ; ?>
		<option value="<?=$key;?>" <?=$select;?>><?=$month;?></option>
		<?php endforeach; ?>
	</select>
	<?php
}

/**
 * แสดงปีเป็น Dropdown
 * $name	string	ชื่อของ input
 * $thai	bool	เป็นตัวบอกว่าจะให้แสดงเป็นปี พศ หรือไม่
 * $year	int		เป็นตัวกำหนดการแสดง selected
 * range	mixed	กำหนดค่าน้อยสุดไปจนถึงมากสุดโดยใช้ปี คศ เป็นหลัก
 *
 * @example
 * getYearList('new_name', true, 2558, array(2556,2557,2558,2559));
 * เป็นการตั้งชื่อ input ชื่อ new_name แสดงเป็นปี พศ และแสดงปี 2558 เป็นค่าเริ่มต้นโดยมีช่วงการแสดงผลตั้งแต่ปี 2556 ถึง 2559
 */
function getYearList($name = 'years', $thai = false, $year = null, $range = array(), $class_name = false){
	?>
	<select name="<?=$name;?>" class="<?=$class_name;?>">
		<?php
		if( !empty($range) ){
			$y_min = min($range);
			$y_max = max($range);
		}else{
			$y_min = date("Y") - 5 ;
			$y_max = date("Y") + 5 ;
		}

		for($a=$y_min; $a<=$y_max; $a++){

			$y = ( $thai === true ) ? $a + 543 : $a ;
			?>
			<option value="<?=$a?>" <?php if($year==$a) echo "selected='selected'"?>><?=$y?></option>
			<?php
		}
		?>
	</select>
	<?php
}

function generate_token($name){
	$session_id = session_id();
	return hash('sha256', $session_id.$name);
}

function check_token($token, $name){
	$check_token = false;
	$get_token = generate_token($name);
	if( $token === $get_token ){
		$check_token = true;
	}
	return $check_token;
}

function errorMsg($status = NULL, $id = ''){
	$msg = 'บันทึก';
	if( $status === 'edit' ){
		$msg = 'แก้ไข';
	} elseif( $status === 'delete' ) {
		$msg = 'ลบ';
	}

	return "ไม่สามารถ{$msg}ข้อมูลได้ กรุณาเก็บรหัส $id นี้เพื่อแจ้งผู้ดูแลระบบเพื่อทำการแก้ไขต่อไป";
}

/**
 * SUPPORT ONLY YYYY-MM-DD
 * E.g. 2017-01-29 to 29 มกราคม 2560
 */
function ymd_tothai($date_ymd){
    global $full_months;
    list($y, $m, $d) = explode('-', $date_ymd);
    return $d.' '.$full_months[$m].' '.($y + 543);
}
