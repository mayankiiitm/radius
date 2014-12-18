<?php
/**
* 
*/
class Locations extends Model{
	protected $table='locations';
	public static function update_location($long,$lat){
		$user=Users::auth();
		$details['longitude']=$long;
		$details['latitude']=$lat;
		$details['fb_id']=$user->fb_id;
		$rules=array('fb_id'=>'unique:locations');
		$location=new self;
		if (!Validator::validate($details,$rules)) {
			return $location->update("UPDATE locations SET longitude=:longitude,latitude=:latitude WHERE fb_id=:fb_id",$details);
		}
		 return $location->insert($details);
	}

	public static function radius($long,$lat,$radius){
		$location=new self;
        /*$zip=$location->select(
        "SELECT z.latitude, z.longitude,
        111.045* DEGREES(ACOS(COS(RADIANS($lat))* COS(RADIANS(z.latitude))

        * COS(RADIANS($long - z.longitude))+ SIN(RADIANS($lat))* SIN(RADIANS(z.latitude)))) AS distance
	    FROM locations AS z  
WHERE z.latitude BETWEEN $lat  - ($radius / 111.045) AND $lat  + ($radius / 111.045) 
AND z.longitude BETWEEN $long - ($radius / (111.045 * COS(RADIANS($lat)))) 
AND $long + ($radius / (111.045 * COS(RADIANS($lat))))  group by z.fb_id      
        ORDER BY distance LIMIT 1000");*/
echo $sql="SELECT z.latitude, z.longitude,

  	     111.045* DEGREES(ACOS(COS(RADIANS($lat)) 
  	     * COS(RADIANS(z.latitude))* COS(RADIANS($long - z.longitude)) 
  	     + SIN(RADIANS($lat))* SIN(RADIANS(z.latitude)))) AS distance
         FROM locations AS z

     WHERE z.latitude
     BETWEEN $lat  - ($radius / 111.045)
         AND $lat  + ($radius / 111.045)
    AND z.longitude
     BETWEEN $long - ($radius / (111.045 * COS(RADIANS($lat))))
         AND $long + ($radius / (111.045 * COS(RADIANS($lat))))
 ORDER BY distance";
    $zip=$location->select($sql);
    var_dump($location);
        return $zip;
	}




	public static function get_location($fb_id){
		$location=new self;
		return $location->first("SELECT * FROM locations WHERE fb_id=:fb_id",array('fb_id'=>$fb_id));
	}
}


 
 

?>