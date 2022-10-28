@extends('layouts.admin.master')
@section('title', 'Dashboard')
@section('content')
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Form-->
        <form id="form_input" class="form">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Input Gallery</h3>
                    </div>
                </div>
                <div class="card-body p-5">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 text-center">
                        <!--begin::Label-->
                        <label class="d-block fw-semibold fs-6 mb-5">Photo</label>
                        <!--end::Label-->
                        <!--begin::Image input-->
                        <!--begin::Image input placeholder-->
                        <style>
                            .image-input-placeholder {
                                background-image: url({{ asset('admins/media/svg/files/blank-image.svg') }});
                            }

                            [data-theme="dark"] .image-input-placeholder {
                                background-image: url({{ asset('admins/media/svg/files/blank-image-dark.svg') }});
                            }
                        </style>
                        <!--end::Image input placeholder-->
                        <div class="image-input image-input-outline image-input-empty image-input-placeholder mb-3"
                            data-kt-image-input="true">
                            <!--begin::Preview existing avatar-->
                            @if ($slider->image)
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url({{ asset('images/slider/' . $slider->image) }})"></div>
                            @else
                                <div class="image-input-wrapper w-125px h-125px"></div>
                            @endif
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="image_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Title</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="title" class="form-control form-control-lg form-control-solid"
                            placeholder="Enter title" value="{{ $slider->title }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Description</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea name="description" class="form-control form-control-lg form-control-solid" placeholder="Enter description">{{ $slider->description }}</textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <a href="{{ route('admin.slider.index') }}" class="btn btn-light me-3">Cancel</a>
                        @if ($slider->id)
                            <button id="tombol_simpan" class="btn btn-primary"
                                onclick="handle_upload('#tombol_simpan', '#form_input', '{{ route('admin.slider.update', $slider->id) }}', 'PUT');">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        @else
                            <button id="tombol_simpan" class="btn btn-primary"
                                onclick="handle_upload('#tombol_simpan', '#form_input', '{{ route('admin.slider.store') }}', 'POST');">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        @endif
                    </div>
                    <!--end::Actions-->
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Container-->
@endsection
@section('scripts')
    <script>
        $('#date').flatpickr();
    </script>
@endsection
