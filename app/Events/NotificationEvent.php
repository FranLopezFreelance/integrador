<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class NotificationEvent extends Event implements ShouldBroadcast {

	use SerializesModels;

	public $msg;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($msg) {
		$this->msg = $msg;
	}

	/**
	 * Get the channels the event should be broadcast on.
	 *
	 * @return array
	 */
	public function broadcastOn() {
		return [$this->msg['user_id']];
	}
}
