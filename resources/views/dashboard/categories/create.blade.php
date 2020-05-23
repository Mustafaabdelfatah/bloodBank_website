@extends('dashboard.index')
@section('content')
@section('page_title')
    @lang('site.createcategory')
@endsection
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('site.createcategory')</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
         <form action="{{route('dashboard.categories.store')}}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="name"> @lang('site.name')</label>
                    <input type="text" name="name" class="form-control" >
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.addcategory')</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->
@endsection

