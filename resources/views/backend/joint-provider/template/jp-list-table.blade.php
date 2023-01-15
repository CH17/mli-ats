<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Joint Providers</h5>
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
                <form action="{{ route('joint-providers.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('name') has-error @enderror">
                                <label for="name">Provider Name</label>
                                <input type="text" name="name" id="name" value="{{old('name')}}"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('jp_code') has-error @enderror">
                                <label for="jp_code">Provider Code</label>
                                <input type="text" name="jp_code" id="jp_code" value="{{old('jp_code')}}"
                                    class="form-control @error('jp_code') is-invalid @enderror">
                                @error('jp_code')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('address1') has-error @enderror">
                                <label for="name">Address: 1</label>
                                <input type="text" name="address1" id="address1" value="{{old('address1')}}"
                                    class="form-control @error('address1') is-invalid @enderror">
                                @error('address1')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('address2') has-error @enderror">
                                <label for="name">Address: 2</label>
                                <input type="text" name="address2" id="address2" value="{{old('address2')}}"
                                    class="form-control @error('address2') is-invalid @enderror">
                                @error('address2')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('city') has-error @enderror">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" value="{{old('city')}}"
                                    class="form-control @error('city') is-invalid @enderror">
                                @error('city')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('state') has-error @enderror">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" value="{{old('state')}}"
                                    class="form-control @error('state') is-invalid @enderror">
                                @error('state')
                                <div class="inline-errors">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('zip') has-error @enderror">
                                <label for="zip">Zip</label>
                                <input type="text" name="zip" id="zip" value="{{old('zip')}}"
                                    class="form-control @error('zip') is-invalid @enderror">
                                @error('zip')
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
                @if(count($jointProviders))
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Provider Name</th>
                            <th>Provider Code</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($jointProviders as $key=>$jointProvider)
                        <tr class="gradeX">
                            <td class="text-center">{!! ($key+1)+(15*($jointProviders->currentPage()-1)) !!}</td>
                            <td>{{$jointProvider->name}}</td>
                            <td>{{$jointProvider->jp_code}}</td>
                            <td>{{$jointProvider->address1}}</td>
                            <td>{{$jointProvider->address2}}</td>
                            <td>{{$jointProvider->city}}</td>
                            <td>{{$jointProvider->state}}</td>
                            <td>{{$jointProvider->zip}}</td>
                            <td class="action-column tooltip-suggestion">
                                <a class="btn btn-success btn-circle"
                                    href="{{ route('joint-providers.edit', $jointProvider->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                @if(!empty($user_role) && $user_role=='ADMIN')
                                <form method="POST" action="{{ route('joint-providers.destroy', $jointProvider->id) }}"
                                    class="action-form">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip"
                                        data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="dataTables_paginate paging_simple_numbers">
                    {{$jointProviders->links()}}
                </div>
                @else
                <div class="text-center">
                    <h4>No Joint Provider Available</h4>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>