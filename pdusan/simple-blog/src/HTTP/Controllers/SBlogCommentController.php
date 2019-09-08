<?php

namespace Pdusan\SimpleBlog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pdusan\SimpleBlog\Http\Requests\SBlogCommentRequest;
use Pdusan\SimpleBlog\Models\SBlogComment;

class SBlogCommentController extends SBlogBaseController
{

    public function store(SBlogCommentRequest $request, $post_id)
    {
        $validateMesaages = [];
        $comment_model = new SBlogComment();
        $comment_model->title = $request->input("title");
        $comment_model->body = $request->input("body");
        $comment_model->post_id = $post_id;
        $comment_model->user_id = Auth::user()->id;;
        if($comment_model->save()) {
            $request->session()->flash('success', 'Comment has been created successfully');
            return redirect()->route('sblog.post.show', ['id'=>$post_id]);
        }
        return redirect()->back()->withErrors($validateMesaages)->withInput($request->all());
    }

    public function destroy(Request $request, $post_id, $id)
    {
        $model = SBlogComment::find($id);
        $model->delete();
        $request->session()->flash('success', 'Comment has been deleted successfully');
        return redirect()->route('sblog.post.show', ['id'=>$post_id]);
    }
}
