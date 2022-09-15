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
 * @property int $concert_id
 * 
 * @property Concert $concert
 *
 * @package App\Models
 */
class Show extends Model
{
	protected $table = 'shows';
	public $timestamps = false;

	protected $hidden = ['concert_id'];

	protected $casts = [
		'concert_id' => 'int'
	];

	protected $dates = [
		'start',
		'end'
	];

	protected $fillable = [
		'start',
		'end',
		'concert_id'
	];

	public function concert()
	{
		return $this->belongsTo(Concert::class);
	}
}
