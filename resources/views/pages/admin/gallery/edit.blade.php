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
                    <!--begin::Repeater-->
                    <div id="image" class="fv-row mb-7">
                        <!--begin::Form group-->
                        <div class="form-group">
                            <div data-repeater-list="image">
                                <div data-repeater-item>
                                    <div class="form-group row">
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
                                            <div class="image-input image-input-outline image-input-empty image-input-placeholder mb-3 image-preview"
                                                data-kt-image-input="true">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change image">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="image_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel image">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove image">
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
                                        <div class="col-md-4">
                                            <a href="javascript:;" data-repeater-delete
                                                class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                <i class="la la-trash-o"></i>Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--begin::Form group-->
                        <div class="form-group mt-5">
                            <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                <i class="la la-plus"></i>Add
                            </a>
                        </div>
                        <!--end::Form group-->
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Title</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-lg form-control-solid" name="title"
                            placeholder="Title" value="{{ $gallery->title ?? '' }}" />
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Description</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control form-control-lg form-control-solid" name="description" placeholder="Description">{{ $gallery->description ?? '' }}</textarea>
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Date</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-lg form-control-solid" name="date"
                            id="date" placeholder="Date" value="{{ $gallery->date ?? '' }}" />
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-light me-3">Cancel</a>
                        @if ($gallery->id)
                            <button id="tombol_simpan" class="btn btn-primary"
                                onclick="handle_upload('#tombol_simpan', '#form_input', '{{ route('admin.gallery.update', $gallery->id) }}', 'PUT');">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        @else
                            <button id="tombol_simpan" class="btn btn-primary"
                                onclick="handle_upload('#tombol_simpan', '#form_input', '{{ route('admin.gallery.store') }}', 'POST');">
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
        var imageRepeater = function(images) {
            $('#image').repeater({
                isFirstItemUndeletable: true,
                initEmpty: false,
                show: function() {
                    $(this).slideDown();
                    // init image input
                    KTImageInput.init(this);
                    // if image input is not empty, set datatransfer

                },
                hide: function(deleteElement) {
                    Swal.fire({
                        text: "Are you sure you would like to delete this image?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function(result) {
                        if (result.value) {
                            $(this).slideUp(deleteElement);
                            var imageInput = KTImageInput.getInstance(this);
                            // remove image with ajax
                            imageInput.on("kt.imageinput.change", function() {

                            });
                        }
                    });
                },
                // init image input
                ready: function(setIndexes) {
                    KTImageInput.init(this);
                }
            });
        }

        const DatePicker = function() {
            // Private functions
            var date = function() {
                $('#date').flatpickr();
            }
            return {
                // public functions
                init: function() {
                    date();
                }
            };
        }();

        jQuery(document).ready(function() {
            DatePicker.init();
        });

        function init(images) {
            // find the file input element
            var fileInput = document.querySelectorAll('#image');
            // listen for change event
            const dataTransfer = new DataTransfer();
            let files = [];
            for (let i = 0; i < images.length; i++) {
                files.push("{{ asset('images/gallery') }}/" + images[i]);
            }
            console.log(files);
            for (let i = 0; i < files.length; i++) {
                dataTransfer.items.add(files[i]);
            }
            // dataTransfer.items.add(file);
            fileInput[0].files = dataTransfer.files;
        }
    </script>
@endsection
