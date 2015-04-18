<?php

class BaseController extends Controller {
    
    public function __construct()
    {
        $province_lists = ['' => 'Please select univercity province'] + Province::lists('name', 'id');
        $sub_district_lists = ['' => 'Please select sub district'] + SubDistrict::lists('name', 'id');
        $univercity_type_lists = ['' => 'Please select one', 'public' => 'Public', 'private' => 'Private'];
        
        $degree_lists = Degree::lists('name', 'id');
        
        View::share('province_lists', $province_lists);
        View::share('sub_district_lists', $sub_district_lists);
        View::share('univercity_type_lists', $univercity_type_lists);
        View::share('degree_lists', $degree_lists);
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
