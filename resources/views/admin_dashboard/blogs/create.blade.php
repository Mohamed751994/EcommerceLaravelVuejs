@extends('admin_dashboard.layout.master')
@section('Page_Title')   المقالات | إضافة   @endsection


@section('content')

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="breadcrumb d-flex align-items-center justify-content-between">
                <div class="">
                    <a class="text-dark" href="{{route('blogs.index')}}">المقالات</a>
                    <span class="mx-2">-</span>
                    <strong class="text-primary">إنشاء</strong>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="row g-3 mt-4">
                        <div class="col-12">
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">
                                    <form class="row g-3" id="validateForm" method="post" enctype="multipart/form-data"
                                    action="{{route('blogs.store')}}">
                                        @csrf
                                        @include('admin_dashboard.inputs.title')
                                        @include('admin_dashboard.inputs.slug')
                                        @include('admin_dashboard.inputs.short_description')
                                        @include('admin_dashboard.inputs.description')
                                        @include('admin_dashboard.inputs.image')
                                        @include('admin_dashboard.inputs.alt')
                                        @include('admin_dashboard.inputs.add_btn')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        $("#validateForm").validate({
            rules: {
                title: {
                    required: true,
                },
                slug_url: {
                    required: true,
                },
                image: {
                    required: true,
                },
                short_description: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: "الحقل مطلوب",
                },
                slug_url: {
                    required: "الحقل مطلوب",
                },

                image: {
                    required: "الحقل مطلوب",
                },
                short_description: {
                    required: "الحقل مطلوب",
                },

                description: {
                    required: "الحقل مطلوب",
                },

            }
        });
    });
</script>
@endpush
