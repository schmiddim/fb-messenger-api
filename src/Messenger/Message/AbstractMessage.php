<?php


namespace Schmiddim\Facebook\Messenger\Message;


class AbstractMessage implements MessageInterface
{
	protected $message;

	protected $recipientId;

	/**
	 * @return mixed
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param mixed $message
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}

	/**
	 * @return mixed
	 */
	public function getRecipientId()
	{
		return $this->recipientId;
	}

	/**
	 * @param mixed $recipientId
	 */
	public function setRecipientId($recipientId)
	{
		$this->recipientId = $recipientId;
	}



}