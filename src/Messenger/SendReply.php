<?php


namespace Schmiddim\Facebook\Messenger;


use Schmiddim\Facebook\Messenger\Message\MessageInterface;

class SendReply
{
	/**
	 * @var string
	 */
	protected $accessToken;

	public function __construct($accessToken)
	{
		$this->setAccessToken($accessToken);
	}

	/**
	 * @return string
	 */
	public function getAccessToken()
	{
		return $this->accessToken;
	}

	/**
	 * @param string $accessToken
	 */
	public function setAccessToken($accessToken)
	{
		$this->accessToken = $accessToken;
	}


	public function sendMessage(MessageInterface $reply)
	{

		//API Url
		$url = 'https://graph.facebook.com/v2.6/me/messages?access_token=' . $this->getAccessToken();
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($reply));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		return $result = curl_exec($ch);

	}

}