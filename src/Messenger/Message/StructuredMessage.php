<?php


namespace Schmiddim\Facebook\Messenger\Message;


use Schmiddim\Facebook\Messenger\Message\StructuredMessage\Button;

class StructuredMessage extends AbstractMessage implements MessageInterface, \JsonSerializable
{

	/**
	 * @var  array Button
	 */
	protected $buttons = array();

	protected $text;

	protected $templateType;

	public function addButton(Button $button)
	{
		if (count($this->buttons) < 3) {
			$this->buttons[] = $button;
		}
	}


	public function getMessage()
	{
		return parent::getMessage(); // TODO: Change the autogenerated stub
	}

	/**
	 * @return array
	 */
	public function getButtons()
	{
		return $this->buttons;
	}

	/**
	 * @param array $buttons
	 */
	public function setButtons($buttons)
	{
		$this->buttons = $buttons;
	}

	/**
	 * @return mixed
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * @param mixed $text
	 */
	public function setText($text)
	{
		$this->text = $text;
	}

	/**
	 * @return mixed
	 */
	public function getTemplateType()
	{
		return $this->templateType;
	}

	/**
	 * @param mixed $templateType
	 */
	public function setTemplateType($templateType)
	{
		$this->templateType = $templateType;
	}


	function jsonSerialize()
	{
		$obj = new \stdClass();
		$recipient = new \stdClass();
		$recipient->id = $this->getRecipientId();
		$obj->recipient = $recipient;


		$message = new \stdClass();
		$attachment = new \stdClass();
		$attachment->type = 'template';

		$payload = new \stdClass();
		$payload->template_type = $this->getTemplateType();
		$payload->text = $this->getText();
		$payload->buttons = array();
		foreach ($this->getButtons() as $buttonObj) {
			/** @var Button $buttonObj */
			$button = new \stdClass();
			$button->type = $buttonObj->getType();
			$button->title = $buttonObj->getTitle();
			$button->payload = $buttonObj->getPayload();
			$payload->buttons[] = $button;
		}

		$attachment->payload = $payload;
		$message->attachment = $attachment;

		$obj->message = $message;

		return $obj;

	}


}