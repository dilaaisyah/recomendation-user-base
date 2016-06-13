<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BlogRepository;

class VoteController extends Controller {

	/**
	 * The BlogRepository instance.
	 *
	 * @var App\Repositories\BlogRepository
	 */
	protected $blog_gestion;

	/**
	 * Create a new BlogController instance.
	 *
	 * @param  App\Repositories\BlogRepository $blog_gestion
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @return void
	*/
	public function __construct(
		BlogRepository $blog_gestion)
	{
		$this->blog_gestion = $blog_gestion;
		
		$this->middleware('ajax', ['only' => 'updateVote']);
	}

	/**
	 * Update "active" for the specified resource in storage.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function updateVote(
		Request $request,
		$id)
	{		
		$this->blog_gestion->updateVote($request->all(), $id, $request->user()->id);

		return response()->json();
	}

}
