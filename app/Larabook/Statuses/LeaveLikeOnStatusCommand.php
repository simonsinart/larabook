<?php namespace Larabook\Statuses;

class LeaveLikeOnStatusCommand {

    /**
     * @var string
     */
    public $user_id;

    /**
     * @var string
     */
    public $status_id;

    /**
     * @var boolean
     */
    public $value;


    /**
     * @param string user_id
     * @param string status_id
     */
    public function __construct($user_id, $status_id, $value)
    {
        $this->user_id = $user_id;
        $this->status_id = $status_id;
        $this->value = $value;
    }

}