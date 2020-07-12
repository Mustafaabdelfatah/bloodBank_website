@extends('dashboard.index')
@section('content')
@section('page_title')
    @lang('site.createcity')
@endsection
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('site.createcity')</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
         <form action="{{route('dashboard.cities.store')}}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="name"> @lang('site.name')</label>
                    <input type="text" name="name" class="form-control" >
                </div>
                <div class="form-group">
                    <label>@lang('site.governorate')</label>
                    <select name="governorate_id" class="form-control">
                        <option value="">@lang('site.all_governorate')</option>
                        @foreach ($governorates as $index => $name)
                            <option value="{{ $index }}" {{ old('governorate_id') == $index ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.addcity')</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->
@endsection

