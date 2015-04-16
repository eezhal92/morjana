<?php

/*
|--------------------------------------------------------------------------
| Handle ajax for common and for jQuery autocomplete 
|--------------------------------------------------------------------------
|
| 
|
*/

class ServicesController extends \BaseController 
{
    /**
	 * Get provinces collection json data.
	 *
	 * @return json
	 */
    public function provinces()
    {
    
    }
    
    /**
	 * Get cities collection json data.
	 *
	 * @param  string  $province_id
	 * @return json
	 */
    public function cities()
    {
        $province_id = Input::get('province_id');
        $cities = City::where('province_id', $province_id)->lists('name', 'id');

        return Response::json($cities);
    }
    
    public function sub_districts()
    {
    
    }
    
    /**
	 * Get villages collection json data.
	 *
	 * @param  string  $sub_district_id
	 * @return json
	 */
    public function villages()
    {
        $sub_district_id = Input::get('sub_district_id');
        $villages = Village::where('sub_district_id', $sub_district_id)->lists('name', 'id');
    
        return Response::json($villages);
    }
    
    public function univercities()
    {
    
    }
    
    public function faculties()
    {
    
    }
    
    public function majors()
    {
    
    }
    
    /**
	 * univercities json response for jQuery autocomplete.
	 *
	 * @param string $query
     * @return json
	 */
    public function autoUnivercities()
    {
        $query = Input::get('query');
        $univercities = Univercity::where("name", "LIKE", "%$query%")->get()->load('city');
        $datas = [];
    
        foreach($univercities as $u)
        {
            $details = [
                'province_id' => $u->city->province_id,
                'city_id' => $u->city_id,
                'type' => $u->type,
                'id' => $u->id
            ];
        
            $data = ['value' => $u->name, 'data' => $details];
            array_push($datas, $data);
        }
    
        return Response::json(['suggestions' => $datas]);
    }
    
    /**
	 * faculties json response for jQuery autocomplete.
	 *
     * @param string $query
     * @return json
	 */
    public function autoFaculties()
    {
        $query = Input::get('query');
        $faculties = Faculty::where('name', 'LIKE', "%$query%")->with('majors')->get();
        $datas = [];

        foreach($faculties as $f)
        {
            $mdatas = [];

            foreach($f->majors as $m)
            {
                $mdata = ['value' => $m->name, 'data' => $m->id];
                array_push($mdatas, $mdata);
            }

            $details = [
                'id' => $f->id,
                'majors' => $mdatas
            ];

            $data = ['value' => $f->name, 'data' => $details];
            array_push($datas, $data);
        }

        return Response::json(['suggestions' => $datas]);
    }
    
}