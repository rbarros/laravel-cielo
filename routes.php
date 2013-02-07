<?php

/**
 * Requisição somente por POST
 * @var Cielo
 * [cielo/tipo_de_parcelamento/numero_de_parcelas/numero_do_pedido/valor_do_pedido]
 * http://localhost/voges-pagamento/public/cielo/visa/pa/3/3152611/1000
 */
Route::post('(:bundle)/(:any)/(:any)/(:num)/(:any)/(:num)',function($cartao,$tipo_parcelamento,$parcelas,$order,$valor){
	/**
	 * Cria o objeto de integração com a Cielo usando o ambiente de desenvolvimento
	 * @var Cielo
	 */
	$cielo = new Cielo( CieloMode::DEPLOYMENT );
         
	/**
	 * Define o código de afiliação.
	 * O código abaixo é usado no ambiente de testes para poder recuperar
	 * os dados do cartão do cliente dentro da loja
	 */
	$cielo->setAffiliationCode( Config::get('cielo::cielo.affiliation') );

	/**
	 * Define a chave de afiliação.
	 * A chave abaixo é usada no ambiente de testes para poder recuperar
	 * os dados do cartão do cliente dentro da loja
	 */
	$cielo->setAffiliationKey( Config::get('cielo::cielo.affiliation_key') );

	/**
	 * Define a url de retorno
	 * O código abaixo é usado para retornar as informações da transação
	 */
	$cielo->setReturnURL( Config::get('cielo::cielo.return_url') );

	switch (strtoupper($cartao)) {
		case 'MASTER':
		case 'MASTERCARD':
			$cartao = CreditCard::MASTER_CARD;
			break;

		case 'ELO':
			$cartao = CreditCard::ELO;
			break;

		case 'VISA':
		default:
			$cartao = CreditCard::VISA;
			break;
	}

	/**
	 * Tipo do pagamento, a vista, débito, parcelado pela loja ou pelo banco,
	 * @var integer
	 */
	switch (strtoupper($tipo_parcelamento)) {
		/**
		 * Crédito a Vista
		 */
		case 'CV':
			$paymentProduct = PaymentProduct::ONE_TIME_PAYMENT;
			break;
		/**
		 * Parcelado pela Loja
		 */
		case 'PL':
			$paymentProduct = PaymentProduct::INSTALLMENTS_BY_AFFILIATED_MERCHANTS;
			break;

		/**
		 * Parcelado pela Administradora
		 */
		case 'PA':
			$paymentProduct = PaymentProduct::INSTALLMENTS_BY_CARD_ISSUERS;
			break;
		
		/**
		 * Débito
		 */
		case 'D':
			$paymentProduct = PaymentProduct::DEBIT;
			break;

		default:
			$paymentProduct = $tipo_parcelamento;
			break;
	}

	/**
	 * O primeiro passo é requerir um TID para a autorização direto na loja
	 * Esse passo é necessário para garantir que uma transação não seja autorizada
	 * mais de uma vez, caso um timeout de conexão ou algum problema de rede ocorra
	 * @var string
	 */
	$tid = $cielo->buildTIDRequest( $cartao , $paymentProduct )->call()->getTID();


	/**
	 * Número de parcelas que a compra será dividida
	 * @var integer
	 */
	if($paymentProduct==1 or $paymentProduct=='A'){
		$parcels = 1;
	}else{
		$parcels = (int)$parcelas;
	}
	
	$orderNumber = $order;
	$orderValue = (int)$valor;

	if(Config::get('cielo::cielo.card')=='loja'){
		/**
		 * Número do cartão do cliente
		 * @var string
		 */
		//$cardNumber = '4551870000000183'; //$_POST[ 'cardNumber' ]

		/**
		 * Data de expiração do cartão no formato yyyymm
		 * @var string
		 */
		//$cardExpiration = '201201'; //$_POST[ 'cardExpiration' ];

		/**
		 * Indicador do código de segurança
		 * @var integer
		 */
		//$indicator = 1;

		/**
		 * Três dígitos do código de segurança que ficam no verso do cartão
		 * @var integer
		 */
		//$securityCode = 123;
		
		/**
		 * Cria a transação com autorização dentro da loja, fazendo captura automática
		 * @var Transaction
		 */

		$transaction = $cielo
		        ->automaticCapture()
		        ->buildAuthorizationRequest( $tid , $cartao , $cardNumber , $cardExpiration , $indicator , $securityCode , $orderNumber , $orderValue , $paymentProduct )
		        ->call();
		/**
		 * Dados da autorização
		 * @var AuthorizationNode
		 */
		$authorization = $transaction->getAuthorization();
		echo "<pre>";

			var_dump( $transaction->getPan() );
			var_dump( $transaction->getStatus() );
			var_dump( $transaction->getTID() );

			var_dump( $authorization->getArp() );
			var_dump( $authorization->getCode() );
			var_dump( $authorization->getDateTime() );
			var_dump( $authorization->getLR() );
			var_dump( $authorization->getMessage() );
			var_dump( $authorization->getValue() );

			echo $cielo->__getLastRequest(); //Recupera o XML de requisição
			echo $cielo->__getLastResponse(); //Recupera o XML de resposta

		echo "</pre>";

	}elseif(Config::get('cielo::cielo.card')=='cielo'){

		 $transaction = $cielo
	                ->automaticCapture()
	                ->buildTransactionRequest( $cartao , $orderNumber , $orderValue , $paymentProduct , $parcels )
	                ->call();

		/**
         * Dados da autorização
         * @var AuthorizationNode
         */
        $authorization = $transaction->getAuthorization();
        echo "<pre>";
        var_dump( $transaction->getPan() );
        var_dump( $transaction->getStatus() );
        var_dump( $transaction->getTID() );
        echo $cielo->__getLastRequest(); //Recupera o XML de requisição
        echo $cielo->__getLastResponse(); //Recupera o XML de resposta

        echo "</pre>";
	}

});
