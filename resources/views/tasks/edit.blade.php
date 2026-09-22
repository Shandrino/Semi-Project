<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

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
        }

        .container {
            width: 90%;
            max-width: 650px;
            margin: 40px auto;
        }

        .card {
            background-color: white;
            border: 1px solid #bbdefb;
            border-radius: 8px;
            padding: 30px;
        }

        h2 {
            color: #1565c0;
            margin-top: 0;
        }

        label {
            font-weight: bold;
            color: #1e3a5f;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #90caf9;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 15px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #1565c0;
        }

        .button {
            background-color: #1565c0;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .button:hover {
            background-color: #0d47a1;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #1565c0;
            text-decoration: none;
            font-weight: bold;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Personal Task Manager</h1>
    </div>

    <div class="container">

        <div class="card">

            <h2>Edit Task</h2>

            <form action="/tasks/{{ $task->id }}" method="POST">

                @csrf
                @method('PUT')

                <label>Task Name:</label>
                <input
                    type="text"
                    name="task_name"
                    value="{{ $task->task_name }}"
                    required
                >

                <br><br>

                <label>Description:</label>
                <textarea name="description">{{ $task->description }}</textarea>

                <br><br>

                <label>Status:</label>
                <select name="status">

                    <option value="Pending"
                        {{ $task->status == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ $task->status == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

                <br><br>

                <label>Due Date:</label>
                <input
                    type="date"
                    name="due_date"
                    value="{{ $task->due_date }}"
                >

                <br><br>

                <button type="submit" class="button">
                    Update Task
                </button>

            </form>

            <a href="/" class="back">
                ← Back to Tasks
            </a>

        </div>

    </div>

</body>
</html>