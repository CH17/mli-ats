<div class="ibox-content">
    @if(count($epContacts))
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Educational Partner</th>
                <th>Contact Name</th>
                <th>Contact Email</th>
                <th>Telephone</th>
                <th>Mobile</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($epContacts as $key=>$epContact)
            <tr class="gradeX">
                <td class="text-center">{!! ($key+1)+(15*($epContacts->currentPage()-1)) !!}</td>
                <td>{{$epContact->educational_partner->name}}</td>
                <td>{{$epContact->contact_name}}</td>
                <td>{{$epContact->contact_email}}</td>
                <td>{{$epContact->telephone1}}</td>
                <td>{{$epContact->telephone2}}</td>
                <td class="action-column tooltip-suggestion">
                    <a class="btn btn-success btn-circle" href="{{ route('educational-partner-contacts.edit', $epContact->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                    @if(!empty($user_role) && $user_role=='ADMIN')
                    <form id="del-{{$epContact->id}}" method="POST" action="{{ route('educational-partner-contacts.destroy', $epContact->id) }}" class="action-form">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteConfirmation('del-{{$epContact->id}}'); return false;"><i class="fa fa-trash"></i></button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="dataTables_paginate paging_simple_numbers">
        {{$epContacts->links()}}
    </div>
    @else
    <div class="text-center">
        <h4>No Educational Partner Contact Available</h4>
    </div>
    @endif
</div>