@extends(config('sblog.config_namespace') . '::layouts.sblog', ['title'=>"Blog List"])

@section('content')
    <section class="section">
        <div class="container">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">
                                    <a href="{{ route(config('sblog.route_name_prefix') . '.blog.show'), ['id'=>$post->id] }}"></a>
                                </p>
                            </div>
                        </div>
                        <div class="content">
                            {{ $post->content }}
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection