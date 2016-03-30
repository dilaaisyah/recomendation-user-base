<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostVote extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'post_vote';

	/**
	 * The timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = false;

}