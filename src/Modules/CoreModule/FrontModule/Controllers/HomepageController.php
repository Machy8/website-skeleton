<?php

declare(strict_types = 1);

namespace App\Modules\CoreModule\FrontModule\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


final class HomepageController extends AbstractController
{

	/**
	 * @Route("/", name="homepage")
	 */
	public function renderDefault(): Response
	{
		return $this->renderTemplate();
	}

}
