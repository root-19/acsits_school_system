<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management - View Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <h1 class="text-2xl font-bold mb-4">Task List</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php
                require_once __DIR__ . '/../config/configuration.php';

                // Fetch tasks from the database
                $sql = "SELECT * FROM task";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="bg-gray-50 p-4 rounded-lg shadow-md">';
                        echo '<h2 class="text-lg font-semibold">Task : ' . $row["id"] . '</h2>';
                        echo '<p class="text-sm text-gray-600 mb-2">' . $row["title"] . '</p>';
                        echo '<p class="text-sm text-gray-600 mb-2">' . $row["description"] . '</p>';
                        echo '<p class="text-sm text-gray-500">Due Date: ' . $row["due_date"] . '</p>';
                        echo '<p class="text-sm text-gray-500">Assignee: ' . $row["assignee"] . '</p>';
                        echo '<form action="update_task.php" method="POST">';
                        echo '<input type="hidden" name="task_id" value="' . $row["id"] . '">';
                        echo '<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600
                            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 mt-2">Mark as Accomplished</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-gray-500">No tasks found.</p>';
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>

</html>
