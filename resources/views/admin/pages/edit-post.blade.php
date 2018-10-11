@extends('admin.layouts.master')

@section('css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('contents')
<div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Blog</h4>
                                @include('admin.partials.notifications')
                            </div>
                            <div class="content">
                                <form method="post" action="{{ route('admin.editPost',$post->id) }}" enctype="multipart/form-data" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Blog Title</label>
                                                <input type="text" name="title" class="form-control border-input" maxlength="200" placeholder="Blog Title" value="{{ $post->title }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Blog Sub-Title</label>
                                                <input type="text" name="subtitle" class="form-control border-input" maxlength="150" placeholder="Blog Title" value="{{ $post->subtitle }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Blog Image</label>
                                                <input name="image" type="file" class="form-control border-input">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                          <img src="{{asset('storage/'.$post->image)}}"  width="70%"/>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status</label>
																								<select name="status" id="status" class="form-control border-input" required>
																							    <option value="0">----</option>
																							    <option value="1" selected>Publish</option>
																							    <option value="2">Unpublish</option>
																							  </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Blog Description</label>
                                                <textarea rows="10" name="description" class="form-control border-input" id="postDescription" placeholder="Here can be your description" required>{{ $post->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@endsection

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
    $(document).ready(function() {
        $('#postDescription').summernote({
				  height: 300,                 // set editor height
				  minHeight: null,             // set minimum height of editor
				  maxHeight: null,             // set maximum height of editor
				  focus: true                  // set focus to editable area after initializing summernote
				});

        $('#status').val('{{ $post->status }}');
    });
</script>
@endsection
