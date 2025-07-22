<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student To-Do Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="todo-app">
      <h2>Student To-Do List <img src="icon.png" alt="icon" /></h2>

      <!-- Input Area -->
      <div class="input-section">
        <input type="text" id="task-input" placeholder="Add your new task...">
        <button onclick="addTask()">Add</button>
      </div>

      <!-- Filter Buttons -->
      <div class="filter-section">
        <button onclick="filterTasks('all')">All</button>
        <button onclick="filterTasks('active')">Active</button>
        <button onclick="filterTasks('completed')">Completed</button>
        <button onclick="clearCompleted()">Clear Completed</button>
      </div>

      <!-- Task List -->
      <ul id="task-list" class="task-list">
        <!-- Tasks will appear here dynamically -->
      </ul>
    </div>
  </div>

  <script src="script.js"></script>

  <script>
    // Select elements
const taskInput = document.getElementById("task-input");
const taskList = document.getElementById("task-list");

function addTask() {
  const taskText = taskInput.value.trim();
  if (taskText === "") return;

  // Create task item
  const li = document.createElement("li");
  li.innerHTML = `
    <span onclick="toggleComplete(this)">${taskText}</span>
    <button onclick="deleteTask(this)">✖</button>
  `;
  taskList.appendChild(li);
  taskInput.value = "";
}

function deleteTask(button) {
  const li = button.parentElement;
  li.remove();
}

function toggleComplete(span) {
  const li = span.parentElement;
  li.classList.toggle("completed");
}

function filterTasks(type) {
  const tasks = taskList.getElementsByTagName("li");
  for (let task of tasks) {
    switch (type) {
      case "all":
        task.style.display = "flex";
        break;
      case "active":
        task.style.display = task.classList.contains("completed") ? "none" : "flex";
        break;
      case "completed":
        task.style.display = task.classList.contains("completed") ? "flex" : "none";
        break;
    }
  }
}

function clearCompleted() {
  const tasks = taskList.getElementsByTagName("li");
  for (let i = tasks.length - 1; i >= 0; i--) {
    if (tasks[i].classList.contains("completed")) {
      tasks[i].remove();
    }
  }
}

  </script>
</body>
</html>
