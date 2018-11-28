@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$department->name}} Department's Employees</div>
                @if(session()->get('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}
                  </div>
                @elseif(session()->get('updateStatus'))
                  <div class="alert alert-success">
                    {{ session()->get('updateStatus') }}
                  </div>
                @endif
                <script>
                $(document).ready(function() {
                    // show the alert
                    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                        $(".alert").slideUp(500);
                    });
                });
                </script>

                <div class="card-body">
                  <p>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#update">Add Employee</button>
                  </p>
                  <!-- ............................................................................................................ -->
                  <!-- Modal -->
                  <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add Employee</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('addEmployee', $department->id) }}">
                            @csrf
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                              <label for="Date of Birth">Date of Birth</label>
                              <input type="date" name="dob" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="name">Home Address</label>
                              <input type="text" class="form-control" name="address" id="address" required>
                            </div>
                            <div class="form-group">
                              <label for="name">Email Address</label>
                              <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                              <label for="name">Contact Number</label>
                              <input type="number" class="form-control" name="contact" id="contact" required>
                            </div>
                            <input type="number" name="company_id" value="{{ Auth::User()->company->id}}" hidden>
                            <input type="number" name="department_id" value="{{ $department->id }}" hidden>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ............................................................................................................ -->
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
                        <th scope="col" colspan="3">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($department->employees as $employee)
                        <tr>
                          <th>{{ $employee->id }}</th>
                          <td>{{ $employee->name }}</td>
                          <td>{{ $employee->dob }}</td>
                          <td>{{ $employee->address }}</td>
                          <td>{{ $employee->email }}</td>
                          <td>{{ $employee->contact }}</td>
                          <td>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#update{{$employee->id}}">Edit</button>
                            <!-- ............................................................................................................ -->
                            <!-- Modal -->
                            <div class="modal fade" id="update{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Update Employee</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post" action="{{ route('updateEmployee', $employee->id) }}">
                                      @csrf
                                      @method('patch')
                                      <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $employee->name }}" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="Date of Birth">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" value="{{ $employee->dob }}" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="name">Home Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{ $employee->address }}" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="name">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $employee->email }}" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="name">Contact Number</label>
                                        <input type="number" class="form-control" name="contact" id="contact" value="{{ $employee->contact }}" required>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- ............................................................................................................ -->
                          </td>
                          <td>
                            <form action="{{ route('deleteEmployee', $employee->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                          </td>
                        <tr>
                        @endforeach
                    </tbody>
                  </table>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
