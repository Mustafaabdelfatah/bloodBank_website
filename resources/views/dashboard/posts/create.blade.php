@extends('dashboard.index')
@section('content')
@section('page_title')
    @lang('site.createpost')
@endsection
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('site.createpost')</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
         <form action="{{route('dashboard.posts.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title"> @lang('site.title')</label>
                    <input type="text" name="title" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="content"> @lang('site.content')</label>
                    <textarea class="form-controller" name="content"></textarea>
                </div>
                 <div class="form-group">
                    <label for="image"> @lang('site.image')</label>
                    <input type="file" name="image" class="form-controller image">
                 </div>
                  <div class="form-group">
                    <img src="{{asset('images/posts/default.png')}}" class="image-preview" style="width:100px">
                 </div>
                <div class="form-group">
                    <label>@lang('site.category')</label>
                    <select name="category_id" class="form-control">
                        <option value="">@lang('site.all_category')</option>
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('category_id') == $id ?
                             'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.addpost')</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->
@endsection

