<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 08/02/18
 * Time: 10:17
 */

namespace App\Listener;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class DocumentSubscriber implements EventSubscriberInterface {
	/**
	 * @var LoggerInterface
	 */
	private $logger;

	/**
	 * DocumentSubscriber constructor.
	 * @param LoggerInterface $logger
	 */
	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}


	/**
	 * @return array
	 */
	public static function getSubscribedEvents()
	{
		return [

		];
	}
}