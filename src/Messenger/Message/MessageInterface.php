<?php


namespace Schmiddim\Facebook\Messenger\Message;


interface MessageInterface
{
	public function setRecipientId($recipientId);

	public function getMessage();

}