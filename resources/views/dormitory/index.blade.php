@extends('layouts.app')

@include('dormitory.assets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-right mt-2">
                        <a href="{{ url('dormitory/excel') }}" class="btn btn-success mr-3"><i
                                class="fa fa-table"></i></a>
                        <button class="btn btn-primary" id="refresh-button"><i class="fa fa-spinner"></i></button>
                        <a href="{{ url('dormitory/form/create') }}" id="create-button" class="btn btn-primary"><i
                                class="fa fa-plus-square"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dormitory-table" class="table table-sm display compact nowrap">
                            <thead>
                                <tr>
                                    <th>Nama Kamar</th>
                                    <th>Musyrif</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection