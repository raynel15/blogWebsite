@extends('layout.profile-layout')

@section('content')
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {{$user->profile_description}}
                </div>
            </div>
            <div class="d-flex justify-content-end mb-4"><a href="{{url('myblogs/'.$user->profile_name)}}" class="btn bg-gradient-primary btn-sm">My Blogs</a> </div>
        </div>

    </main>


@endsection






<b></b>
