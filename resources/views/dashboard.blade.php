<x-app-layout>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="card shadow mb-4">
   <div class="card-header py-3 d-flex justify-content-between align-items-center">
         <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
         <a href="{{route('tasks.create')}}" class="btn btn-success btn-sm">Add Task</a>
      </div>
      
      <div class="card-body">
      @include('message')
      <form class="form-inline">
                            <label for="sort_by" class="mr-2">Sort By:</label>
                            <select class="form-control mr-3" id="sort_by" name="sort_by">
                            <option value="" disabled selected>Select Sorting</option>
                                  <option value="due_date_asc" {{ $sortBy === 'due_date_asc' ? 'selected' : '' }}>Due Date (ASC)</option>
                                  <option value="due_date_desc" {{ $sortBy === 'due_date_desc' ? 'selected' : '' }}>Due Date (DESC)</option>
                            </select>
                            <label for="filter_by" class="mr-2">Filter By Status:</label>
                            <select class="form-control" id="filter_by" name="filter_by">
                                <option value="all" {{ $filterBy === 'all' ? 'selected' : '' }}>All</option>
                                <option value="pending" {{ $filterBy === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $filterBy === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>

                            <button type="submit" class="btn btn-primary ml-3">Apply</button>
                        </form>
         <div class="table-responsive  text-nowrap">
            <table class="table table-borde  width="100%" cellspacing="0">
               <thead>
                  <tr>
                  <th>Sr.No</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Due Date</th>
                  <th>Action</th>
                  </tr>
               </thead>
               <tbody>
               @foreach($tasks as $task)
                  <td> {{ $tasks->firstItem()+$loop->index }} </td>
                  <td>{{ $task->title }}</td>
                  <td>   
                     @if($task->status == 'completed')
                      <span class="badge badge-success">Completed</span>
                      @else
                      {{ ucfirst($task->status) }}
                      @endif
                    </td>
                  <td>{{ $task->due_date }}</td>
                  <td>
                  @if($task->status == 'pending')
                  <a href="{{ route('tasks.completed', $task->id) }}" class="btn btn-success btn-sm">Mark as Completed</a>
                  @else
                  <a href="{{ route('tasks.revoke', $task->id) }}" class="btn btn-warning btn-sm">Revoke Completed</a>
                  @endif
                  <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <a href="{{ route('tasks.destroy',$task->id) }}" class="btn btn-danger btn-sm">Delete</a>
                  </td>
     
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {{ $tasks->links() }}
         </div>
      </div>
   </div>
</div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</x-app-layout>
