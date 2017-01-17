<?php

/**
 *
 */
class Province extends Controller
{
	public function base(){

		$view = $this->load_view('province/index');
		$view->render();

	}
}
