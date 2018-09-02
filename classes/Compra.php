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
		$message .= "Verificamos que foi solicitada uma finalização de compra no site <b>XXXX</b>. ". chr(10);
		$message .= "Confirma? (/S ou /N)";

		return $this->send($message);
	}

	public function s_compra()
	{
		$message = "<b>Finalização de Compra - Aguardando</b>" . chr(10) . chr(10);
		$message .= "Para finalização da compra informe o <b>Token</b> gerado no site <b>XXXX</b>: ";

		return $this->send($message);
	}

	public function f_compra()
	{
		$message = "<b>Finalização de Compra - Finalizada </b>" . chr(10) . chr(10);
		$message .= "Obrigado por comprar com a <b>XXXXX</b>!" . chr(10) . "Sua Segurança em primeiro lugar!";

		return $this->send($message);
	}
	
	public function n_compra()
	{
		$message = "<b>Finalização de Compra - Cancelada</b>" . chr(10) . chr(10);
		$message .= "Verificamos que foi solicitada uma finalização de compra no site <b>XXXX</b>. ". chr(10);
		$message .= "Confirma? (/S ou /N)";

		return $this->send($message);
	}


}