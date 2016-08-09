<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	protected $fillable = array('user_id', 'event_user_id', 'event_id', 'url', 'status_id');

	/**
	 * Notification belongs to User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
		return $this->belongsTo(User::class );
	}

	/**
	 * Notification belongs to User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function userEvent() {
		// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
		return $this->belongsTo(User::class , 'event_user_id');
	}

	/**
	 * Notification belongs to User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function event() {
		// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
		return $this->belongsTo(Event::class );
	}

}
