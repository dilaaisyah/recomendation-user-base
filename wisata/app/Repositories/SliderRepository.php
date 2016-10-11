<?php namespace App\Repositories;

use App\Models\Slider;
use Validator;

class SliderRepository extends BaseRepository {

    /**
     * The Slider instance.
     *
     * @var App\Models\Slider
     */
    protected $slider;

    /**
     * Create a new SliderRepository instance.
     *
     * @param  App\Models\Slider $slider
     * @return void
     */
    public function __construct(
    Slider $slider) 
    {
        $this->model = $slider;
    }

    public function uploadImage($input_image){
        $file = array('image' => $input_image);
        // setting up rules
        // mimes:jpeg,bmp,png and for max size max:10000
        $rules = array('mimes' => 'jpeg,bmp,png', 'max' => '10000' ); 
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        
        if (!$validator->fails()) {
            // checking file is valid.
            if ($input_image->isValid()) {
              $destinationPath = 'filemanager/userfiles/slider'; // upload path
              $extension = $input_image->getClientOriginalExtension(); // getting image extension
              $fileName = rand(11111,99999).'.'.$extension; // renameing image
              $input_image->move($destinationPath, $fileName); // uploading file to given path
              return $fileName;
            }else return '';
        }else return '';
    }

    /**
     * Create or update a slider.
     *
     * @param  App\Models\Slider $slider
     * @param  array  $inputs
     * @return App\Models\Slider
     */
    private function savePost($slider, $inputs, $user_id = null)
    {
        if(array_key_exists('thumbnail', $inputs) && $inputs['thumbnail']!=""){
            $thumb_name = $this->uploadImage($inputs['thumbnail']);
            $slider->thumbnail = $thumb_name;
        }

        $slider->title = $inputs['title'];
        $slider->content = $inputs['content'];
        $slider->active = isset($inputs['active']);
        $slider->save();

        return $slider;
    }

    /**
     * Create a query for Slider.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    private function queryActiveWithUserOrderByDate()
    {
        return $this->model
            ->select('id', 'created_at', 'updated_at', 'title', 'content','thumbnail')
                        ->whereActive(true)
                        ->latest();
    }

    /**
     * Get slider collection.
     *
     * @param  int  $n
     * @return Illuminate\Support\Collection
     */
    public function indexFront($n)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->paginate($n);
    }

    /**
     * Get slider collection.
     *
     * @param  int     $n
     * @param  string  $orderby
     * @param  string  $direction
     * @return Illuminate\Support\Collection
     */
    public function index($n, $orderby = 'created_at', $direction = 'desc')
    {
        $query = $this->model
                ->select('id', 'created_at', 'title', 'seen', 'active')
                ->orderBy($orderby, $direction);

        return $query->paginate($n);
    }

    /**
     * Get post collection.
     *
     * @return array
     */
    public function show($id)
    {
        $post = $this->model->whereId($id)->firstOrFail();

        return compact('post');
    }

    /**
     * Get slider collection.
     *
     * @param  App\Models\Slider $slider
     * @return array
     */
    public function edit($slider)
    {
        return compact('slider');
    }

    /**
     * Update a slider.
     *
     * @param  array  $inputs
     * @param  App\Models\Slider $slider
     * @return void
     */
    public function update($inputs, $slider)
    {
        $slider = $this->savePost($slider, $inputs);
    }

    /**
     * Update "seen" in slider.
     *
     * @param  array  $inputs
     * @param  int    $id
     * @return void
     */
    public function updateSeen($inputs, $id)
    {
        $slider = $this->getById($id);

        $slider->seen = $inputs['seen'] == 'true';

        $slider->save();
    }

    /**
     * Update "active" in slider.
     *
     * @param  array  $inputs
     * @param  int    $id
     * @return void
     */
    public function updateActive($inputs, $id)
    {
        $slider = $this->getById($id);

        $slider->active = $inputs['active'] == 'true';

        $slider->save();
    }

    /**
     * Create a slider.
     *
     * @param  array  $inputs
     * @return void
     */
    public function store($inputs)
    {
        $slider = $this->savePost(new $this->model, $inputs);
    }

    /**
     * Destroy a slider.
     *
     * @param  App\Models\Slider $slider
     * @return void
     */
    public function destroy($slider) {
        $slider->delete();
    }

}
