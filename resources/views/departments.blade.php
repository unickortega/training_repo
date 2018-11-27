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
                  </div><br />
                @endif
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
                            <button class="btn btn-primary">Add Employee</button>
                          </td>
                          <td>
                            <button class="btn btn-success">Edit</button>
                            <!-- ............................................................................................................ -->

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
