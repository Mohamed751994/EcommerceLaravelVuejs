@extends('admin_dashboard.layout.master')
@section('Page_Title')   المنتجات | تعديل   @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="breadcrumb d-flex align-items-center justify-content-between">
                <div class="">
                    <a class="text-dark" href="{{route('products.index')}}">المنتجات</a>
                    <span class="mx-2">-</span>
                    <strong class="text-primary">تعديل</strong>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row g-3 mt-4">
                        <div class="col-12">
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">
                                    <form class="row g-3" id="validateForm" method="post" enctype="multipart/form-data"
                                          action="{{route('products.update', $content->id)}}">
                                        @method('put')
                                        @csrf
                                        <div class="col-12">
                                            <label class="form-label"> القسم  <span class="text-danger">*</span>  </label>
                                            <select class="form-control form-select" required name="category_id">
                                                <option value="">اختر القسم</option>
                                                @foreach($categories as $key =>$val)
                                                    <option @selected($content->category_id == $val) value="{{$val}}">{{$key}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @include('admin_dashboard.inputs.edit_name')
                                        <div class="col-12">
                                            <label class="form-label"> المقاس <span class="text-danger">*</span>  </label>
                                            <input type="text" name="size" class="form-control" value="{{$content->size}}" required placeholder="ادخل المقاس">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label"> عنوان رابط الصفحة ( Slug )  <span class="text-danger">*</span>  </label>
                                            <input type="text" name="slug" value="{{$content->slug}}" class="form-control" required placeholder="ادخل عنوان رابط الصفحة">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">  سعر الحبة (ر.س) <span class="text-danger">*</span> </label>
                                            <input type="number" min="0" name="price" value="{{$content->price}}" class="form-control" required placeholder="ادخل سعر العنصر">
                                        </div>
                                        @include('admin_dashboard.inputs.edit_description')
                                        @include('admin_dashboard.inputs.edit_image')
                                        @include('admin_dashboard.inputs.edit_alt')
                                        @include('admin_dashboard.inputs.edit_btn')
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
                    category_id: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    slug: {
                        required: true,
                    },
                    size: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    category_id: {
                        required: "الحقل مطلوب",
                    },
                    name: {
                        required: "الحقل مطلوب",
                    },
                    slug: {
                        required: "الحقل مطلوب",
                    },
                    price: {
                        required: "الحقل مطلوب",
                    },
                    size: {
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
