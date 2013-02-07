<?php namespace Dso\Cielo\Request;

use Dso\Cielo\Nodes\AbstractCieloNode;
use Cielo\Transaction;
/**
 * @author		João Batista Neto
 * @brief		Classes relacionadas ao webservice da Cielo
 * @package		dso.cielo.request
 */

/**
 * @brief		Requisição de TID para uma requisição de autorização direta
 * @details		Implementação de uma requisição de consulta no webservice da Cielo
 * @ingroup		Cielo
 * @class		TIDRequest
 */
class TIDRequest extends AbstractCieloNode {
	/**
	 * ID da transação
	 * @var		string
	 */
	private $tid;

	/**
	 * Recupera o ID do nó raiz
	 * @return	string
	 */
	protected function getId() {
		return 6;
	}

	/**
	 * Faz a chamada da requisição de autenticação no webservice da Cielo
	 * @return	Transaction
	 * @see		Cielo::call()
	 */
	public function call() {
		return new Transaction( parent::call() );
	}

	/**
	 * Recupera o nome do nó raiz do XML que será enviado à Cielo
	 * @return	string
	 */
	protected function getRootNode() {
		return 'requisicao-tid';
	}
}