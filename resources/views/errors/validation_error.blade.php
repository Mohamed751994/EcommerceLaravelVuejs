<!-- Errors -->
@if ($errors->any())
    <div class="div_errors">
        @foreach ($errors->all() as $error)
            <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="text-danger">{{$error}}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    </div>
@endif

<!-- Error -->
@if (Session::has('error'))
    <div class="div_errors">
        <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-danger">{{Session::get('error')}}</div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- end -->
<!-- Error -->
@if (Session::has('success'))
    <div class="div_success">
        <div class="alert border-0 bg-light-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-success"><i class="bi bi-x-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-success">{{Session::get('success')}}</div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- end -->
