<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 08/02/18
 * Time: 10:17
 */

namespace App\Listener\Doctrine;

use App\Entity\Behavior\Timestampable;
use Doctrine\Common\EventSubscriber;
use Psr\Log\LoggerInterface;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;


class DoctrineSubscriber implements EventSubscriber {
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
	public function getSubscribedEvents()
	{
		return [
			'prePersist',
			'preUpdate',
		];
	}

	public function prePersist(LifecycleEventArgs $args)
	{

	}

	public function preUpdate(LifecycleEventArgs $args)
	{

	}
}