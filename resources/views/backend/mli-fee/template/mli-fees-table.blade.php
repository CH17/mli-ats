<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>MLI Fees</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <ul class="list-style-none">
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif

            <div class="ibox-content">
                <form action="{{ route('mli-fees.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('activity_id') has-error @enderror"">
                                <label for=" activity_id">Select Activity</label>
                                {!! Form::select('activity_id',$projects , old('activity_id'), array('class' => 'form-control
                                chosen-select','placeholder'=>'Select Activity') ); !!}
                                @error('activity_id')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  @error('accreditation_fee') has-error @enderror">
                                <label for="accreditation_fee">Accreditation Fee ($)</label>
                                <input type="text" name="accreditation_fee" id="accreditation_fee" value="{{old('accreditation_fee')}}"
                                    class="form-control @error('accreditation_fee') is-invalid @enderror">
                                @error('accreditation_fee')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="non_accreditation_revenue">Non Accreditation Revenue ($)</label>
                                <input type="text" name="non_accreditation_revenue" id="non_accreditation_revenue" value="{{old('non_accreditation_revenue')}}"
                                    class="form-control">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meeting_expense">Meeting Expense ($)</label>
                                <input type="text" name="meeting_expense" id="meeting_expense" value="{{old('meeting_expense')}}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name" class="display-block">&nbsp;</label>
                                <input type="submit" class="btn btn-primary" value="Add">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox-content">

                @if(count($mli_fees))
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Activity ID</th>
                            <th>Accreditation Fee ($)</th>
                            <th>Non Accreditation Revenue ($)</th>
                            <th>Meeting Expense ($)</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($mli_fees as $key=>$mli_fee)
                        <tr class="gradeX">
                            <td class="text-center">{!! ($key+1)+(15*($mli_fees->currentPage()-1)) !!}</td>
                            <td>{{$mli_fee->project->activity_id}}</td>
                            <td>{{$mli_fee->accreditation_fee}}</td>
                            <td>{{$mli_fee->non_accreditation_revenue}}</td>
                            <td>{{$mli_fee->meeting_expense}}</td>
                            <td class="action-column tooltip-suggestion">
                                <a class="btn btn-success btn-circle" href="{{ route('mli-fees.edit', $mli_fee->id) }}"
                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                        class="fa fa-edit"></i></a>
                                @if(!empty($user_role) && $user_role=='ADMIN')
                                <form id="del-{{$mli_fee->id}}" method="POST"
                                    action="{{ route('mli-fees.destroy', $mli_fee->id) }}" class="action-form">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip"
                                        data-placement="top" title="Delete"
                                        onclick="deleteConfirmation('del-{{$mli_fee->id}}'); return false;"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="dataTables_paginate paging_simple_numbers">
                    {{$mli_fees->links()}}
                </div>
                @else
                <div class="text-center">
                    <h4>No MLI Fees Available</h4>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>