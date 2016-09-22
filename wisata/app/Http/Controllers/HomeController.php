<?php

namespace App\Http\Controllers;
	
use Illuminate\Contracts\Auth\Guard;
use App\Repositories\BlogRepository;
use App\Repositories\SliderRepository;
use App\Repositories\UserRepository;
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
	 * The UserRepository instance.
	 *
	 * @var App\Repositories\UserRepository
	 */
	protected $user_gestion;

	/**
	 * Create a new BlogController instance.
	 *
	 * @param  App\Repositories\BlogRepository $blog_gestion
	 * @return void
	*/
	public function __construct(
		BlogRepository $blog_gestion,
		SliderRepository $slider_gestion,
		UserRepository $user_gestion)
	{
		$this->blog_gestion = $blog_gestion;
		$this->slider_gestion = $slider_gestion;
		$this->user_gestion = $user_gestion;
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

		// if($user_id){
		// 	$voted_posts = $this->blog_gestion->get_voted_posts();
		// 	$formated = array();
		// 	foreach ($voted_posts as $value) {
		// 		if(array_key_exists($value->user_id, $formated)) {
	 //            	$formated[$value->user_id][$value->post_id] = $value->vote;
	 //            }else{
	 //            	$formated[$value->user_id] = array($value->post_id=>$value->vote);
	 //            }
		// 	}
		// 	if(array_key_exists($user_id, $formated)){
		// 		$ranks = $this->blog_gestion->getRecommendations($formated, $user_id);
			
		// 		$result_recomend = $this->blog_gestion->getRecommendationsPost($ranks, 6);
		// 		if($result_recomend) $recomended = $result_recomend;
		// 		else $recomended = ''; 
		// 	}else $recomended = '';
		// }else{
		// 	$recomended = '';
		// }

		if($user_id){
			$all_post = $this->blog_gestion->get_all_post();
			$all_user = $this->user_gestion->get_all_user();
			$formated = array();
			foreach ($all_post as $post) {
				$count = 0; $sum = 0; $avg = 0;
				foreach ($all_user as $user) {
					$get_vote = $this->blog_gestion->get_vote_by($post->id, $user->id);
					$vote = ($get_vote['vote'])?$get_vote['vote']:0;
					if($vote!=0){ 
						$formated[$post->id][$user->id] = $vote;
						$count++; $sum+=$vote; 
					} 
				}
				if($count==0){ unset($formated[$post->id]); } 
				else {
					$avg = round($sum/$count, 3);
					$formated[$post->id]['avg'] = $avg;
				}
			}
			$ranks = $this->blog_gestion->recommendations($formated, $user_id, $all_user);
			$result_recomend = $this->blog_gestion->getRecommendationsPost($ranks, 6);
			if($result_recomend) $recomended = $result_recomend;
			else $recomended = ''; 
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
