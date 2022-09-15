<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Artist
 * 
 * @property int $id
 * @property string $artist
 * @property int $location_id
 * 
 * @property Location $location
 * @property Collection|Show[] $shows
 *
 * @package App\Models
 */
class Artist extends Model
{
	protected $table = 'artists';
	public $timestamps = false;

	protected $hidden = ['location_id'];

	protected $casts = [
		'location_id' => 'int'
	];

	protected $fillable = [
		'artist',
		'location_id'
	];

	public function location()
	{
		return $this->belongsTo(Location::class);
	}

	public function shows()
	{
		return $this->hasMany(Show::class);
	}
}
