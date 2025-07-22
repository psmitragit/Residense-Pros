@extends('backend.layout.app')
@push('cdn')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
@endpush
@push('css')
    <style>
        .select2-selection.select2-selection--multiple {
            height: 41px;
            border-color: #ebedf2;
            border-width: 2px;
        }
    </style>
@endpush
@section('content')
    <form action="{{ route('admin.blog.do-add-edit') }}" method="POST" id="addBlog">
        @csrf
        <input type="hidden" name="id" value="{{ $blog?->id ?? '' }}">
        <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $blog?->name ?? '' }}">
            <span class="error name_error"></span>
        </div>

        <div class="form-group">
            <label for="short_description">Short Description <span class="text-danger">*</span></label>
            <textarea class="form-control" id="short_description" name="short_description" rows="3">{{ $blog?->short_description ?? '' }}</textarea>
            <span class="error short_description_error"></span>
        </div>

        <div class="form-group">
            <label for="content">Content <span class="text-danger">*</span></label>
            <textarea class="form-control" id="summernote" name="content" rows="5">{{ $blog?->content ?? '' }}</textarea>
            <span class="error content_error"></span>
        </div>

        <div class="form-group" id="image-preview-container"
            style="{{ empty($blog?->image ?? '') ? 'display: none;' : '' }}">
            <div style="position: relative; display: inline-block;">
                <img id="image-preview" src="{{ $blog?->image() }}" alt="Preview"
                    style="max-width: 200px; max-height: 200px;">
                <button type="button" id="remove-image"
                    style="position: absolute; top: 0; right: 0; background: red; color: white; border: none; border-radius: 50%; width: 24px; height: 24px;">×</button>
            </div>
        </div>
        <div class="form-group">
            <label for="image">Image <span class="text-danger">*</span></label>
            <input type="file" class="form-control" id="image" name="image">
            <span class="error image_error"></span>
        </div>

        <div class="form-group">
            <label for="author">Author <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $blog?->author ?? '' }}">
            <span class="error author_error"></span>
        </div>

        <div class="form-group">
            <label for="categories">Categories</label>
            <select class="form-control select2" id="categories" name="categories[]" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <span class="error categories_error"></span>
        </div>

        <div class="form-group">
            <label for="publish_date">Publish Date <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id="publish_date" name="publish_date"
                value="{{ $blog?->published_at ?? '' }}">
            <span class="error publish_date_error"></span>
            <p class="mb-2">
                Note: If the publish date is set to a future date, the blog will only become visible on that future date.
            </p>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@push('js')
    @if (!empty($selected_cat_ids))
        <script>
            $('#categories').val({{ json_encode($selected_cat_ids) }}).trigger('change');
        </script>
    @endif
    @if (empty($blog))
        <script>
            const removeButton = document.getElementById('remove-image');
            removeButton.addEventListener('click', function() {
                imageInput.value = "";
                previewImage.src = "";
                previewContainer.style.display = 'none';
            });
        </script>
    @else
        <script>
            const removeButton = document.getElementById('remove-image');
            removeButton.addEventListener('click', function() {
                $('#image').click();
            });
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // INITIALIZE SUMMERNOTE  
            $('#summernote').summernote({
                height: 300
            });
            //** INITIALIZE SUMMERNOTE  

            const imageInput = document.getElementById('image');
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');


            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#addBlog').on('submit', function(e) {
                e.preventDefault();
                $('.error').empty();
                let formData = new FormData(e.target);
                $.ajax({
                    type: e.target.method,
                    url: e.target.action,
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(e.target).find('button[type="submit"]').addClass('makeDisable');
                    },
                    success: function(res) {
                        if (res.success == 0) {
                            if (res.errors) {
                                showValidationError(res.errors);
                            } else {
                                Swal.fire({
                                    text: '',
                                    html: res.msg || 'Something went wrong.',
                                    icon: 'warning'
                                });
                            }
                        } else {
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            } else {
                                Swal.fire({
                                    text: '',
                                    html: res.msg || 'Success',
                                    icon: 'success'
                                });
                            }
                        }
                    },
                    complete: function() {
                        $(e.target).find('button[type="submit"]').removeClass('makeDisable');
                    }
                });
            });
        });
    </script>
@endpush
