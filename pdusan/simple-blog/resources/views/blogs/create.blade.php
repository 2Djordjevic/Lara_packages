@extends(config('sblog.config_namespace') . '::layouts.sblog', ['title'=>"Create New Post"])

@section('content')
    <div class="section">
    <form id="frm_new_post" action="{{ route(config('sblog.route_name_prefix') . '.blog.store') }}" method="POST">
        @csrf
        <div class="field">
            <div class="control">
                <label class="string optional label" for="title">Title</label>
                <input class="string optional input" type="text" name="title" id="title">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <label class="text optional label" for="content">Content</label>
                <textarea class="text optional textarea" name="content" id="content"></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="string optional label" for="tags">Tags</label>
                <input class="string optional input" type="text" name="tags" id="tags">
            </div>
        </div>
        <input type="submit" name="commit" value="Create Post" class="btn button is-primary" data-disable-with="Create Post">
    </form>
  </div>
  @endsection