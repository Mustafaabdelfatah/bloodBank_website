@extends('dashboard.index')
@section('content')
@section('page_title')
    @lang('site.editpost')
@endsection
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('site.editpost')</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
         <form action="{{route('dashboard.posts.update',$posts->id)}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group">
                <label> @lang('site.title') </label>
                <input type="text" name="title" class="form-control" value="{{$posts->title}}">
            </div>
            <div class="form-group">
                <label> @lang('site.content') </label>
                <input type="text" name="content" class="form-control" value="{{$posts->content}}">
            </div>
             <div class="form-group">
                <label> @lang('site.image') </label>
                <input type="file" name="image" class="form-control image">
            </div>

            <div class="form-group">
                <img src="{{ $posts->image_path }}" class="img-thumbnail image-preview" style="width:100px">
            </div>


            <div class="form-group">
                <label>@lang('site.categories')</label>
                <select name="category_id" class="form-control">
                    <option value="">@lang('site.all_category')</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}" {{ $posts->category_id == $id  ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.update')</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->
@endsection

