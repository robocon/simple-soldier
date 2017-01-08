<?php
/**
 * 
 */
class Importxls extends Controller
{
    
    public function base()
    {
        // var_dump($GLOBALS);
        $view = $this->load_view('importxls');
    	// $view->set_val($data);
		$view->render();
    }
}


