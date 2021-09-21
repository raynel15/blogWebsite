<header class="masthead">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Blogs</h1>
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
