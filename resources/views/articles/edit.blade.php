@push('cropper')
    <link href="{{ asset('css/cropper-custom.css') }}" rel="stylesheet">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js"></script>
    <script src="{{ asset('js/cropper-custom.js') }}" defer></script>
@endpush

@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="">
    <div class="">
      <div class="">
        <!-- <div class="card-header">Create</div> -->


        <div class="">
        <form method="POST" action="{{url('articles/' .$articles->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group row mb-0">
              <div class="col-md-12">
                <input type="text" name="title" class="form-control" value="{{$articles->title}}">
                <!-- Create the editor container -->
                
                <div id="editSection" rows="8" cols="40"></div>
                <textarea id="edit_content" class="editor mt-2 form-control @error('body') is-invalid @enderror" required autocomplete="body" name="body" style="display: none;">{{$articles->body}}</textarea>
                @error('image_url')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('body')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0 text-right">
              <div class="col-md-12 mt-2">
                  <label for="profile_image" class="col-form-label text-md-right">ヘッダー画像</label>
                  <div class="">
                    <label class="label" data-toggle="tooltip" title="画像を追加する">
                        <div id="display_cropped_image" class="border position-relative rectangle-frame" name="test">
                            <span id="avatar" class="rectangle_content bg-image rounded" style="background-image:url('{{ $articles->header_image }}')">
                                <i id="avatar_plus" class="fas fa-plus fa-2x text-secondary position-absolute h-100 w-100 m-0 d-flex align-items-center justify-content-center"></i>
                            </span>
                        </div>
                        <input type="file" class="sr-only" id="input" name="image" accept="image/*">
                        <input type="hidden" id="binary_image" name="binary_image" value="">
                    </label>
                  </div>

                  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="img-container">
                              <img id="image" src="">
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-primary" id="crop">Crop</button>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-12 text-right">
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary" onclick="callBody();">更新する</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://uicdn.toast.com/tui-editor/latest/tui-editor-Editor-full.js"></script>
<script src="{{ asset('js/tui-editor-custom.js') }}" defer></script>
@endsection

