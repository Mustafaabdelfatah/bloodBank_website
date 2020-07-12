@extends('dashboard.index')
@section('content')
@section('page_title')
    @lang('site.editcity')
@endsection
<!-- Default box -->

            <div class="card-body">
                <form action="{{route('dashboard.donations.update',$model->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="form-group">
                        <label> @lang('site.patient_name') </label>
                        <input type="text" name="patient_name" class="form-control" value="{{$model->patient_name}}">
                    </div>
                    <div class="form-group">
                        <label> @lang('site.patient_phone') </label>
                        <input type="integer" name="patient_phone" class="form-control" value="{{$model->patient_phone}}">
                    </div>
                    <div class="form-group">
                        <label> @lang('site.patient_age') </label>
                        <input type="integer" name="patient_age" class="form-control" value="{{$model->patient_age}}">
                    </div>
                    <div class="form-group">
                        <label> @lang('site.bags_num') </label>
                        <input type="integer" name="bags_num" class="form-control" value="{{$model->bags_num}}">
                    </div>
                    <div class="form-group">
                        <label> @lang('site.hospital_name') </label>
                        <input type="text" name="hospital_name" class="form-control" value="{{$model->hospital_name}}">
                    </div>
                     <div class="form-group">
                        <label> @lang('site.hospital_address') </label>
                        <input type="text" name="hospital_address" class="form-control" value="{{$model->hospital_address}}">
                    </div>
                     <div class="form-group">
                        <label> @lang('site.details') </label>
                        <input type="text" name="details" class="form-control" value="{{$model->details}}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.bloodtype')</label>
                        <select name="blood_type_id" class="form-control">
                            <option value="">@lang('site.all_blood_type')</option>
                            @foreach ($bloodtypes as $id => $name)
                            <option value="{{ $id }}" {{ $model->blood_type_id == $id  ? 'selected' : '' }}>{{ $name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                        <label>@lang('site.city')</label>
                        <select name="blood_type_id" class="form-control">
                            <option value="">@lang('site.all_city')</option>
                            @foreach ($cities as $id => $name)
                            <option value="{{ $id }}" {{ $model->city_id == $id  ? 'selected' : '' }}>{{ $name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                        <label>@lang('site.clients')</label>
                        <select name="client_id" class="form-control">
                            <option value="">@lang('site.all_clients')</option>
                            @foreach ($clients as $id => $name)
                            <option value="{{ $id }}" {{ $model->client_id == $id  ? 'selected' : '' }}>{{ $name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                            @lang('site.update')</button>
                    </div>
                </form>
            </div>




    </div>
</section>
@endsection
