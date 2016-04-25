<?php
namespace Schmiddim\Facebook\Messenger\Message\Image;
use Schmiddim\Facebook\Messenger\Message\AbstractMessage;

class ImageUrlMessage extends AbstractMessage implements \Zend\Stdlib\JsonSerializable, \Schmiddim\Facebook\Messenger\Message\MessageInterface
{
	/**
	 * @var string
	 */
	protected $type = 'image';

	/**
	 * @var string
	 */
	protected $url = '';


	function jsonSerialize()
	{
		$obj = new \stdClass();
		$recipient = new \stdClass();
		$recipient->id = $this->getRecipientId();
		$obj->recipient = $recipient;


		$message = new \stdClass();
		$attachment = new \stdClass();
		$attachment->type = $this->getType();
		$payLoad = new \stdClass();
		$payLoad->url = $this->getUrl();
		$attachment->payload = $payLoad;
		$message->attachment = $attachment;
		$obj->message = $message;
		return $obj;

	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param string $url
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}


}