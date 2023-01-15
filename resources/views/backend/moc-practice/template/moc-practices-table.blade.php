<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>MOC Credit Types</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="ibox-content">
                @if(\Session::has('success'))
                <div class="alert alert-success">
                    <ul class="list-style-none">
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif
                <form action="{{ route('moc-practices.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('moc_board_id') has-error @enderror"">
                                <label for=" moc_board_id">Select MOC Board</label>
                                {!! Form::select('moc_board_id',$moc_boards , old('moc_board_id'), array('class' => 'form-control
                                chosen-select','placeholder'=>'Select MOC Board') ); !!}
                                @error('moc_board_id')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  @error('order') has-error @enderror">
                                <label for="order">Order</label>
                                <input type="text" name="order" id="order" value="{{old('order')}}"
                                    class="form-control @error('order') is-invalid @enderror">
                                @error('order')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('practice_areas') has-error @enderror">
                                <label for="practice_areas">Practice Area</label>
                                <input type="text" name="practice_areas" id="practice_areas" value="{{old('practice_areas')}}"
                                    class="form-control @error('practice_areas') is-invalid @enderror">
                                @error('practice_areas')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
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
                @if(count($moc_practices))
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>                           
                            <th>MOC Board</th>
                            <th>Practice Area</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody id="MocPractice">
                        @foreach($moc_practices as $key=>$moc_practice)
                        <tr class="gradeX DrapRow" item_id="{{$moc_practice->id}}">
                            <td class="text-center">{!! ($key+1)+(15*($moc_practices->currentPage()-1)) !!}</td>                           
                            <td>{{$moc_practice->moc_board->board}}</td>
                            <td>{{$moc_practice->practice_areas}}</td>
                            <td class="action-column tooltip-suggestion">
                                <a class="btn btn-success btn-circle"
                                    href="{{ route('moc-practices.edit', $moc_practice->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                @if(!empty($user_role) && $user_role=='ADMIN')
                                <form id="del-{{$moc_practice->id}}" method="POST"
                                    action="{{ route('moc-practices.destroy', $moc_practice->id) }}"
                                    class="action-form">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip"
                                        data-placement="top" title="Delete"
                                        onclick="deleteConfirmation('del-{{$moc_practice->id}}'); return false;"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="dataTables_paginate paging_simple_numbers">
                    {{$moc_practices->links()}}
                </div>
                @else
                <div class="text-center">
                    <h4>No MOC Practice Available</h4>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>