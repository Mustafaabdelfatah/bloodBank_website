@extends('dashboard.index')
@section('content')
@section('page_title')
@lang('site.createdonation')
@endsection
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('site.createdonation')</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('dashboard.donations.store')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="patient_name"> @lang('site.name')</label>
                <input type="text" name="patient_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="patient_phone"> @lang('site.phone')</label>
                <input type="integer" name="patient_phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="patient_age"> @lang('site.age')</label>
                <input type="integer" name="patient_age" class="form-control">
            </div>
            <div class="form-group">
                <label for="bags_num"> @lang('site.Bags_Num')</label>
                <input type="integer" name="bags_num" class="form-control">
            </div>
            <div class="form-group">
                <label for="hospital_name"> @lang('site.hospital_name')</label>
                <input type="text" name="hospital_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="hospital_address"> @lang('site.hospital_address')</label>
                <input type="text" name="hospital_address" class="form-control">
            </div>
            <div class="form-group">
                <label for="datails"> @lang('site.datails')</label>
                <input type="text" name="details" class="form-control">
            </div>
            <div class="form-group">
                <label>@lang('site.bloodTypes')</label>
                <select name="blood_type_id" class="form-control">
                    <option value="">@lang('site.all_bloodtype')</option>

                    @foreach ($bloodtypes as $id => $name)

                    <option value="{{ $id }}" {{ old('blood_type_id') == $id ?
                             'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>@lang('site.cities')</label>
                <select name="city_id" class="form-control">
                    <option value="">@lang('site.all_city')</option>
                    @foreach ($cities as $id => $name)
                    <option value="{{ $id }}" {{ old('city_id') == $id ?
                             'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>@lang('site.clients')</label>
                <select name="client_id" class="form-control">
                    <option value="">@lang('site.all_client')</option>
                    @foreach ($clients as $id => $name)
                    <option value="{{ $id }}" {{ old('client_id') == $id ?
                             'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                    @lang('site.addbloodtype')</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->
@endsection
