<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Moc Credit Types</h5>
        </div>
        <div class="AddButtonWrap text-right">
            <a href="{{ route('moc-practices.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="ibox-content">

        @if(\Session::has('success'))
        <div class="alert alert-success">
            <ul class="list-style-none">
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        @if(count($moc_practices))
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Order</th>
                    <th>Moc Board</th>
                    <th>Practice Area</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($moc_practices as $key=>$moc_practice)
                <tr class="gradeX">
                    <td class="text-center">{!! ($key+1)+(15*($moc_practices->currentPage()-1)) !!}</td>
                    <td>{{$moc_practice->order}}</td>
                    <td>{{$moc_practice->moc_board->board}}</td>
                    <td>{{$moc_practice->practice_areas}}</td>
                    <td class="action-column tooltip-suggestion">
                        <a class="btn btn-success btn-circle"
                            href="{{ route('moc-practices.edit', $moc_practice->id) }}" data-toggle="tooltip"
                            data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        @if(!empty($user_role) && $user_role=='ADMIN')
                        <form id="del-{{$moc_practice->id}}" method="POST"
                            action="{{ route('moc-practices.destroy', $moc_practice->id) }}" class="action-form">
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
            <h4>No Moc Practice Available</h4>
        </div>
        @endif
    </div>
</div>