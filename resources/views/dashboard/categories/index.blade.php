@extends('dashboard.index')
@section('content')
@section('page_title')
    Category
@endsection

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Of Categories</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <a href="{{route('dashboard.categories.create')}}" class=" btn btn-info">
            <i class="fa fa-plus"></i> New Category
        </a>
        @if (count($records))
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$record->name}}</td>
                                <td>
                                    <a href="{{ route('dashboard.categories.edit', $record->id)}}" class="btn btn-info btn-sm">@lang('site.edit')</a>
                                    <form action="{{ route('dashboard.categories.destroy',$record->id)}}" method="post" style="display:inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field("delete")}}
                                        <button type="submit" class="btn btn-danger delete btn-sm">@lang('site.delete')</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else

            <div class="alert alert-danger" role="alert">
                No Data
            </div>

        @endif
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->
@endsection

