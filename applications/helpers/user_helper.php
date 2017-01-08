<?php
/**
 * 
 */
class User_helper 
{
	public function check_session(){
        global $config;
		$user = Session_helper::get('user');

		if( !isset($user['id']) OR $user === false ){
			return false;
		}else{

            $userObj = new stdClass();
            foreach( $user as $key => $val ){
                $userObj->$key = $val;
            }
            return $userObj;
        }
	}
    
    public static function is_admin($user){
        $level = $user->level;
        return ( $level === 'admin' OR $level === 'super admin' ) ? true : false ;
    }
}
