@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Employees</div>

                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Department</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                          <th>{{ $employee->id }}</th>
                          <td>{{ $employee->name }}</td>
                          <td>{{ $employee->dob }}</td>
                          <td>{{ $employee->address }}</td>
                          <td>{{ $employee->email }}</td>
                          <td>{{ $employee->contact }}</td>
                          <td>
                            @foreach ($employee->departments as $department)
                              {{ $department->name }}
                            @endforeach
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{ $employees->links() }}
                  </div>
                </div>
            </div>
            @foreach ($departments as $department)
            <p></p>
            <div class="card">
                <div class="card-header">{{ $department->name }}'s Employees</div>

                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Contact Number</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          @foreach ($department->employees as $employee)
                          <th>{{ $employee->id }}</th>
                          <td>{{ $employee->name }}</td>
                          <td>{{ $employee->dob }}</td>
                          <td>{{ $employee->address }}</td>
                          <td>{{ $employee->email }}</td>
                          <td>{{ $employee->contact }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
