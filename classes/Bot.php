<?php

class Bot
{
	private $api_url = '';
	private $only_trusted = true;
	private $trusted = array();
	private $chat_id = '';

	public function __construct($conf, $chat_id)
	{
		$this->api_url = 'https://api.telegram.org/bot' . $conf['bot_token'];
		$this->only_trusted = $conf['only_trusted'];
		$this->trusted = $conf['trusted'];
		$this->chat_id = $chat_id;
	}

	public function isTrusted()
	{
		if (!$this->only_trusted) {
			return true;
		}

		if (in_array($this->chat_id, $this->trusted)) {
			return true;
		}

		return false;
	}

	public function log($message)
	{
		error_log(date("Y-m-d H:i:s") . " - " . $message . "\n", 3, 'log.log');
	}

	public function send($message)
	{
		$text = trim($message);

		if (strlen(trim($text)) > 0) {
			$send = $this->api_url . "/sendmessage?parse_mode=html&chat_id=" . $this->chat_id . "&text=" . urlencode($text);
			file_get_contents($send);
			return true;
		}

		return false;
	}

	public function unauthorized()
	{
		return $this->send("Você não está autorizado a usar comandos nesse Bot!");
	}

	public function unknown()
	{
		return $this->send("Resposta Incorreta, Tente novamente.");
	}

}