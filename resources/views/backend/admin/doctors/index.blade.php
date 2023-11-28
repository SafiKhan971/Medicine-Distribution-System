@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Doctors List')
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Doctors List</h3>
                        <p class="text-sm mb-0">
                            This is Doctors List.
                        </p>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor['name'] }}</td>
                                        <td>{{ $doctor['email'] }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm edit-doctor">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.admin.doctors.update')

    {{-- <script>
        // Use a class selector for the click event
        document.querySelectorAll('.edit-doctor').forEach(function(button) {
            button.addEventListener('click', function() {
                var doctorId = this.getAttribute('data-id');
                var doctor = @json($doctors->firstWhere('id', $doctor['id'])); // Get the selected doctor by ID

                // Populate the modal fields with the doctor's data
                $('#update-doctor').find('[name="doctor_name"]').val(doctor.name);
                $('#update-doctor').find('[name="doctor_email"]').val(doctor.email);

                // Show the modal
                $('#update-doctor').modal('show');
            });
        });
    </script> --}}
@endsection
