<?php

namespace App\Http\Controllers;
	
use Illuminate\Contracts\Auth\Guard;
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
	public function index(
		Guard $auth)
	{
		$popular = $this->blog_gestion->popular(6);
		$recent = $this->blog_gestion->recent(6);
		$ads = $this->slider_gestion->indexFront(5);

		$user = $auth->user();
		if ($user) $user_id = $user->id;
		else $user_id = '';

		if($user_id){
			$voted_posts = $this->blog_gestion->get_voted_posts();
			$formated = array();
			foreach ($voted_posts as $value) {
				if(array_key_exists($value->user_id, $formated)) {
	            	$formated[$value->user_id][$value->post_id] = $value->vote;
	            }else{
	            	$formated[$value->user_id] = array($value->post_id=>$value->vote);
	            }
			}
			if(array_key_exists($user_id, $formated)){
				$ranks = $this->blog_gestion->getRecommendations($formated, $user_id);
			
				$result_recomend = $this->blog_gestion->getRecommendationsPost($ranks, 6);
				if($result_recomend) $recomended = $result_recomend;
				else $recomended = ''; 
			}else $recomended = '';
		}else{
			$recomended = '';
		}

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
