@extends('dashboard.index')
@section('content')
@section('page_title')
    Posts
@endsection


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Of Posts</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <a href="{{route('dashboard.posts.create')}}" class=" btn btn-info">
            <i class="fa fa-plus"></i> New Post
        </a>
        @if (count($posts))
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>


                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $record )
                            <tr>
                                <td>{{$loop->iteration}}</td>


                                <td>{{$record->title}}</td>
                                <td>{{$record->content}}</td>
                                <td>{{$record->category->name}}</td>
                                <td><img src="{{ $record->image_path }}" style="width:100px;" class="img-thumbnail"/></td>
                                <td>
                                    <a href="{{ route('dashboard.posts.edit', $record->id)}}" class="btn btn-info btn-sm">@lang('site.edit')</a>
                                    <form action="{{ route('dashboard.posts.destroy',$record->id)}}" method="post" style="display:inline-block">
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

