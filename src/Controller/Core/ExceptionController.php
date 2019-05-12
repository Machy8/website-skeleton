<?php

declare(strict_types = 1);

namespace App\Controller\Core;

use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;


final class ExceptionController extends AbstractController implements EventSubscriberInterface
{

	public static function getSubscribedEvents()
	{
		return [
			KernelEvents::REQUEST => [['onKernelRequest', 20]]
		];
	}


	public function onKernelRequest(GetResponseEvent $event): void
	{
		$event->getRequest()->setLocale($this->getLocaleFromUrl($this->getRequest()->getPathInfo()));
	}


	public function showException(
		Request $request,
		FlattenException $exception,
		?DebugLoggerInterface $logger = null
	): Response {
		$statusCode = $exception->getStatusCode();

		if ( ! file_exists($this->getTemplatesDirectory() . '/core/exception/parts/' . $statusCode . '.twig')) {
			$statusCode = 'xxx';
		}

		return $this->renderTemplate('core/exception/exception.twig', [
			'exceptionCode' => $statusCode
		]);
	}


	private function getTemplatesDirectory(): string
	{
		return $this->getRootDirectory() . '/../templates';
	}


	private function getLocaleFromUrl(string $url): string
	{
		return (bool) preg_match('/^\/(cs-cz)/', $url, $matches) ? $matches[1] : $this->getParameter('localeEn');
	}

}
