@extends('layouts.app')

@section('head')

@stop

@section('content')

<div class="container">
  <div class="col-md-12">
    <h1>..::[{{ $snack->name }}]::.. <small>[edit]</small></h1>
  </div>
    <div class="col-md-6">
      <hr/>
      {{ Form::model($snack, [ 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) }}

      <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, [ 'placeholder' => 'zB. Snickers', 'class' => 'form-control' ]) }}
      </div>

      <div class="row">
        <div class="form-group col-sm-4">
          {{ Form::label('weight', 'Weight:') }}
          <div class="input-group">
            {{ Form::number('weight', null, [ 'min' => '0', 'placeholder' => '0', 'class' => 'form-control' ]) }}
            <span class="input-group-addon">g</span>
          </div>
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('euro', 'Price:') }}
          <div class="input-group">
            {{ Form::text('euro', null, [ 'placeholder' => '0', 'class' => 'form-control' ]) }}
            <span class="input-group-addon">.</span>
            {{ Form::text('cent', null, [ 'placeholder' => '0', 'class' => 'form-control' ]) }}
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
      {{ Form::submit('save', [ 'class' => 'btn btn-default col-md-12']) }}

      {{ Form::close() }}

    </div>
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
