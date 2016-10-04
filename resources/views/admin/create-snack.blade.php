@extends('layouts.app')

@section('head')

@stop

@section('content')

  <div class="container">
    <div class="col-md-12">
      <h1>..::[Create a new Snack]::..</h1>
      <hr/>
    </div>
    <div class="col-md-6">
      <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Name:</label>
          <input class="form-control" id="name" name="name" type="text" placeholder="z.B. Snickers" required></input>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
            <label for="weight">Weight:</label>
            <div class="input-group">
              <input class="form-control" id="weight" name="weight" type="number" min="0" placeholder="0" required></input>
              <span class="input-group-addon">g</span>
            </div>
          </div>
          <div class="form-group col-md-9">
            <label for="euro">Price:</label>
            <div class="input-group">
              <input class="form-control" id="euro" name="euro" type="number" min="0" placeholder="0" value=0 required>
              <span class="input-group-addon">,</span>
              <input class="form-control" id="cent" name="cent" type="number" min="0" placeholder="0" value=0 required>
              <span class="input-group-addon">€</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <input id="pictures" name="pictures[]" multiple type="file" class="file-loading">
          </div>
        </div>
        <hr/>
        <button class="col-md-12 btn btn-submit btn-default">Save</button>
      </form>
    </div>
  </div>

@stop

@section('foot')

  <script src="/js/fileinput.min.js"></script>
  <script>
   $("#pictures").fileinput({
       showUpload: false,
       previewFileIcon: '<i class="fa fa-file"></i>',
       allowedPreviewTypes: ['image', 'text'], // allow only preview of image & text files
       previewFileIconSettings: {
           'docx': '<i class="fa fa-file-word-o text-primary"></i>',
           'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
           'pptx': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
           'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
           'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
       }
   });
  </script>

@stop
