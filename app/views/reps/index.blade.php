@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm btn-new-user" href="{{ URL::route('rep.create') }}">Add New Reps</a>

					</span>
                </header>
                <div class="panel-body">
                    @if(count($reps))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th>Rep Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>City</th>

                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reps as $rep)
                                <tr>
                                    <td>{{ $rep->name }}</td>
                                    <td>{{ $rep->user->email }}</td>
                                    <td>{{ $rep->address }}</td>
                                    <td>{{ $rep->phone }}</td>
                                    <td>{{ $rep->city }}</td>



                                    <td class="text-center">


                                        <a class="btn btn-xs btn-success btn-edit" href="{{ URL::route('rep.edit', array('id' => $rep->id)) }}">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{{ $rep->id }}">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
                </div>
            </section>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    {{ Form::open(array('route' => array('rep.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) }}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    {{ Form::submit('Yes, Delete', array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


@stop


@section('style')
    {{ HTML::style('assets/data-tables/DT_bootstrap.css') }}
@stop


@section('script')
    {{ HTML::script('assets/advanced-datatable/media/js/jquery.dataTables.js') }}
    {{ HTML::script('assets/data-tables/DT_bootstrap.js') }}

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#example').dataTable({

            });

            // delete
            $('.deleteBtn').click(function() {
                var deleteId = $(this).attr('deleteId');
                var url = "<?php echo URL::route('rep.index'); ?>";
                $(".deleteForm").attr("action", url+'/'+deleteId);
            });
        });
    </script>
@stop