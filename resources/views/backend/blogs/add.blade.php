@extends('backend.layout.app')

@section('content')
    <form action="{{ route('admin.blog.do-add-edit') }}" method="POST" id="addBlog">
        @csrf
        <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name">
            <span class="error name_error"></span>
        </div>

        <div class="form-group">
            <label for="short_description">Short Description <span class="text-danger">*</span></label>
            <textarea class="form-control" id="short_description" name="short_description" rows="3"></textarea>
            <span class="error short_description_error"></span>
        </div>

        <div class="form-group">
            <label for="content">Content <span class="text-danger">*</span></label>
            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
            <span class="error content_error"></span>
        </div>

        <div class="form-group" id="image-preview-container" style="display: none;">
            <div style="position: relative; display: inline-block;">
                <img id="image-preview" src="" alt="Preview" style="max-width: 200px; max-height: 200px;">
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
            <input type="text" class="form-control" id="author" name="author">
            <span class="error author_error"></span>
        </div>

        <div class="form-group">
            <label for="categories">Categories <span class="text-danger">*</span></label>
            <select class="form-control select2" id="categories" name="categories[]" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <span class="error categories_error"></span>
        </div>

        <div class="form-group">
            <label for="publish_date">Publish Date <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id="publish_date" name="publish_date">
            <span class="error publish_date_error"></span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');
            const removeButton = document.getElementById('remove-image');

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

            removeButton.addEventListener('click', function() {
                imageInput.value = "";
                previewImage.src = "";
                previewContainer.style.display = 'none';
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
                                showValidationError(res
                                    .errors);
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
                            z
                        }
                    },
                    complete: function() {
                        // $(e.target).find('button[type="submit"]').removeClass('makeDisable');
                    }
                });
            });
        });
    </script>
@endpush
