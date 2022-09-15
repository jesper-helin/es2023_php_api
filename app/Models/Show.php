<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Show
 * 
 * @property int $id
 * @property Carbon $start
 * @property Carbon $end
 * @property int $artist_id
 * 
 * @property Artist $artist
 *
 * @package App\Models
 */
class Show extends Model
{
	protected $table = 'shows';
	public $timestamps = false;

	protected $hidden = ['artist_id'];

	protected $casts = [
		'artist_id' => 'int'
	];

	protected $dates = [
		'start',
		'end'
	];

	protected $fillable = [
		'start',
		'end',
		'artist_id'
	];

	public function artist()
	{
		return $this->belongsTo(Artist::class);
	}
}
