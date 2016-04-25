<?php


namespace Schmiddim\Facebook\Messenger\Message;


class TextMessage extends AbstractMessage implements \JsonSerializable
{
	function jsonSerialize()
	{
		$obj = new \stdClass();
		$recipient = new \stdClass();
		$recipient->id = $this->getRecipientId();
		$message = new \stdClass();
		$message->text = $this->getMessage();
		$obj->recipient = $recipient;
		$obj->message = $message;
		return $obj;
	}


	public function getMessage()
	{
		return substr($this->message, 0, 320);

	}

}