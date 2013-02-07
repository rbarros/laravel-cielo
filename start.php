<?php
/**
 * Part of the Sentry bundle for Laravel.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Cielo
 * @version    1.0
 * @author     Ramon Barros
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2012, Ramon Barros
 * @link       http://ramon-barros.com
 */

Autoloader::map(array(
	
	 'Cielo\\Cielo' 								=> __DIR__.DS.'dso'.DS.'cielo'.DS.'Cielo.php'
	,'Cielo\\CieloMode' 							=> __DIR__.DS.'dso'.DS.'cielo'.DS.'CieloMode.php'
	,'Cielo\\CreditCard' 							=> __DIR__.DS.'dso'.DS.'cielo'.DS.'CreditCard.php'
	,'Cielo\\PaymentProduct' 						=> __DIR__.DS.'dso'.DS.'cielo'.DS.'PaymentProduct.php'
	,'Cielo\\Transaction' 							=> __DIR__.DS.'dso'.DS.'cielo'.DS.'Transaction.php'
	,'Cielo\\TransactionStatus' 					=> __DIR__.DS.'dso'.DS.'cielo'.DS.'TransactionStatus.php'

	,'Dso\\Cielo\\Request\\AuthorizationRequest' 	=> __DIR__.DS.'dso'.DS.'cielo'.DS.'request'.DS.'AuthorizationRequest.php'
	,'Dso\\Cielo\\Request\\CancellationRequest' 	=> __DIR__.DS.'dso'.DS.'cielo'.DS.'request'.DS.'CancellationRequest.php'
	,'Dso\\Cielo\\Request\\CaptureRequest' 			=> __DIR__.DS.'dso'.DS.'cielo'.DS.'request'.DS.'CaptureRequest.php'
	,'Dso\\Cielo\\Request\\QueryRequest' 			=> __DIR__.DS.'dso'.DS.'cielo'.DS.'request'.DS.'QueryRequest.php'
	,'Dso\\Cielo\\Request\\TIDRequest' 				=> __DIR__.DS.'dso'.DS.'cielo'.DS.'request'.DS.'TIDRequest.php'
	,'Dso\\Cielo\\Request\\TransactionRequest' 		=> __DIR__.DS.'dso'.DS.'cielo'.DS.'request'.DS.'TransactionRequest.php'
	
	,'Dso\\Cielo\\Nodes\\AbstractCieloNode' 		=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'AbstractCieloNode.php'
	,'Dso\\Cielo\\Nodes\\AuthenticationNode' 		=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'AuthenticationNode.php'
	,'Dso\\Cielo\\Nodes\\AuthorizationNode' 		=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'AuthorizationNode.php'
	,'Dso\\Cielo\\Nodes\\CancellationNode' 			=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'CancellationNode.php'
	,'Dso\\Cielo\\Nodes\\CaptureNode' 				=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'CaptureNode.php'
	,'Dso\\Cielo\\Nodes\\CardDataNode' 				=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'CardDataNode.php'
	,'Dso\\Cielo\\Nodes\\EcDataNode' 				=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'EcDataNode.php'
	,'Dso\\Cielo\\Nodes\\HolderDataNode' 			=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'HolderDataNode.php'
	,'Dso\\Cielo\\Nodes\\OrderDataNode' 			=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'OrderDataNode.php'
	,'Dso\\Cielo\\Nodes\\PaymentMethodNode' 		=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'PaymentMethodNode.php'
	,'Dso\\Cielo\\Nodes\\TransactionNode' 			=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'TransactionNode.php'
	,'Dso\\Cielo\\Nodes\\XMLNode' 					=> __DIR__.DS.'dso'.DS.'cielo'.DS.'nodes'.DS.'XMLNode.php'

	,'Dso\\Http\\CURL' 								=> __DIR__.DS.'dso'.DS.'http'.DS.'CURL.php'
	,'Dso\\Http\\HTTPRequest' 						=> __DIR__.DS.'dso'.DS.'http'.DS.'HTTPRequest.php'
	,'Dso\\Http\\HTTPRequestMethod' 				=> __DIR__.DS.'dso'.DS.'http'.DS.'HTTPRequestMethod.php'
));


Autoloader::alias('Cielo\\Cielo', 'Cielo');
Autoloader::alias('Cielo\\CieloMode', 'CieloMode');
Autoloader::alias('Cielo\\CreditCard', 'CreditCard');
Autoloader::alias('Cielo\\PaymentProduct', 'PaymentProduct');