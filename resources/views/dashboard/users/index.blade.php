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
                            <th>ID</th>
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
                            <th>Actions: </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->age }}</td>
                                <td>
                                    <img width="100" class="" src="{{ $user->image }}" alt="">
                                </td>
                                <td>{{ $user->status }}</td>
                                <td>{{ $user->aditionalData ? $user->aditionalData->number_phone : 'Sin datos' }}</td>
                                <td>{{ $user->aditionalData ? $user->aditionalData->birth_date : 'Sin datos' }}</td>
                                <td>{{ $user->aditionalData ? $user->aditionalData->civil_status : 'Sin datos' }}</td>
                                <td>{{ $user->aditionalData ? $user->aditionalData->children : 'Sin datos' }}</td>
                                <td>{{ $user->aditionalData ? $user->aditionalData->observations : 'Sin datos' }}</td>
                                <th>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit">Completar datos</button>
                                    <button class="btn btn-danger">Eliminar</button>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{-- modals --}}
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-complete-aditional-data" action="">
                        @method('PUT')
                        <div class="mb-3">
                            <input type="text" class="form-control" id="user_id" name="user_id"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" name="number_phone" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Civil Status</label>
                            <select class="form-control" id="civil_status" name="civil_status">
                                <option value="Casado">Casado</option>
                                <option value="Soltero">Soltero</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Children</label>
                            <input type="number" class="form-control" id="children" name="children">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Observations</label>
                            <textarea class="form-control" name="observations" id="observations" cols="30" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        new DataTable('#table-users');
    </script>
    <script src="{{asset('assets/js/users.js')}}"></script>
@endsection
