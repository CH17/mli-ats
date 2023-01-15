@extends('backend.layouts.master')
@section('title', 'Resources')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Resources</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>            
            <li class="active">
                <strong>Resources</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="titleWrap">
                        <h5>Pages</h5>
                    </div>
                    <form action="#" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Search by Page title or content...." name="q" value="">
                            </div>
                            <div class="col-md-2">
                                <div class="FilterButton">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                                <div class="ClearButton">
                                    <a href="#" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-9">
                                @if(\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{!! \Session::get('success') !!}</p>
                                    
                                </div>
                                @endif
                            </div>
                           <table class="table table-striped table-bordered table-hover table-Sorting tooltip-suggestion">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>        
                                    @forelse ($pages as $page)
                                        <tr class="gradeX ">
                                            <td class="text-center"> {{ $loop->index +1 }}</td>
                                            <td> {{ $page->title }}</td>
                                            <td>{{ date('m/d/Y', strtotime($page->created_at)) }}</td>
                                            <td>{{ date('m/d/Y', strtotime($page->updated_at)) }}</td>
                                            <td class="project-action-column">
                                                <a class="btn btn-warning btn-sm" target="_blank" href="{{ route('resources.show', $page) }}" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-link"></i> View</a>                        
                                                @if (!empty($user_role) && ($user_role == 'ADMIN'))
                                                <a class="btn btn-success btn-circle" href="{{ route('resources.edit', $page) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                
                                                <form method="POST" action="{{ route('resources.destroy', $page) }}" id="del_{{ $page->id }}" class="action-form">
                                                    <input type="hidden" name="_token" value="eBQMMdEciFWt0w9fzE9o4wXSLDdtCPN0Q2zOdlx8">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-circle" onclick="deleteConfirmation('del_{{ $page->id }}'); return false; " data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr> 
                                    @empty
                                        <td  class="text-center" colspan="5"> No Data Available!</td>
                                    @endforelse        
                                                  
                                </tbody>
                            </table>

                            <div class="dataTables_paginate paging_simple_numbers">
                                {{ $pages->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection