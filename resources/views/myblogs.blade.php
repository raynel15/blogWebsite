@extends('layout.myblogs-layout')

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach($myBlogs as $show)

                    <div class="post-preview">
                        <a href="{{url('blogpage/'.$show->id)}}">
                            <h2 class="post-title"> {{$show->blog_title}}</h2>
                        </a>
                        <p class="post-meta">
                            <a href="#" data-toggle="modal" data-target="#edit-{{$show->id}}" >Edit</a>
                            <a href="#" data-toggle="modal" data-target="#delete-{{$show->id}}" style="color: red">Delete</a>
                        </p>
                    </div>
                    <div class="modal fade" id="edit-{{$show->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Write your own Blog!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{url('myblogs/edit')}}">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="hidden" name="blog-id" value="{{$show->id}}">
                                        <label>Blog Title</label>
                                        <input type="text" name="blog-title" class="form-control" value="{{$show->blog_title}}">
                                        <label>Blog Description</label>
                                        <textarea name="blog-description" class="form-control" rows="4" cols="50"> {{$show->blog_description}}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="delete-{{$show->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete this Blog?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{url('myblogs/delete')}}">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="hidden" name="blog-id" value="{{$show->id}}">
                                        <label>Blog Title</label>
                                        <input type="text" name="blog-title" class="form-control" value="{{$show->blog_title}}">
                                        <label>Blog Description</label>
                                        <textarea name="blog-description" class="form-control" rows="4" cols="50"> {{$show->blog_description}}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" >Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />

            @endforeach
                <div class="d-flex justify-content-end mb-4"><button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#create-blog" >Create Blog </button></div>
                <div class="modal fade" id="create-blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Write your own Blog!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{url('blogupload')}}">
                                <div class="modal-body">
                                    @csrf
                                    <label>Blog Title</label>
                                    <input type="text" name="blog-title" class="form-control">
                                    <label>Blog Description</label>
                                    <textarea name="blog-description" class="form-control" rows="4" cols="50"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            <!-- Pager-->
            </div>
        </div>
    </div>
@endsection






<b></b>
