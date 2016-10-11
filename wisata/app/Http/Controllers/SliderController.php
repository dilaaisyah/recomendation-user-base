<?php namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use App\Repositories\SliderRepository;
use App\Repositories\BlogRepository;

class SliderController extends Controller {

	/**
	 * The SliderRepository instance.
	 *
	 * @var App\Repositories\SliderRepository
	 */
	protected $slider_gestion;
	
	/**
	 * The BlogRepository instance.
	 *
	 * @var App\Repositories\BlogRepository
	 */
	protected $blog_gestion;

	/**
	 * Create a new SliderController instance.
	 *
	 * @param  App\Repositories\SliderRepository $slider_gestion
	 * @return void
	 */
	public function __construct(
		SliderRepository $slider_gestion,
		BlogRepository $blog_gestion)
	{
		$this->slider_gestion = $slider_gestion;
		$this->blog_gestion = $blog_gestion;

		$this->middleware('admin', ['except' => ['store', 'update', 'destroy']]);
		$this->middleware('ajax', ['only' => ['updateSeen', 'updateActive']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sliders = $this->slider_gestion->index(5);
		$links = $sliders->render();

		return view('back.slider.index', compact('sliders', 'links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$url = config('medias.url');

		return view('back.slider.create')->with(compact('url'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\requests\SliderRequest $request
	 * @return Response
	 */
	public function store(
		SliderRequest $request)
	{
		$this->slider_gestion->store($request->all(), $request->user()->id);

		return redirect('slider')->with('ok', trans('back/blog.stored'));
	}		

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$get_tags = $this->blog_gestion->get_tags();

		return view('front.ads.show',  array_merge($this->slider_gestion->show($id), compact('get_tags')));
	}

	/**
	 * Update "seen" in the specified resource in storage.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function updateSeen(
		Request $request, 
		$id)
	{
		$this->slider_gestion->updateSeen($request->all(), $id);

		return response()->json();
	}

	/**
	 * Update "active" for the specified resource in storage.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function updateActive(
		Request $request, 
		$id)
	{
		$post = $this->slider_gestion->getById($id);

		// $this->authorize('change', $post);
		
		$this->slider_gestion->updateActive($request->all(), $id);

		return response()->json();
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$slider = $this->slider_gestion->getById($id);

		// $this->authorize('change', $slider);

		$url = config('medias.url');

		return view('back.slider.edit',  array_merge($this->slider_gestion->edit($slider), compact('url')));
	}

	/*
	 * Update the specified resource in storage.
	 *
	 * @param  App\requests\SliderRequest $request
	 * @param  int  $id
	 * @return Response */	 
	public function update(
		SliderRequest $request, 
		$id)
	{		
		$slider = $this->slider_gestion->getById($id);

		// $this->authorize('change', $slider);

		$this->slider_gestion->update($request->all(), $slider);

		return redirect('slider')->with('ok', trans('back/blog.updated'));	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$slider = $this->slider_gestion->getById($id);

		// $this->authorize('change', $slider);

		$this->slider_gestion->destroy($slider);

		return redirect('slider')->with('ok', trans('back/blog.destroyed'));
	}

}
