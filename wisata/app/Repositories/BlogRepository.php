<?php

namespace App\Repositories;

use App\Models\Post,
    App\Models\Tag,
    App\Models\Comment,
    App\Models\PostVote;
use Validator;

class BlogRepository extends BaseRepository {

    /**
     * The Tag instance.
     *
     * @var App\Models\Tag
     */
    protected $tag;

    /**
     * The Comment instance.
     *
     * @var App\Models\Comment
     */
    protected $comment;

    /**
     * The Comment instance.
     *
     * @var App\Models\PostVote
     */
    protected $vote;

    /**
     * Create a new BlogRepository instance.
     *
     * @param  App\Models\Post $post
     * @param  App\Models\Tag $tag
     * @param  App\Models\Comment $comment
     * @return void
     */
    public function __construct(
    Post $post, Tag $tag, Comment $comment, PostVote $vote) 
    {
        $this->model = $post;
        $this->tag = $tag;
        $this->comment = $comment;
        $this->vote = $vote;
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
              $destinationPath = 'filemanager\userfiles\thumbnail'; // upload path
              $extension = $input_image->getClientOriginalExtension(); // getting image extension
              $fileName = rand(11111,99999).'.'.$extension; // renameing image
              $input_image->move($destinationPath, $fileName); // uploading file to given path
              return $fileName;
            }else return '';
        }else return '';
    }

    /**
     * Create or update a post.
     *
     * @param  App\Models\Post $post
     * @param  array  $inputs
     * @param  bool   $user_id
     * @return App\Models\Post
     */
    private function savePost($post, $inputs, $user_id = null)
    {
        if(array_key_exists('thumbnail', $inputs) && $inputs['thumbnail']!=""){
            $thumb_name = $this->uploadImage($inputs['thumbnail']);
            $post->thumbnail = $thumb_name;
        }

        $post->title = $inputs['title'];
        $post->summary = $inputs['summary'];
        $post->content = $inputs['content'];
        $post->slug = $inputs['slug'];
        $post->wisata_type = $inputs['wisata_type'];
        $post->active = isset($inputs['active']);
        if ($user_id) {
            $post->user_id = $user_id;
        }
        $post->save();

        return $post;
    }

    /**
     * Create a query for Post.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    private function queryActiveWithUserOrderByDate()
    {
        return $this->model
            ->select('id', 'created_at', 'updated_at', 'title', 'slug', 'user_id', 'summary', 'thumbnail', 'wisata_type', 'vote')
                        ->whereActive(true)
                        ->with('user')
                        ->latest();
    }

    /**
     * Get post collection.
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
     * Get post collection.
     *
     * @param  int  $n
     * @param  int  $id
     * @return Illuminate\Support\Collection
     */
    public function indexTag($n, $id)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->whereHas('tags', function($q) use($id) {
                            $q->where('tags.id', $id);
                        })
                        ->paginate($n);
    }

    /**
     * Get search collection.
     *
     * @param  int  $n
     * @param  string  $search
     * @return Illuminate\Support\Collection
     */
    public function search($n, $search)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->where(function($q) use ($search) {
                    $q->where('summary', 'like', "%$search%")
                            ->orWhere('content', 'like', "%$search%")
                            ->orWhere('title', 'like', "%$search%");
                })->paginate($n);
    }


    /**
     * Get search collection.
     *
     * @param  int  $n
     * @param  string  $category
     * @return Illuminate\Support\Collection
     */
    public function category($n, $category)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->where(function($q) use ($category) {
                    $q->where('wisata_type', '=', "$category");
                })->paginate($n);
    }

    /**
     * Get post collection.
     *
     * @param  int     $n
     * @param  int     $user_id
     * @param  string  $orderby
     * @param  string  $direction
     * @return Illuminate\Support\Collection
     */
    public function index($n, $user_id = null, $orderby = 'created_at', $direction = 'desc')
    {
        $query = $this->model
                ->select('posts.id', 'posts.created_at', 'title', 'posts.seen', 'active', 'user_id', 'slug', 'username')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->orderBy($orderby, $direction);

        if ($user_id) {
            $query->where('user_id', $user_id);
        }

        return $query->paginate($n);
    }

    /**
     * Get post collection.
     *
     * @param  int     $n
     * @param  string  $direction
     * @return Illuminate\Support\Collection
     */
    public function popular($n, $direction = 'desc')
    {
        $query = $this->model
                ->selectRaw('posts.*, count(comments.post_id) as comment')
                ->join('comments', 'posts.id', '=', 'comments.post_id')
                ->groupBy('comments.post_id')
                ->with('user')
                ->orderBy('comment', $direction);

        return $query->paginate($n);
    }

    /**
     * Get post collection.
     *
     * @param  int     $n
     * @param  string  $orderby
     * @param  string  $direction
     * @return Illuminate\Support\Collection
     */
    public function recent($n)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->paginate($n);
    }


    public function get_voted_posts()
    {
        $query = $this->vote
                ->selectRaw('post_vote. *')
                ->join('posts', 'posts.id', '=', 'post_id')
                ->get();

        return $query;
    }

    public function getRecommendations($preferences, $person)
    {
        $total = array();
        $simSums = array();
        $ranks = array();
        $sim = 0;

        // echo "<pre>";print_r($preferences);echo "</pre>";
        
        foreach($preferences as $otherPerson=>$values){
            if($otherPerson != $person){
                $sim = $this->similarityDistance($preferences, $person, $otherPerson);
            }
            
            if($sim > 0){
                foreach($preferences[$otherPerson] as $key=>$value){
                    if(!array_key_exists($key, $preferences[$person])){
                        if(!array_key_exists($key, $total)) {
                            $total[$key] = 0;
                        }
                        // echo "rating ".$key."= ".$preferences[$otherPerson][$key]." ";
                        $total[$key] += $preferences[$otherPerson][$key] * $sim;
                        // echo "total= ".$total[$key]." ";
                        if(!array_key_exists($key, $simSums)){
                            $simSums[$key] = 0;
                        }
                        $simSums[$key] += $sim;
                        // echo "simsum= ".$sim."<br>";
                    }
                }    
            }
        }
        foreach($total as $key=>$value){
            $ranks[$key] = $value / $simSums[$key];
            // echo "rank= ".$ranks[$key]." ";
        }    
        arsort($ranks);
        return $ranks;
    }

    public function similarityDistance($preferences, $person1, $person2)
    {
        $similar = array();
        $sum = 0;
        
        // echo "<br><br>".$person1.' '.$person2;
        // echo "<br>"; 

        foreach($preferences[$person1] as $key=>$value){
            if(array_key_exists($key, $preferences[$person2]))
                $similar[$key] = 1;
        }

        // echo "<pre>";print_r($similar);echo "</pre>";
        // echo "<br>"; 
        
        if(count($similar) == 0){
            return 0;
        }
        
        foreach($preferences[$person1] as $key=>$value){
            if(array_key_exists($key, $preferences[$person2])){
                // echo 'key '.$key.' '.$person1.'= '.$value.' '.$person2.'= '.$preferences[$person2][$key].'<br>';
                $sum = $sum + pow($value - $preferences[$person2][$key], 2);
            }
        }

        $result = 1/(1 + sqrt($sum));

        // echo "sum= ".$sum." result= ".$result."<br><br>";
        
        return  $result;     
    }


    public function getRecommendationsPost($ranks_result, $n)
    {   
        $post_id = '';
        foreach ($ranks_result as $key => $value) {
            $post_id .= $key."  ,";
        }
        $post_id = substr($post_id, 0, -1);
        
        $query = $this->model
                ->select('id', 'created_at', 'updated_at', 'title', 'slug', 'user_id', 'summary', 'thumbnail', 'wisata_type', 'vote')
                        ->whereRaw("id IN ($post_id)")
                        ->whereActive(true)
                        ->orderByRaw("FIELD(id , $post_id) ASC")
                        ->with('user');

        return $query->paginate($n);
    }

    /**
     * Get post collection.
     *
     * @param  string  $slug
     * @return array
     */
    public function show($slug, $user_id = '')
    {
        $post = $this->model->with('user', 'tags')->whereSlug($slug)->firstOrFail();

        $comments = $this->comment
                ->wherePost_id($post->id)
                ->with('user')
                ->whereHas('user', function($q) {
                    $q->whereValid(true);
                })
                ->get();

        if($user_id != ''){
            $vote = $this->vote
                         ->where('post_id', $post->id)
                         ->where('user_id', $user_id)
                         ->first();
        }else { $vote = ''; }

        return compact('post', 'comments', 'vote');
    }

    /**
     * Get post collection.
     *
     * @param  App\Models\Post $post
     * @return array
     */
    public function edit($post)
    {
        $tags = [];

        foreach ($post->tags as $tag) {
            array_push($tags, $tag->tag);
        }

        return compact('post', 'tags');
    }

    /**
     * Get post collection.
     *
     * @param  int  $id
     * @return array
     */
    public function GetByIdWithTags($id)
    {
        return $this->model->with('tags')->findOrFail($id);
    }

    /**
     * Update a post.
     *
     * @param  array  $inputs
     * @param  App\Models\Post $post
     * @return void
     */
    public function update($inputs, $post)
    {
        $post = $this->savePost($post, $inputs);
        
        // Tag gestion
        $tags_id = [];
        if (array_key_exists('tags', $inputs) && $inputs['tags'] != '') {

            $tags = explode(',', $inputs['tags']);

            foreach ($tags as $tag) {
                $tag_ref = $this->tag->whereTag($tag)->first();
                if (is_null($tag_ref)) {
                    $tag_ref = new $this->tag();
                    $tag_ref->tag = $tag;
                    $tag_ref->save();
                }
                array_push($tags_id, $tag_ref->id);
            }
        }

        $post->tags()->sync($tags_id);
    }

    /**
     * Update "seen" in post.
     *
     * @param  array  $inputs
     * @param  int    $id
     * @return void
     */
    public function updateSeen($inputs, $id)
    {
        $post = $this->getById($id);

        $post->seen = $inputs['seen'] == 'true';

        $post->save();
    }

    /**
     * Update "active" in post.
     *
     * @param  array  $inputs
     * @param  int    $id
     * @return void
     */
    public function updateActive($inputs, $id)
    {
        $post = $this->getById($id);

        $post->active = $inputs['active'] == 'true';

        $post->save();
    }

    /**
     * Update "active" in post.
     *
     * @param  int  $user
     * @param  int    $id
     * @return void
     */
    public function updateVote($inputs, $id, $user)
    {
        $get_vote = $this->vote
                         ->where('post_id', $id)
                         ->where('user_id', $user)
                         ->first();

        if($get_vote){
            $set_vote = $get_vote;
            $set_vote->post_id = $id;       
            $set_vote->user_id = $user;       
            $set_vote->vote = $inputs['vote'];
            $set_vote->save();
        }else{
            $set_vote = new $this->vote();
            $set_vote->post_id = $id;       
            $set_vote->user_id = $user;       
            $set_vote->vote = $inputs['vote'];
            $set_vote->save();
        }
    }

    /**
     * Create a post.
     *
     * @param  array  $inputs
     * @param  int    $user_id
     * @return void
     */
    public function store($inputs, $user_id)
    {
        $post = $this->savePost(new $this->model, $inputs, $user_id);

        // Tags gestion
        if (array_key_exists('tags', $inputs) && $inputs['tags'] != '') {

            $tags = explode(',', $inputs['tags']);

            foreach ($tags as $tag) {
                $tag_ref = $this->tag->whereTag($tag)->first();
                if (is_null($tag_ref)) {
                    $tag_ref = new $this->tag();
                    $tag_ref->tag = $tag;
                    $post->tags()->save($tag_ref);
                } else {
                    $post->tags()->attach($tag_ref->id);
                }
            }
        }

        // Maybe purge orphan tags...
    }

    /**
     * Destroy a post.
     *
     * @param  App\Models\Post $post
     * @return void
     */
    public function destroy($post) {
        $post->tags()->detach();

        $post->delete();
    }

    /**
     * Get post slug.
     *
     * @param  int  $comment_id
     * @return string
     */
    public function getSlug($comment_id)
    {
        return $this->comment->findOrFail($comment_id)->post->slug;
    }

    /**
     * Get tag name by id.
     *
     * @param  int  $tag_id
     * @return string
     */
    public function getTagById($tag_id)
    {
        return $this->tag->findOrFail($tag_id)->tag;
    }

}
