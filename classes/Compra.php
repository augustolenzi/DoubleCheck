<?php

class Compra extends Bot 
{
	public function __construct($conf, $chat_id)
	{
		parent::__construct($conf, $chat_id);
	}

	public function compra()
	{
		$message = "<b>Finalização de Compra - Aguardando</b>" . chr(10) . chr(10);
		$message .= "Verificamos que foi solicitada uma finalização de compra no site <b>www.DoubleCheck.com.br</b>. ". chr(10);
		$message .= "Confirma? (/sim ou /nao)";

		return $this->send($message);
	}

	public function sim()
	{
		$message = "<b>Finalização de Compra - Aguardando</b>" . chr(10) . chr(10);
		$message .= "Para finalização da compra informe o <b>Token</b> gerado no site <b>www.DoubleCheck.com.br</b>: ";

		return $this->send($message);
	}

	public function aBc123()
	{
		$message = "<b>Finalização de Compra - Concluída </b>" . chr(10) . chr(10);
		$message .= "Obrigado por comprar com a <b>www.DoubleCheck.com.br</b>!" . chr(10) . "Sua Segurança em primeiro lugar!";

		return $this->send($message);
	}
	
	public function nao()
	{
		$message = "<b>Finalização de Compra - Cancelada</b>" . chr(10) . chr(10);
		$message .= "Compra Cancelada para sua segurança.";

		return $this->send($message);
	}

}
