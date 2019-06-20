<?php

declare(strict_types = 1);

namespace App\Controller\Core;

use Machy8\SmartController\SmartController;


abstract class AbstractController extends SmartController
{

	/**
	 * @var string
	 */
	private $siteDescription = '';

	/**
	 * @var string
	 */
	private $siteTitle = '';


	public function beforeRender(): void
	{
		parent::beforeRender();

		$this->setTemplateParameters([
			'layoutPath' => 'core/abstract/layout.twig',
			'siteDescription' => $this->getSiteDescription(),
			'siteTitle' => $this->getSiteTitle(),
			'websiteLocale' => $this->getRequest()->getLocale()
		]);
	}


	protected function getSiteDescription(): string
	{
		return $this->siteDescription;
	}


	protected function setSiteDescription(string $siteDescription): AbstractController
	{
		$this->siteDescription = $siteDescription;
		return $this;
	}


	protected function siteDescriptionAppend(string $siteDescription): AbstractController
	{
		$this->siteDescription .= $siteDescription;
		return $this;
	}


	protected function siteDescriptionPrepend(string $siteDescription): AbstractController
	{
		$this->siteDescription = $siteDescription . $this->siteDescription;
		return $this;
	}


	protected function getSiteTitle(): string
	{
		return $this->siteTitle;
	}


	protected function setSiteTitle(string $siteTitle): AbstractController
	{
		$this->siteTitle = $siteTitle;
		return $this;
	}


	protected function siteTitleAppend(string $siteTitle): AbstractController
	{
		$this->siteTitle .= $siteTitle;
		return $this;
	}


	protected function siteTitlePrepend(string $siteTitle): AbstractController
	{
		$this->siteTitle = $siteTitle . $this->siteTitle;
		return $this;
	}

}
