<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use Alert;
use Image;
use File;
// import the Intervention Image Manager Class
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->can('Show Posts')){
        if(Auth()->user()->hasrole('Admin'))
        {
        $posts = Post::paginate(5);
        return view('Admin-lte.blog.post.index',compact('posts'));
        }
        $posts = Post::where('author_id', Auth()->user()->id)->paginate(5);
        return view('Admin-lte.blog.post.index',compact('posts'));
    }
    return view('errors.401');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth()->user()->can('Add Post')){
        if(Auth()->user()->hasrole('Admin')){
        $users = User::all();
        $categories = Category::all();
        return view('Admin-lte.blog.post.create', compact('users', 'categories'));
    }
        $users = User::where('id', Auth()->user()->id)->get();
        $categories = Category::all();
        return view('Admin-lte.blog.post.create', compact('users', 'categories'));
    }   
        return view('errors.401');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth()->user()->can('Add Post')){
            $request->validate([
                'Author_name'=>'required',
                'Title'=>'required',
                'Slug'=>'required',
                'Excerpt'=>'required',
                'Body'=>'required',
                'profile_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'Category_Name'=>'required',
                'Popularity'=>'required',
            ]);
    
            $post = new Post([
                'author_id' => $request->get('Author_name'),
                'title' => $request->get('Title'),
                'slug' => $request->get('Slug'),
                'excerpt' => $request->get('Excerpt'),
                'body' => $request->get('Body'),
                'image' =>$request->file('profile_image'),
                'category_id' => $request->get('Category_Name'),
                'view_count' => $request->get('Popularity')
                ]);
                $originalImage= $request->file('profile_image');
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = public_path().'/thumbnail/';
                $originalPath = public_path().'/images/';
                $post->image=time().$originalImage->getClientOriginalName();
                $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
                $thumbnailImage->resize(150,150);
                $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 
        
                
              

                $message=$request->input('Body');
                
                $dom = new \DomDocument();
                libxml_use_internal_errors(true);
                $dom->loadHtml('<?xml encoding="UTF-8">'. $message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);   
                libxml_use_internal_errors(false); 
                $images = $dom->getElementsByTagName('img');
            // foreach <img> in the submited message
                foreach($images as $img){
                    $src = $img->getAttribute('src');
                    
                    // if the img source is 'data-url'
                    if(preg_match('/data:image/', $src)){                
                        // get the mimetype
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];                
                        // Generating a random filename
                        $filename = uniqid();
                        $filepath = "/summernoteimages/$filename.$mimetype";    
                        // @see http://image.intervention.io/api/
                        $image = Image::make($src)
                        // resize if required
                        /* ->resize(300, 200) */
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save(public_path($filepath));                
                        $new_src = asset($filepath);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $new_src);
                    } // <!--endif
                } // <!-
                $post->body = $dom->saveHTML();
            Alert::image($post->title,'Post saved successfully!',"/images/".$post->image,150,150);
            $post->save();
            return redirect('/admin/adminpost');
        }
        return view('errors.401');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth()->user()->can('Edit Post')){
            $post = Post::find($id);
            $users = User::find(auth()->user());
            $categories = Category::all();
            return view('Admin-lte.blog.post.edit',compact('post','users', 'categories'));
        }
        return view('errors.401');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth()->user()->can('Edit Post')){
            $request->validate([
                'Author_name'=>'required',
                'Title'=>'required',
                'Slug'=>'required',
                'Excerpt'=>'required',
                'Body'=>'required',
                'profile_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'Category_Name'=>'required',
                'Popularity'=>'required',
            ]);
            $post = Post::find($id);    
            $post->author_id =  $request->get('Author_name');
            $post->title = $request->get('Title');
            $post->slug = $request->get('Slug');
            $post->excerpt = $request->get('Excerpt');
            $post->category_id = $request->get('Category_Name');
            $post->view_count = $request->get('Popularity');
            
    


            
            
                $originalImage= $request->file('profile_image');
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = public_path().'/thumbnail/';
                $originalPath = public_path().'/images/';
                $post->image=time().$originalImage->getClientOriginalName();
                $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
                $thumbnailImage->resize(150,150);
                $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 
        
                
              

                $message=$request->input('Body');
                
                $dom = new \DomDocument();
                libxml_use_internal_errors(true);
                $dom->loadHtml('<?xml encoding="UTF-8">'. $message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
                libxml_use_internal_errors(false);
                $images = $dom->getElementsByTagName('img');
            // foreach <img> in the submited message
                foreach($images as $img){
                    $src = $img->getAttribute('src');
                    
                    // if the img source is 'data-url'
                    if(preg_match('/data:image/', $src)){                
                        // get the mimetype
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];                
                        // Generating a random filename
                        $filename = uniqid();
                        $filepath = "/summernoteimages/$filename.$mimetype";    
                        // @see http://image.intervention.io/api/
                        $image = Image::make($src)
                        // resize if required
                        /* ->resize(300, 200) */
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save(public_path($filepath));                
                        $new_src = asset($filepath);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $new_src);
                    } // <!--endif
                } // <!-
                $post->body = $dom->saveHTML();
            $post->save();
            Alert::image($post->title,'Post updated successfully!',"/images/".$post->image,150,150);
            return redirect('/admin/adminpost');
        }
        return view('errors.401');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth()->user()->can('Delete Post')){
            $post = Post::findOrFail($id);
            $post->delete();
            Alert::success('Success', 'Post has been deleted');
            return redirect()->back();
        }
        return view('errors.401');
        }
    }

