    @extends('layouts.sidebar')
    @section('content')
    <div class="container-sm">
        <h3 class="mt-3">Create Task</h3>
        {{-- <h3 class="mt-3">{{ $workId }}</h3> --}}
        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="" class="form-control" id="workId" name="workId" value="{{ $workId }}" hidden>
            <div class="mb-3">
              <label for="taskName" class="form-label">Task Name</label>
              <input type="" class="form-control @error('taskName') is-invalid @enderror" id="taskName" name="taskName" placeholder="New Task name">
              @error ('taskName') <div class="fs-3 text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
              <label for="startDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="startDate" name="startDate">
            </div>
            <div class="mb-3">
              <label for="dueDate" class="form-label">Due Date</label>
              <input type="date" class="form-control" id="dueDate" name="dueDate">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select">
                  <option value="pending">Pending</option>
                  <option value="onprogress">On-Progress</option>
                  <option value="done">Done</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    @endsection
