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
	return ( empty($val) ) ? $default : trim($val) ;
}

/**
 * เรียกใช้งาน $_POST โดยสามารถกำหนดค่า default และ filter เองได้
 */
function input_post($name, $default = false, $filter = FILTER_SANITIZE_STRING){
	$val = filter_input(INPUT_POST, $name, $filter);
	return ( empty($val) ) ? $default : trim($val) ;
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

function to_arabic_number($number){
    global $th_number;
    $arabic = array_keys($th_number);
    $thai = array_values($th_number);
    $arabic_number = str_replace($thai, $arabic, $number);
    return $arabic_number;
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

/**
 * เรียกดูปีงบประมาณ(ปกติจะอยู่ระหว่าง 1ตค ถึง 30กย)
 *
 * $long	bool	เป็นการเรียกดูปีแบบเต็มรูปแบบ
 * $en		bool	เรียกดูปีแบบ ค.ศ.
 * 
 * get_year_checkup(); // 59
 * get_year_checkup(true); // 2559
 */
function get_year_checkup($long = false, $en = false){
	$d = date('d');
	$m = date('m');
	$y = date('Y') + 543 ;

	if( $m >= 10 && $d >= 1 ){
		$y += 1;
	}

	if( $en === true ){
		$y -= 543 ;
	}

	if( $long === true ){
		return $y;
	}

	$y = substr($y, 2);
	return $y;
}

$regular_list = array(
    1 => array(
        'title' => 'โรคหรือความผิดปกติของตา',
        'items' => array(
            'ก' => 'ตาข้างใดข้างหนึ่งบอด คือเมื่อรักษาและแก้สายตาด้วยแว่นตาแล้วการมองเห็นยังอยู่ในระดับต่ำกว่า 3/60 หรือลานสายตาโดยเฉลี่ยแคบกว่า 10 องศา',
            'ข' => 'สายตาไม่ปกติ คือเมื่อรักษาและแก้สายตาด้วยแว่นแล้ว การมองเห็นยังอยู่ในระดับ 6/24 หรือต่ำกว่าทั้งสองข้าง',
            'ค' => 'สายตาสั้นมากกว่า 8 ไดออปเตอร์ หรือสายตายาวมากกว่า 5 ไดออปเตอร์ ทั้งสองข้าง',
            'ง' => 'ต้อแก้วตาทั้งสองข้าง (Bilateral Cataract)',
            'จ' => 'ต้อหิน (Glaucoma)',
            'ฉ' => 'โรคขั้วประสาทตาเสื่อมทั้ง 2 ข้าง (Optic Atrophy)',
            'ช' => 'ขั้วประสาทตาอักเสบเรื้อรังหรือขุ่นทั้งสองข้าง',
            'ซ' => 'ประสาทการเคลื่อนไหวลูกตาไม่ทำงานสูญเสียอย่างถาวร (Cranial never 3 , 4 , 6)'
        )
    ),2 => array(
        'title' => 'โรคหรือความผิดปกติของหู',
        'items' => array(
            'ก' => 'หูหนวกทั้งสองข้าง คือต้องใช้เสียงในช่วงคลื่นความถี่ 500-2,000 รอบต่อวินาทีหรือเกินกว่า 55 เดซิเบล จึงจะได้ยินทั้งสองข้าง',
            'ข' => 'หูชั้นกลางอักเสบเรื้อรังทั้งสองข้าง',
            'ค' => 'เยื่อแก้วหูทะลุทั้งสองข้าง'
        )
    ),3 => array(
        'title' => 'โรคของหัวใจและหลอดเลือด',
        'items' => array(
            'ก' => 'หัวใจหรือหลอดเลือดพิการอย่างถาวร จนอาจเกิดอันตรายร้ายแรง',
            'ข' => 'ลิ้นหัวใจพิการ',
            'ค' => 'การเต้นของหัวใจผิดปกติอย่างถาวร จนอาจเกิดอันตรายร้ายแรง',
            'ง' => 'โรคของแล้ามเนื้อหัวใจนิดที่ไม่สามารถรักษาให้หายขาดได้และอาจเป็นอันตราย',
            'จ' => 'หลอดเลือดแดงใหญ่โป่งพอง',
            'ฉ' => 'หลอดเลือดภายในกระโหลกศรีษะโป่งพองหรือผิดปกติชนิดที่อาจเป็นอันตราย'
        )
    ),4 => array(
        'title' => 'โรคเลือดและอวัยวะสร้างเลือด',
        'items' => array(
            'ก' => 'โรคเลือดหรืออวัยวะสร้างเลือดผิดปกติอย่างรุนแรงและอาจเป็นอันตรายถึงชีวิต',
            'ข' => 'ภาวะม้ามโต (Hypersplenism) ที่รักษาไม่หายและอาจเป็นอันตราย'
        )
    ),5 => array(
        'title' => 'โรคของระบบหายใจ',
        'items' => array(
            'ก' => 'โรคหืด (Asthma) ที่ได้รับการวินิจฉัยตามเกณฑ์การวินิจฉัย',
            'ข' => 'โรคทางปอดที่มีอาการไอ หอบเหนื่อย และมีการสูญเสียการทำงานของระบบทางเดินหายใจ โดยตรวจสมรรถภาพปอดได้ค่า forced Expiratoy Volume in One Second และ,หรือ Forced Vital Capacity ต่ำกว่าร้อยละ 60 ของค่ามาตรฐานตามเกณฑ์',
            'ค' => 'โรคความดันเลือดในปอดสูง (Pulmonary Hypertension) ซึ่งวินิจฉัยโดยการตรวจหัวใจด้วยคลื่นเสียงความถี่สูง (Echocardiogram) หรือโดยการใส่สายวัยความดันเลือดในปอด',
            'ง' => 'โรคถุงน้ำในปอด (Lung Cyst) ที่ตรวจวินิจฉัยได้โดยการถ่ายรังสีทรวงอก หรือ เอ็กซ์เรย์คอมพิวเตอร์ปอด',
            'จ' => 'โรคหยุดการหายใจขณะนอนหลับ (Obstructive Sleep Apnea) ซึ่งวินิจฉัยด้วยการตรวจการนอนหลับ (Polysomnography)'
        )
    ),6 => array(
        'title' => 'โรคของระบบปัสสาวะ',
        'items' => array(
            'ก' => 'ไตอักเสบเรื้อรัง',
            'ข' => 'กลุ่มอาการไตพิการ (Nephrotic Syndrome)',
            'ค' => 'ไตวายเรื้อรัง',
            'ง' => 'ไตพองเป็นถุงน้ำแต่กำเนิด (Polycystic Kidney)'
        )
    ),7 => array(
        'title' => 'โรคหรือความผิดปกติของกระดูก ข้อ และกล้ามเนื้อ',
        'items' => array(
            'ก' => array(
                'name' => 'โรคข้อหรือความผิดปกติของข้อ ดังต่อไปนี้',
                'attributes' => array(
                    1 => 'ข้ออักเสบเรื้อรัง (Chronic Arthritis)',
                    2 => 'ข้อเสื่อมเรื้อรัง (Chronic Osteoarthritis)',
                    3 => 'โรคข้อและกระดูกสันหลังอักเสบเรื้อรัง (Spondyloarthropathy)'
                )
            ),
            'ข' => array(
                'name' => 'แขน ขา มือ เท้า นิ้ว อย่างใดอย่างหนึ่งผิดปกติ ดังต่อไปนี้',
                'attributes' => array(
                    1 => 'แขน ขา มือ หรือเท้า ด้วนหรือพิการ ถึงแม้ว่าจะรักษาด้วยวิธีใหม่ที่สุดแล้วก็ยังใช้การไม่ได้',
                    2 => 'นิ้วหัวแม่มือด้วนจนถึงข้อปลายนิ้วหรือพิการถึงขั้นใช้การไม่ได้',
                    3 => 'นิ้วชี้ของมือด้วนตั้งแต่ข้อปลายนิ้ว',
                    4 => 'นิ้วมือในมือข้างเดียวกันตั้งแต่สองนิ้วขึ้นไปด้วนจนถึงข้อปลายนิ้วหรือพิการถึงขั้นใช้การไม่ได้',
                    5 => 'นิ้วหัวแม่เท้าด้วนจนถึงข้อปลายนิ้วหรือพิการถึงขั้นใช้การไม่ได้',
                    6 => 'นิ้วเท้าข้างเดียวกันตั้งแต่สองนิ้วขึ้นไปด้วนจนถึงข้อปลายนิ้วหรือพิการถึงขั้นใช้การไม่ได้',
                    7 => 'นิ้วเท้าในเท้าแต่ละข้างตั้งแต่หนึ่งนิ้วขึ้นไปด้วนจนถึงข้อปลายนิ้วหรือพิการถึงขั้นใช้การไม่ได้',
                    8 => 'นิ้วเท้าในเท้าข้างใดข้างหนึ่งตั้งแต่หนึ่งนิ้วขึ้นไปด้วนจนถึงข้อโคนนิ้วหรือพิการถึงขั้นใช้การไม่ได้'
                )
            ),
            'ค' => 'คอเอียงหรือแข็งทื่อชนิดถาวร',
            'ง' => 'กระดูกสันหลังโก่งหรือคดหรือแอ่นจนเห็นได้ชัด หรือแข็งทื่อชนิดถาวร',
            'จ' => 'กล้ามเนื้อเหี่ยวลีบหรือหดสั้น (Atrophy or Contracture) จนเป็นผลให้อวัยวะส่วนหนึ่งส่วใดใช้การไม่ได้'
        )
    ),8 => array(
        'title' => 'โรคของต่อมไร้ท่อและภาวะผิดปกติของเมตะบอลิสัม',
        'items' => array(
            'ก' => 'ภาวะต่อมธัยรอยด์ทำงานน้อยไปอย่างถาวร',
            'ข' => 'ภาวะต่อมพอราธัยรอยด์ทำงานน้อยไปอย่างถาวร',
            'ค' => 'ภาวะต่อมใต้สมองผิดปกติอย่างถาวร',
            'ง' => 'เบาหวาน',
            'จ' => 'ภาวะอ้วน (Obesity) ซึ่งมีดัชนีความหมายของร่างกาย (BodyMass Index) ตั้งแต่ 35 กิโลกรัมแต่รารางเมตรขึ้นไป',
            'ฉ' => 'โรคหรือความผิดปกติเกี่ยวกับเมตะบอลิสัมของแร่ธาตุ สาอาหารดุลสารน้ำอีเล็กโทรลัยท์ และกรดด่าง ตลอดจนเมตะบอลิสัมอื่นๆ ชนิดถาวร และอาจเป็นอันตราย',
            'ช' => 'ภาวะต่อมธัยรอยด์ทำงานมากผิดปกติ (Hyperthyroidism)'
        )
    ),9 => array(
        'title' => 'โรคติดเชื้อ',
        'items' => array(
            'ก' => 'โรคเรื้อน',
            'ข' => 'โรคเท้าช้าง',
            'ค' => 'โรคติดเชื้อเรื้อรังระยะแสดงอาการรุนแรง ซึ่งไม่สามารถรักษาให้หายขาดได้'
        )
    ),10 => array(
        'title' => 'โรคทางประสาทวิทยา',
        'items' => array(
            'ก' => 'จิตเจริญล่าช้า (Mental retardation) ที่มีระดับเชาว์ปัญญา 69 หรือ ต่ำกว่านั้น',
            'ข' => 'ใบ้ (Mutism) หรือพูดไม่เป็นภาษาหรือฟังภาษาไม่รู้เรื่อง (Aphasia) ชนิดถาวร',
            'ค' => 'ลมชัก (Epilepsy) หรือโรคที่ทำให้มีอาการชัก (Seizures) อย่างถาวร',
            'ง' => 'อัมพาต (Paralysis) ของแขน ขา มือ หรือ เท้าชนิดถาวร',
            'จ' => 'สมองเสื่อม (Dementia)',
            'ฉ' => 'โรคหรือความผิดปกติของสมองหรือไขสันหลังที่ทำให้เกิดความผิดปกติอย่างมากในการเคลื่อนไหวของแขนหรือขาอย่างถาวร',
            'ช' => 'กล้ามเนื้อหมดกำลังอย่างหนัก (Myasthenia Gravis)'
        )
    ),11 => array(
        'title' => 'โรคทางจิตเวช',
        'items' => array(
            'ก' => array(
                'name' => 'โรคจิตที่มีอาการรุนแรง หรือเรื้อรัง',
                'attributes' => array(
                    1 => 'โรคจิตเภท (Schizophrenia)',
                    2 => 'โรคจิตกลุ่มหลงผิด (Resistant delusional disorder, Induced delusional disorder)',
                    3 => 'โรคสคิซโซแอฟแฟ็คทีป (Schizoaffective disorder)',
                    4 => 'โรคจิตที่เกิดจากโรคทางกาย (Other Mental disorder due to brain Damage and Dysfunction)',
                    5 => 'โรคจิตอื่นๆ (Unspecified nonorganic psychosis)'
                )
            ),
            'ข' => array(
                'name' => 'โรคอารมณ์แปรปรวนที่มีอาการรุนแรง หรือเรื้อรัง',
                'attributes' => array(
                    1 => 'โรคอารมณ์แปรปรวน (Manic Episode, Bipolar Affective Disorder)',
                    2 => 'โรคอารมณ์แปรปรวนที่เกิดจากโรคทางกาย (Other Mental Disorder due to brain Damage and Dysfunction to Physical disorder)',
                    3 => 'โรคอารมณ์แปรปรวนอื่นๆ (Other Mood (Affective)Disorder, Unspecified Mood Disorder)',
                    4 => 'โรคซึมเศร้า (Depressive Depressive Disorder, Recurent Depressive Disorder)'
                )
            ),
            'ค' => array(
                'name' => 'โรคพัฒนาการทางจิตเวช',
                'attributes' => array(
                    1 => 'จิตเจริญล่าช้าที่มีระดับเชาว์ปัญญา 70 หรือต่ำกว่านั้น (Mental Retardation)',
                    2 => 'โรคหรือความผิดปกติในการพัฒนาการของทักษะทางสังคมและภาษา (Pervasive Development)'
                )
            )
        )
    ),12 => array(
        'title' => 'โรคอื่นๆ',
        'items' => array(
            '' => 'ภาวะเพศสภาพไม่ตรงกับเพศกําเนิด (Gender Identity Disorder)',
            'ก' => 'กระเทย (Hermaphrodism)',
            'ข' => 'มะเร็ง (Malignant Neoplasm)',
            'ค' => 'ตับอักเสบเรื้อรัง (Chronic Hepatitis)',
            'ง' => 'ตับแข็ง (Chrrhosis of Liver)',
            'จ' => 'คนเผือก (Albion)',
            'ฉ' => 'โรคลูปัสอิริธิมาโตซัสทั่วร่างกาย (Systemic Lupus Eyethematosus)',
            'ช' => 'กายแข็งทั่วร่างกาย (Systemic Sclerosis)',
            'ซ' => array(
                'name' => 'รูปวิปริตต่างๆ ได้แก่',
                'attributes' => array(
                    1 => 'จมูกโหว่',
                    2 => 'เพดานโหว่หรือสูงหรือลิ้นไก่สั้นพูดไม่ชัด'
                )
            ),
            'ฌ' => 'โรคผิวหนังลอกหลุดตัวผิดปกติแต่กำเนิดชนิดเด็กดักแด้ (Lamella Ichthyosis & Congenital Ichthyosiform Erytkroderma)'
        )
    )
);