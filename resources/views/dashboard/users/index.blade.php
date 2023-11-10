@extends('dashboard.layouts.master')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables/dataTables.bootstrap5.min.css') }}">
@endsection
@section('main-content')
    <section class="section-users">
        <div class="card">
            <div class="card-header">
                Gestion usuarios
            </div>
            <div class="card-body">
                <table id="table-users" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Fist Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Phone</th>
                            <th>Birth Date</th>
                            <th>Civil Status</th>
                            <th>Children</th>
                            <th>Observations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->age}}</td>
                            <td>
                                <img width="100" class="" src="{{$user->image}}" alt="">
                            </td>
                            <td>{{$user->status}}</td>
                            <td>{{ $user->aditionalData ? $user->aditionalData->number_phone : 'Sin datos' }}</td>
                            <td>{{ $user->aditionalData ? $user->aditionalData->birth_date : 'Sin datos' }}</td>
                            <td>{{ $user->aditionalData ? $user->aditionalData->civil_status : 'Sin datos' }}</td>
                            <td>{{ $user->aditionalData ? $user->aditionalData->children : 'Sin datos' }}</td>
                            <td>{{ $user->aditionalData ? $user->aditionalData->observations : 'Sin datos' }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('custom-scripts')
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        new DataTable('#table-users');
    </script>
@endsection
