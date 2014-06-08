<?php

class BaseController extends Controller {

    public function __construct(){
        $this->beforeFilter(function(){
           View::share('catnav', Category::all());
           View::share('lastPosts', Posts::take(5)->where('availability', '=', '1')->orderBy('created_at', 'DESC')->get());
        });
    }


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
