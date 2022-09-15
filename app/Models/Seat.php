<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Seat
 * 
 * @property int $id
 * @property int $number
 * @property int $seat_rows_id
 * @property int|null $reserved
 * 
 * @property SeatRow $seat_row
 *
 * @package App\Models
 */
class Seat extends Model
{
	protected $table = 'seats';
	public $timestamps = false;

	protected $casts = [
		'number' => 'int',
		'seat_rows_id' => 'int',
		'reserved' => 'int'
	];

	protected $fillable = [
		'number',
		'seat_rows_id',
		'reserved'
	];

	public function seat_row()
	{
		return $this->belongsTo(SeatRow::class, 'seat_rows_id');
	}
}
