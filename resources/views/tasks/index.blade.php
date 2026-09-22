<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>
</head>
<body>

    <h1>Personal Task Manager</h1>

    <a href="/tasks/create">+ Add Task</a>

    <br><br>

    <table border="1" cellpadding="10">

        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>

        @foreach ($tasks as $task)

        <tr>

            <td>{{ $task->task_name }}</td>

            <td>{{ $task->description }}</td>

            <td>{{ $task->status }}</td>

            <td>{{ $task->due_date }}</td>

            <td>

                <a href="/tasks/{{ $task->id }}/edit">Edit</a>

                <form action="/tasks/{{ $task->id }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

</body>
</html>