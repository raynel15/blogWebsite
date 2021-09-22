@extends('layout.blogs-layout')

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->

                    @foreach($getBlogs as $showBlog)
                        <div class="post-preview">
                            <a href="{{url('blogpage/'.$showBlog->id)}}">
                                <h2 class="post-title"> {{$showBlog->blog_title}}</h2>
                            </a>
                            <p class="post-meta">
                                Posted by
                                <a href="{{url('userprofile/'.$showBlog->blog_poster)}}">{{$showBlog->blog_poster}}</a>
                                on {{date("F j, Y", strtotime($showBlog->blog_created))}}
                            </p>
                        </div>

                        <!-- Divider-->
                        <hr class="my-4" />
                @endforeach



                <!-- Pager-->
            </div>
        </div>
    </div>

@endsection






<b></b>
