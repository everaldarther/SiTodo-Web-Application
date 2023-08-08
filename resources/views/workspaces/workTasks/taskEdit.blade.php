    @extends('layouts.sidebar')
    @section('content')
    <div class="container-sm">
        <h3 class="mt-3">Update Task</h3>
        {{-- <h3 class="mt-3">{{ $task }}</h3> --}}
        <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="" class="form-control" id="workId" name="workId" value="{{ $task->workspace_id }}" hidden>
            <div class="mb-3">
              <label for="taskName" class="form-label">Task Name</label>
              <input type="" class="form-control @error('taskName') is-invalid @enderror" id="taskName" name="taskName" value="{{ $task->namaTask }}">
              @error ('taskName') <div class="fs-3 text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
              <label for="startDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="startDate" name="startDate" value="{{ $task->startDate }}">
            </div>
            <div class="mb-3">
              <label for="dueDate" class="form-label">Due Date</label>
              <input type="date" class="form-control" id="dueDate" name="dueDate" value="{{ $task->dueDate }}">
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
