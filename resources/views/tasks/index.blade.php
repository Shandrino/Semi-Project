<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white;
            color: #1e3a5f;
        }

        .header {
            background-color: #1565c0;
            color: white;
            padding: 25px 40px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top-section h2 {
            margin: 0;
            color: #1565c0;
        }

        .add-button {
            background-color: #1565c0;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: bold;
        }

        .add-button:hover {
            background-color: #0d47a1;
        }

        .table-card {
            background-color: white;
            border: 1px solid #bbdefb;
            border-radius: 8px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #1565c0;
            color: white;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #bbdefb;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f1f8ff;
        }

        .status {
            color: #1565c0;
            font-weight: bold;
        }

        .edit-button {
            background-color: #1976d2;
            color: white;
            text-decoration: none;
            padding: 7px 12px;
            border-radius: 5px;
        }

        .delete-button {
            background-color: white;
            color: #1565c0;
            border: 1px solid #1565c0;
            padding: 7px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .complete-button {
            background-color: #1565c0;
            color: white;
            border: none;
            padding: 7px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-button:hover,
        .complete-button:hover {
            background-color: #0d47a1;
        }

        .delete-button:hover {
            background-color: #e3f2fd;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #607d8b;
        }

        @media (max-width: 800px) {
            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }

            .top-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Personal Task Manager</h1>
    </div>

    <div class="container">

        <div class="top-section">
            <h2>My Tasks</h2>

            <a href="/tasks/create" class="add-button">
                + Add Task
            </a>
        </div>

        <div class="table-card">

            <table>

                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>

                @forelse ($tasks as $task)

                <tr>

                    <td>
                        <strong>{{ $task->task_name }}</strong>
                    </td>

                    <td>
                        {{ $task->description }}
                    </td>

                    <td>
                        <span class="status">
                            {{ $task->status }}
                        </span>
                    </td>

                    <td>
                        {{ $task->due_date }}
                    </td>

                    <td>

                        <!-- EDIT BUTTON -->
                        <a href="/tasks/{{ $task->id }}/edit"
                           class="edit-button">
                            Edit
                        </a>

                        <!-- DELETE BUTTON -->
                        <form action="/tasks/{{ $task->id }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="delete-button">
                                Delete
                            </button>

                        </form>

                        <!-- UPDATE STATUS BUTTON -->
                        <form action="/tasks/{{ $task->id }}/status"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                    class="complete-button">

                                {{ $task->status === 'Pending'
                                    ? 'Complete'
                                    : 'Set Pending' }}

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="empty">
                        No tasks yet. Click "Add Task" to create one.
                    </td>
                </tr>

                @endforelse

            </table>

        </div>

    </div>

</body>
</html>