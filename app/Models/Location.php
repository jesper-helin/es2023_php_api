<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|Artist[] $artists
 *
 * @package App\Models
 */
class Location extends Model
{
	protected $table = 'locations';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function artists()
	{
		return $this->hasMany(Artist::class);
	}
}
