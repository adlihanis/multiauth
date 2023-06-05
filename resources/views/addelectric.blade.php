@extends('layouts.design')


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ELECTRICAL APPLIANCES EDITABLE PAGE') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">

            <div class="col-md-9">
                    <div class="card-body">
                        <a href="{{ url('/electric/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Item Name</th>
                                        <th>Description</th>
                                        <th>Rate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($electrics as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src= "/image/{{ $item->image }}" alt='image' width=100></td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->rate }}</td>

                                        <td>
                                            <a href="{{ url('/electric/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/electric/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/electric' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <a href="{{ url('dashboard') }}" class="btn btn-secondary btn-sm" title="Go Back">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>