<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Metar;
class Weather extends Model {

    protected $table = 'airport_weather';
    protected $fillable = ['id', 'icao', 'metar', 'taf', 'visual_conditions', 'altimeter', 'wind', 'temp', 'dp', 'created_at', 'updated_at'];




	public function getOrdDepartureRunwaysAttribute()
	{
		$wind_kts = $wind_dir = 0;

		if ($this->wind != 'Calm')
			list($wind_dir, $wind_kts) = explode("@", $this->wind);

		if (($wind_kts >= 3) && ($wind_dir >= 0 && $wind_dir <= 170))
			return '10L, 9R';
		elseif (($wind_kts < 3) || ($wind_kts >= 3 && ($wind_dir < 360 && $wind_dir > 170)))
			return '28R, 22L';
	}

	public function getOrdArrivalRunwaysAttribute()
	{
		$wind_kts = $wind_dir = 0;

		if ($this->wind != 'Calm')
			list($wind_dir, $wind_kts) = explode("@", $this->wind);

		if (($wind_kts >= 3) && ($wind_dir >= 0 && $wind_dir <= 170))
			return '10C, 9R, 9L';
		elseif (($wind_kts < 3) || ($wind_kts >= 3 && ($wind_dir < 360 && $wind_dir > 170)))
			return '28C, 27L, 27R';
	}
	public function getMdwDepartureRunwaysAttribute()
	{
		$wind_kts = $wind_dir = 0;

		if ($this->wind != 'Calm')
			list($wind_dir, $wind_kts) = explode("@", $this->wind);

		if (($wind_kts >= 5) && ($wind_dir >= 10 && $wind_dir < 90))
			return '4R';
		elseif (($wind_kts >= 5) && ($wind_dir >= 90 && $wind_dir < 180))
			return '13C';
		elseif (($wind_kts >= 5) && ($wind_dir >=180  && $wind_dir < 260))
			return '22L, 31C';
		elseif (($wind_kts < 5) || ($wind_kts >= 5 && ($wind_dir <= 360 && $wind_dir >= 260)))
			return '31C, 22L';
	}
	
	public function getMdwArrivalRunwaysAttribute()
	{
		$wind_kts = $wind_dir = 0;

		if ($this->wind != 'Calm')
			list($wind_dir, $wind_kts) = explode("@", $this->wind);

		if (($wind_kts >= 5) && ($wind_dir >= 10 && $wind_dir < 90))
			return '4R';
		elseif (($wind_kts >= 5) && ($wind_dir >= 90 && $wind_dir < 180))
			return '13C';
		elseif (($wind_kts >= 5) && ($wind_dir >=180  && $wind_dir < 260))
			return '22L, 31C';
		elseif (($wind_kts < 5) || ($wind_kts >= 5 && ($wind_dir <= 360 && $wind_dir >= 260)))
			return '31C, 22L';
	}
	
	public function getMkeDepartureRunwaysAttribute()
	{
		$wind_kts = $wind_dir = 0;

		if ($this->wind != 'Calm')
			list($wind_dir, $wind_kts) = explode("@", $this->wind);

		if (($wind_kts) >= 5 && ($wind_dir >= 220 && $wind_dir <= 300))
			return '25L';
		elseif (($wind_kts < 5) && ($wind_dir >= 300 && $wind_dir <= 30) || ($wind_kts) >= 5 && ($wind_dir >= 300 && $wind_dir <= 30))
			return '1L';
		elseif (($wind_kts) >= 5 && ($wind_dir >= 30 && $wind_dir <= 120))
			return '7R';
		elseif (($wind_kts < 5) && ($wind_dir < 220 && $wind_dir >= 120) || ($wind_kts) >= 5 && ($wind_dir < 220 && $wind_dir >= 120))
			return '19R';
	}
	
	public function getMkeArrivalRunwaysAttribute()
	{
		$wind_kts = $wind_dir = 0;

		if ($this->wind != 'Calm')
			list($wind_dir, $wind_kts) = explode("@", $this->wind);

		if (($wind_kts) >= 5 && ($wind_dir >= 220 && $wind_dir <= 300))
			return '25L';
		elseif (($wind_kts < 5) && ($wind_dir >= 300 && $wind_dir <= 30) || ($wind_kts) >= 5 && ($wind_dir >= 300 && $wind_dir <= 30))
			return '1L';
		elseif (($wind_kts) >= 5 && ($wind_dir >= 30 && $wind_dir <= 120))
			return '7R';
		elseif (($wind_kts < 5) && ($wind_dir < 220 && $wind_dir >= 120) || ($wind_kts) >= 5 && ($wind_dir < 220 && $wind_dir >= 120))
			return '19R';
	}
}

