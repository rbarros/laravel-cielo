<?php

namespace Cielo;

/**
 * @author		João Batista Neto
 * @brief		Classes relacionadas ao webservice da Cielo
 * @package		dso.cielo
 */

/**
 * Bandeira do cartão
 * @ingroup		Cielo
 * @interface	CreditCard
 */
interface CreditCard {
	/**
	 * Cartão Visa
	 */
	const VISA = 'visa';

	/**
	 * Cartão MarterCard
	 */
	const MASTER_CARD = 'mastercard';

	/**
	 * Cartão Elo
	 */
	
	const ELO = 'elo';
}