<?php

namespace Pdusan\SimpleBlog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pdusan\SimpleBlog\Http\Requests\SBlogPostRequest;
use Pdusan\SimpleBlog\Models\SBlogPost;

use Pdusan\SimpleBlog\Services\SBlogCategoryService;

class SBlogPostController extends SBlogBaseController
{
    public function index()
    {
        $posts = SBlogPost::with('user')->paginate($this->per_page);
        return view("{$this->view_prefix}posts.index", ['posts'=>$posts]);
    }

    public function create()
    {
        $categories = SBlogCategoryService::getAllCategory();
        return view("{$this->view_prefix}posts.create", ['categories'=>$categories]);
    }

    public function store(SBlogPostRequest $request)
    {
        $validateMesaages = [];
        $post_model = new SBlogPost();
        $post_model->title = $request->input("title");
        $post_model->body = $request->input("body");
        $post_model->category_id = $request->input("category_id");
        $post_model->tags = $request->input("tags");
        $post_model->user_id = Auth::user()->id;
        if($post_model->save()) {
            $request->session()->flash('success', 'Post has been created successfully');
            return redirect()->route('sblog.post.index');
        }
        return redirect()->back()->withErrors($validateMesaages)->withInput($request->all());
    }

    public function edit($id)
    {
        //$this->authorize('update', SBlogPost::class);

        $categories = SBlogCategoryService::getAllCategory();
        $post = SBlogPost::find($id);
        return view("{$this->view_prefix}posts.edit", ['post'=>$post, 'categories'=>$categories]);
    }

    public function update(SBlogPostRequest $request, $id)
    {
        //$this->authorize('update', SBlogPost::class);

        $validateMesaages = [];
        $post_model = SBlogPost::find($id);
        $post_model->title = $request->input("title");
        $post_model->body = $request->input("body");
        $post_model->category_id = $request->input("category_id");
        $post_model->tags = $request->input("tags");
        if($post_model->save()) {
            $request->session()->flash('success', 'Post has been created successfully');
            return redirect()->route('sblog.post.index');
        }
        return redirect()->back()->withErrors($validateMesaages)->withInput($request->all());
    }

    public function show($id)
    {
        $categories = SBlogCategoryService::getAllCategory();
        $post = SBlogPost::with('comments')->find($id);
        return view("{$this->view_prefix}posts.show", ['post'=>$post, 'categories'=>$categories]);
    }

    public function destroy(Request $request, $id)
    {
        $model = SBlogPost::find($id);
        $this->authorize('delete', $model);
        $model->delete();
        $request->session()->flash('success', 'Post has been deleted successfully');
        return redirect()->route('sblog.post.index');
    }
}
