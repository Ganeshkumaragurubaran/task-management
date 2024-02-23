<x-app-layout>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Add New Task</h3>

                </div>
                <div class="card-body">
                    <!-- Task Form -->
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"   value="{{$task->title}}" required>
                            @error('title')
                             <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required> {{$task->title}} </textarea>
                            @error('description')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                            <option  value="pending"  <?php if ($task->status === 'pending') echo 'selected'; ?>>Pending</option>
                            <option  value="completed" <?php if ($task->status === 'completed') echo 'selected'; ?>>Completed</option>
                            </select>
                            @error('status')
                           <span style="color:red">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" value="{{$task->due_date}}" required>
                            @error('due_date')
                           <span style="color:red">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Update Task</button>
                             <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">back</a>

                        </div>
                    </form>
                    <!-- End Task Form -->
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
