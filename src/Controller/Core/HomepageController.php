<?php

declare(strict_types = 1);

namespace App\Controller\Core;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


final class HomepageController extends AbstractController
{

	/**
	 * @Route({
	 *     "cs-cz": "/cs-cz/",
	 *     "en-us": "/"
	 * }, name="homepage")
	 */
	public function renderDefault(): Response
	{
		return $this->renderTemplate('core/homepage/default.twig');
	}

}
