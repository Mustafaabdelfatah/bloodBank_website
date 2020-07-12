<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Storage;

use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(20);
        return view('dashboard.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('dashboard.posts.create',compact('categories'));
    }


    public function store(Request $request)
    {

       // $file_extention = $request->images->getClientOriginalExtension();

        //$file_name = time().$file_extention;



        //$request->photo->move('images/post',$file_name);
        //return 'ok';

        //$rules      = $this->getRules();
        //$messages   = $this->getMessage();

        //$this->validate($request,$rules,$messages);
       /* Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'title'=>$request->category_id,
        ]);*/

        $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'category_id'=> 'required',

        ]);
        $posts= $request->except('image');
        if($request->image){

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
        })->save(public_path('images/posts/'.$request->image->hashName()));

        $posts['image'] = $request->image->hashName();
        }


        $post = Post::create($posts);


        return redirect()->route('dashboard.posts.index')
                         ->with('success','Item created successfully');
    }




    public function edit($id)
    {

        $posts =Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->toArray();



        return view('dashboard.posts.edit',compact('posts','categories'));

    }


    public function update(Request $request, $id)
    {
        $posts = Post::find($id);

       $this->validate($request, array(
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',

        ));
        $request_data = $request->except('image');

        if($request->image){
            if($posts->image != 'default.png'){

                Storage::disk('public_uploads')->delete('/posts/'. $posts->image);

            }

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
        })->save(public_path('images/posts/'.$request->image->hashName()));
        $request_data['image'] = $request->image->hashName();
        }
        $posts->update($request_data);
        return redirect()->route('dashboard.posts.index')
                         ->with('success','Item updated successfully');
    }
    public function destroy(Post $post)
    {
        if($post->image != 'default.png'){

            Storage::disk('public_uploads')->delete('/posts/'. $post->image);
        }
        $post->delete();
        return redirect()->route('dashboard.posts.index')
        ->with('success','Item deleted successfully');
    }
    protected function getRules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ];
    }
    protected function getMessage()
    {

        return [
            'title.required'              => trans('site.title'),
            'content.required'              => trans('site.content'),
            'images.required'              => trans('site.images'),
            'category_id.required'              => trans('site.category_id'),
        ];
    }

}
