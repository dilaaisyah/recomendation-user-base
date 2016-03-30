<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use App\Repositories\SliderRepository;
use App\Jobs\ChangeLocale;

class HomeController extends Controller
{

	/**
	 * The BlogRepository instance.
	 *
	 * @var App\Repositories\BlogRepository
	 */
	protected $blog_gestion;

	/**
	 * The BlogRepository instance.
	 *
	 * @var App\Repositories\SliderRepository
	 */
	protected $slider_gestion;

	/**
	 * Create a new BlogController instance.
	 *
	 * @param  App\Repositories\BlogRepository $blog_gestion
	 * @return void
	*/
	public function __construct(
		BlogRepository $blog_gestion,
		SliderRepository $slider_gestion)
	{
		$this->blog_gestion = $blog_gestion;
		$this->slider_gestion = $slider_gestion;
	}	
	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$recomended = $this->blog_gestion->recent(6);
		$popular = $this->blog_gestion->popular(6);
		$recent = $this->blog_gestion->recent(6);
		$ads = $this->slider_gestion->indexFront(5);

		return view('front.index', compact('recomended', 'popular', 'recent', 'ads'));
	}

	/**
	 * Change language.
	 *
	 * @param  App\Jobs\ChangeLocaleCommand $changeLocale
	 * @param  String $lang
	 * @return Response
	 */
	public function language( $lang,
		ChangeLocale $changeLocale)
	{		
		$lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
		$changeLocale->lang = $lang;
		$this->dispatch($changeLocale);

		return redirect()->back();
	}

}
