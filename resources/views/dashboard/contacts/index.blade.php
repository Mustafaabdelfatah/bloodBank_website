@extends('dashboard.index')
@section('content')
@section('page_title')
    Contacts
@endsection

<!-- Default box -->
<div class="card">
    <div class="card-header">

        <h3 class="box-title"> All Messages</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">

         @if(count($records))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>

                                 <th class="text-center"> Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Subject</th>

                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$loop->iteration}}</td>

                                    <td class="text-center">{{$record->name}}</td>
                                    <td class="text-center">{{$record->email}}</td>
                                    <td class="text-center">{{$record->phone}}</td>
                                    <td class="text-center">{{$record->message}}</td>
                                    <td class="text-center">{{$record->subject}}</td>
                                    <td>
                                         <form action="{{ url('dashboard/contacts',$record->id)}}" method="post" style="display:inline-block">
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
                    <p class='text-center h3'>لا توجد رسائل !!</p>
                @endif
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->
@endsection

