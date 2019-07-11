<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pick extends Model
{
	protected $guarded = [];

	protected $fillable = ['sport', 'team', 'line', 'grade', 'game_time', 'comment'];

	public function users(){
		return $this->belongsTo(User::class);
	}

	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [
		'day'
	];

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $casts = [
		'day' => 'date:m-d-Y',
	];
}
