 @extends('dashboard.index')
 @section('content')
 @section('page_title')
 Donations
 @endsection


 <!-- Default box -->
 <div class="card">
     <div class="card-header">
         <h3 class="card-title">Donation Request</h3>
         <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                 title="Collapse">
                 <i class="fas fa-minus"></i></button>
             <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                 <i class="fas fa-times"></i></button>
         </div>
     </div>
     <div class="card-body">
         <a href="{{route('dashboard.donations.create')}}" class=" btn btn-info">
             <i class="fa fa-plus"></i> New Donation
         </a>

         @if(count($records))
         <div class="table-responsive">
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>

                         <th> Patient Name</th>
                         <th> Patient Phone</th>
                         <th> Patient Age</th>
                         <th> Bags Num</th>
                         <th> Hospital Name</th>
                         <th> Hospital Address</th>
                         <th>  Details</th>
                         <th> City</th>
                         <th> Blood Type</th>
                         <th> Client Name</th>
                         <th class="text-center">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($records as $record)
                     <tr id="removable{{$record->id}}">
                         <td class="text-center">{{$loop->iteration}}</td>
                         <td class="text-center">{{$record->patient_name}}</td>
                         <td class="text-center">{{$record->patient_phone}}</td>
                         <td class="text-center">{{$record->patient_age}}</td>
                         <td class="text-center">{{$record->bags_num}}</td>
                         <td class="text-center">{{$record->hospital_name}}</td>
                         <td class="text-center">{{$record->hospital_address}}</td>
                         <td class="text-center">{{$record->details}}</td>
                         <td class="text-center">{{optional($record->city)->name}}</td>
                         <td class="text-center">{{$record->bloodType->name}}</td>
                         <td class="text-center">{{$record->client->name}}</td>

                         <td>
                             <a style="margin-bottom:10px" href="{{ route('dashboard.donations.edit', $record->id)}}"
                                 class="btn btn-info btn-sm">@lang('site.edit')</a>
                             <form action="{{ route('dashboard.donations.destroy',$record->id)}}" method="post"
                                 style="display:inline-block">
                                 {{ csrf_field() }}
                                 {{ method_field("delete")}}
                                 <button type="submit"
                                     class="btn btn-danger delete btn-sm">@lang('site.delete')</button>
                             </form>
                         </td>
                     </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
         @else
         <p class="text-center">لا يوجد تبرعات !!</p>
         @endif
     </div>
     <!-- /.card-body -->

 </div>
 <!-- /.card -->
 @endsection
