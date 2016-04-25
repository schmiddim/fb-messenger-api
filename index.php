<?php
/**
 * Webhook for Time Bot- Facebook Messenger Bot
 * User: adnan
 * Date: 24/04/16
 * Time: 3:26 PM
 * https://github.com/kadnan/Facebook-Chat-Bot/
 *
 *
 * API
 * https://developers.facebook.com/docs/messenger-platform/send-api-reference
 */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


$accessToken = "enter-the-facebook-access-token";
$verifyToken = "create-your-own-verify-token";

$hubVerifyToken = null;

//we're doing the authorization request
if (isset($_REQUEST['hub_challenge'])) {
	$challenge = $_REQUEST['hub_challenge'];
	$hubVerifyToken = $_REQUEST['hub_verify_token'];

	if ($hubVerifyToken === $verifyToken) {
		echo $challenge;
	}
}


//analyze the input stream
$input = json_decode(file_get_contents('php://input'), true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = null;
//We recieved a message!
if (!empty($input['entry'][0]['messaging'][0]['message'])) {
	$message = $input['entry'][0]['messaging'][0]['message']['text'];

} elseif (!empty($input['entry'][0]['messaging'][0]['postback']['payload'])) {
	$message = $input['entry'][0]['messaging'][0]['postback']['payload'];


} else {
	echo 'unable to parse the message!';
}

if (null !== $message) {
	$sendReply = new \Schmiddim\Facebook\Messenger\SendReply($accessToken);
	$message = new Schmiddim\Facebook\Messenger\Message\TextMessage();
	$message->setMessage('hello world!');
	$message->setRecipientId($sender);
	$sendReply->sendMessage($message);

}

