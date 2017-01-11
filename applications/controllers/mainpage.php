<?php
/**
 *
 */
class Mainpage extends Controller
{

	function base(){

		if ( $this->user->id ) {
			redirect('search');
		}else {
			redirect('login/form');
		}
		exit;

	}

}
