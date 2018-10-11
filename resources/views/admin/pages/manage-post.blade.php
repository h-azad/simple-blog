@extends('admin.layouts.master')

@section('contents')
<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="header">
                      <h4 class="title">Manage Post</h4>
                      <p class="category">Here You can manage posts by Edit & Delete</p>
                  </div>
                  <div class="content table-responsive table-full-width">
                      <table class="table table-striped">
                          <thead>
                              <th>ID</th>
                          	<th>Title</th>
                          	<th>Image</th>
                            <th>Visibility</th>
                          	<th>Action</th>
                          </thead>
                          <tbody>
                            @foreach($posts as $post)
                              <tr>
                              	<td>{{ $post->id }}</td>
                              	<td><a href="{{ route('post_details', $post->id) }}" target="_blank">{{ $post->title }}</a></td>
                              	<td><img src="{{asset('storage/'.$post->image)}}"  width="50px"/></td>
                                <td>{{ ($post->status == '1') ? 'Published' : 'Unpublished' }}</td>
                              	<td>
                                  <a href="{{ route('admin.editPost',$post->id) }}" data-tooltip="tooltip" class="btn btn-sm btn-success btn-icon" title="Edit"><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('admin.deletePost',$post->id) }}" data-toggle="confirmation" data-tooltip="tooltip" class="btn btn-sm btn-danger btn-icon" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/Bootstrap-Confirmation-2/bootstrap-confirmation.min.js')}}"></script>
<script>
  $(document).ready(function(){
      $('[data-tooltip="tooltip"]').tooltip();
  });
  $('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    container: 'body',
    btnOkIcon: 'fa fa-check',
    btnCancelIcon: 'fa fa-times'
  });
</script>
@endsection
