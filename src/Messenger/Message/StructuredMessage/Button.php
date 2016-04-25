<?php


namespace Schmiddim\Facebook\Messenger\Message\StructuredMessage;


class Button
{

	protected $type;
	protected $title;
	protected $payload;

	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param mixed $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return mixed
	 */
	public function getPayload()
	{
		return $this->payload;
	}

	/**
	 * @param mixed $payload
	 */
	public function setPayload($payload)
	{
		$this->payload = $payload;
	}



}