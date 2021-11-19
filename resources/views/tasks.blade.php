@extends('app')

@section('content')
    @if (count($errors) > 0)
        <div class="error">
            <strong>Errors were found:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <h2>Create a new task</h2>
        <form action="{{ route('createNewTask') }}" method="post">
            {{ csrf_field() }}
            <label for="task">Task</label>
            <input type="text" name="name" id="task-name">
            <br>
            <label for="deadline">Deadline</label>
            <input type="datetime-local" name="deadline" id="task-deadline">
            <br>
            <button type="submit">Add Task</button>
        </form>
    </div>
    <hr>
    <div>
        <h2>Tasks</h2>
        <table>
            <thead>
                <tr>
                    <th style="width: 60%">Name</th>
                    <th style="width: 20%">Status</th>
                    <th style="width: 10%">Deadline</th>
                    <th style="width: 10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($tasks) > 0)
                    @foreach ($tasks as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>
                                @if ($item->completed)
                                    Completed {{ date_diff(new DateTime(), $item->completed)->format("%a day(s) %H:%I:%S")}} ago.
                                @else
                                    @if (date_diff($item->deadline, new DateTime())->format("%R") === "-")
                                        Due in {{ date_diff($item->deadline, new DateTime())->format("%a day(s) %H:%I:%S") }}.
                                    @else
                                        Expired {{ date_diff($item->deadline, new DateTime())->format("%a day(s) %H:%I:%S") }} ago.
                                    @endif
                                @endif
                            </td>
                            <td>{{$item->deadline}}</td>
                            <td>
                                <form action="{{ route('toggleCompleted', ['taskId' => $item->id]) }}" method="post">
                                    @method('patch')
                                    {{ csrf_field() }}
                                    @if (! $item->completed)
                                    <button type="submit">Mark as complete</button>
                                    @else
                                    <button type="submit">Mark as incomplete</button>
                                    @endif
                                </form>
                                <form action="{{ route('deleteTask', ['taskId' => $item->id]) }}" method="post">
                                    @method('delete')
                                    {{ csrf_field() }}
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td id="emptytable" colspan="4">No tasks available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection