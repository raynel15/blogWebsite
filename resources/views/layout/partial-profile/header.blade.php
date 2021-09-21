<header class="masthead">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    @if($user->profile_name == null && $user->profile_description == null && $user->profile_image == null)
                    <h1><a href = "#close" class='forum-title' name = "abc" data-toggle="modal" data-target="#usermodal" style="color:white">About Me</a></h1>
                    @else
                        <img src="{{url('/images/'.$user->profile_image)}}" alt="Image" style="height:150px;margin-top:-100px;border-radius:50%;">
                        <h3>{{$user->profile_name}}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
@if(\Session::has('success'))
    <script type="text/javascript">toastr.success('Changes saved Successfully!');</script>
@endif

@if(\Session::has('failed'))
    <script type="text/javascript">toastr.error('There might be something wrong with your input')</script>
@endif


<div class="modal fade" id="usermodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">About Me</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('upload')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <label>Profile Name</label>
                <input type="text" name="profile-name" class="form-control">
                <label>Description</label>
                <textarea name="profile-description" class="form-control" rows="4" cols="50"></textarea>
                <label>Profile Picture</label>
                <div class="col-md-12" style="margin-left:-8px">
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
