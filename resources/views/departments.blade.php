@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Departments</div>
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
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Add Department
                    </a>
                  </p>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                      <form method="post" action="{{ route('addDepartment') }}">
                        @csrf
                        <div class="form-group">
                          <label for="name">Department Name</label>
                          <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <input type="text" class="form-control" name="description" id="description" required>
                        </div>
                        <input type="text" name="company_id" value="{{ Auth::User()->company->id}}" hidden>
                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>
                    </div>
                  </div>
                  <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($departments as $department)
                        <tr>
                          <th>{{ $department->id }}</th>
                          <td>{{ $department->name }}</td>
                          <td>{{ $department->description }}</td>
                          <td>
                            <a href="{{ route('employees', $department->id) }}" class="btn btn-primary">View Employees</a>
                          </td>
                          <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#update{{$department->id}}">Edit</button>
                            <!-- ............................................................................................................ -->
                            <!-- Modal -->
                            <div class="modal fade" id="update{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Update Department</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post" action="{{ route('updateDepartment', $department->id) }}">
                                      @csrf
                                      @method('patch')
                                      <div class="form-group">
                                        <label for="name">Department Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$department->name}}" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" name="description" id="description" value="{{$department->description}}" required>
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
                            <form action="{{ route('deleteDepartment',$department->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
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
</div>
@endsection
