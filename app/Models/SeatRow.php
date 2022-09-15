<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SeatRow
 * 
 * @property int $id
 * @property string $name
 * @property int $show_id
 * 
 * @property Show $show
 * @property Collection|Seat[] $seats
 *
 * @package App\Models
 */
class SeatRow extends Model
{
	protected $table = 'seat_rows';
	public $timestamps = false;

	protected $casts = [
		'show_id' => 'int'
	];

	protected $fillable = [
		'name',
		'show_id'
	];

	public function show()
	{
		return $this->belongsTo(Show::class);
	}

	public function seats()
	{
		return $this->hasMany(Seat::class, 'seat_rows_id');
	}
}
