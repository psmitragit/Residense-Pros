@extends('agent.layout.app')

@push('css')
    <style>
        .help-text {
            color: grey;
        }

        .upload-box {
            background: #fff;
            cursor: pointer;
            border-radius: 14px;
            height: 160px;
            border: 2px dashed #cacaca;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
            font-family: var(--med);
            font-size: clamp(12px, 3vw, 15px);
            color: var(--gray);
            text-decoration: underline;
        }


        .cross-image {
            position: absolute;
            right: 0px;
            top: -12px;
            background: #ec4b4b;
            color: white;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <form action="{{ route('agent.ads.save') }}" method="POST" autocomplete="off" id="addNewAddForm"
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="position">Ad Position:
                    <i class="fas fa-info-circle ms-2" data-bs-toggle="tooltip"
                        title="The ad will appear in this position on the website" data-bs-placement="right"></i>
                </label>
                <select name="position" id="position" class="form-control w-100">
                    <option value="">Select ad position</option>
                    @foreach ($positions as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
                <span class="error position_error"></span>
            </div>
            <div class="form-group">
                <label for="duration">Duration :
                    <i class="fas fa-info-circle ms-2" data-bs-toggle="tooltip" title="How many day(s) the ad will run?"
                        data-bs-placement="right"></i>
                </label>
                <input type="text" name="duration" class="form-control">
                <span class="error duration_error"></span>
            </div>
            <div class="form-group">
                <label for="ad_url">Ad URL : <i class="fas fa-info-circle ms-2" data-bs-toggle="tooltip"
                        title="When user click the ad they will redirect to this url" data-bs-placement="right"></i>
                </label>
                <input type="text" name="ad_url" class="form-control">
                <span class="error ad_url_error"></span>
            </div>

            <div class="form-group">
                <div class="row image_shown my-3" id="image_shown">
                </div>

                <div class="upload-box p-4 text-center cursor-pointer" id="adImageUpload">
                    <img src="{{ asset('assets/frontend/images/upload-image.png') }}" alt="upload-image" class="img-fluid">
                    <p class="mb-1">
                        Click to upload ad image
                    </p>
                </div>
                <input type="file" class="form-control-file d-none" id="adImageInput" accept=".jpg,.jpeg,.png"
                    name="adImage">
                <span class="error adImage_error"></span>
            </div>

            <div class="form-group">
                <button class="preview btn btn-secondary me-2" type="button">Preview</button>
                <button class="btn btn-success" id="submitBtn">Submit</button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#adImageUpload').on('click', function() {
                $('#adImageInput').click();
            });

            $('#adImageInput').on('change', function() {
                let files = this.files;
                let previewBox = $('#image_shown');
                showChangedImages(files, previewBox);
            });

            function showChangedImages(files, previewBox) {
                previewBox.empty();
                if (files.length === 0) {
                    return;
                }
                $.each(files, function(index, file) {
                    if (!file.type.match('image*')) return;
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let imageWrapper = `
                         <div class="col-md-2 col-6 image-container mb-2 position-relative">
                            <button type="button" class="cross-image crossImg border-0">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <img src="${e.target.result}" alt="Preview" class="img-fluid rounded">
                        </div>
                    `;
                        previewBox.append(imageWrapper);
                    };
                    reader.readAsDataURL(file);
                });
            }

            $('#image_shown').on('click', '.crossImg', function() {
                console.log('image_shown');
                $('#adImageInput').val('');
                $('#image_shown').empty();
            });

            $('.preview').on('click', function() {
                $('.error').empty();
                let formData = new FormData(document.getElementById("addNewAddForm"));
                $.ajax({
                    type: "POST",
                    url: "{{ route('agent.ads.preview') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == 0) {
                            if (res.errors) {
                                showValidationError(res.errors);
                            } else {
                                showToast('', res.msg, 'error');
                            }
                        } else {
                            window.open(res.redirect, '_blank');
                        }
                    }
                });
            });

            $('#addNewAddForm').on('submit', function(e) {
                e.preventDefault();
                $('.error').empty();
                let formData = new FormData(e.target);
                $.ajax({
                    type: "POST",
                    url: "{{ route('agent.ads.save') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == 0) {
                            if (res.errors) {
                                showValidationError(res.errors);
                            } else {
                                showToast('', res.msg, 'error');
                            }
                        } else {
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            } else {
                                showToast('', res.msg, 'success');
                            }
                        }
                    },
                    beforeSend: function() {
                        $('#submitBtn').addClass('btn_disabled');
                    },
                    complete: function() {
                        $('#submitBtn').removeClass('btn_disabled');
                    }
                });
            });
        })
    </script>
@endpush
