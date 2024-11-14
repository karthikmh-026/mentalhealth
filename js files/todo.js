const taskInput = document.querySelector(".task-input input");
const addTaskBtn = document.querySelector(".add-task-btn");
const taskList = document.querySelector(".task-box");
const taskLeftCount = document.querySelector(".task-left-counts");
const clearAll = document.querySelector(".clear-btn");
const generateImageBtn = document.querySelector(".generate-image-btn");
const setReminderBtn = document.querySelector(".set-reminder-btn");

let tasks = [];
let reminderTimeout;

// Function to update the tasks array and the task list
function updateTasks() {
  taskList.innerHTML = "";
  clearAll.style.display = "none";

  if (tasks.length > 0) {
    tasks.forEach((task, index) => {
      const taskItem = document.createElement("li");
      taskItem.className = "task";
      taskItem.innerHTML = `
        <span>${task}</span>
        <div>
          <button class="complete-btn"><i class="fas fa-check"></i></button>
          <button class="edit-btn"><i class="fas fa-edit"></i></button>
        </div>
      `;

      taskList.appendChild(taskItem);
    });

    clearAll.style.display = "block";
  } else {
    const noTasksMessage = document.createElement("span");
    noTasksMessage.textContent = "You don't have any tasks here";
    taskList.appendChild(noTasksMessage);
  }

  taskLeftCount.textContent = `${tasks.length} task(s) todo`;
}

// Function to add a new task to the tasks array
function addTask() {
  const taskText = taskInput.value.trim();

  if (taskText !== "") {
    tasks.push(taskText);
    taskInput.value = "";

    updateTasks();
  }
}

// Function to complete a task
function completeTask(targetTask) {
  const taskItem = targetTask.closest(".task");
  const index = Array.from(taskList.children).indexOf(taskItem);

  if (index >= 0 && index < tasks.length) {
    tasks.splice(index, 1);

    updateTasks();
  }
}

// Function to edit a task
function editTask(targetTask) {
  const taskItem = targetTask.closest(".task");
  const index = Array.from(taskList.children).indexOf(taskItem);
  const taskText = taskItem.querySelector("span").textContent;

  const updatedTaskText = prompt("Edit task", taskText);

  if (updatedTaskText !== null) {
    tasks[index] = updatedTaskText.trim();

    updateTasks();
  }
}

// Event listener for the add task button
addTaskBtn.addEventListener("click", addTask);

// Event listener for the enter key on the task input
taskInput.addEventListener("keydown", (event) => {
  if (event.key === "Enter") {
    addTask();
  }
});

// Event delegation for the complete and edit buttons
taskList.addEventListener("click", (event) => {
  const target = event.target;

  if (target.classList.contains("complete-btn")) {
    completeTask(target);
  } else if (target.classList.contains("edit-btn")) {
    editTask(target);
  }
});

// Event listener for the clear all button
clearAll.addEventListener("click", () => {
  tasks = [];
  updateTasks();
});

// Event listener for the generate image button
generateImageBtn.addEventListener("click", () => {
  const container = document.querySelector(".container");

  html2canvas(container).then((canvas) => {
    const image = canvas.toDataURL("image/png");
    const link = document.createElement("a");
    link.href = image;
    link.download = "todo-list.png";
    link.click();
  });
});

// Function to display a "Hurry up" message
function displayHurryUpMessage() {
  const hurryUpMessage = document.querySelector(".hurry-up-message");
  hurryUpMessage.style.display = "block";
}

// Function to set a reminder
function setReminder() {
  const reminderTimeInput = prompt("Set reminder time (in seconds)");
  const reminderTime = parseInt(reminderTimeInput);

  if (!isNaN(reminderTime)&& reminderTime>0) {
    const currentDateTime = new Date();
    const reminderDateTime = new Date(currentDateTime.getTime() + reminderTime* 1000);

    clearTimeout(reminderTimeout);
    reminderTimeout = setTimeout(() => {
      alert("Hurry up! Complete all your tasks!");
      displayHurryUpMessage();
    }, reminderTime  * 1000);

    alert(`Reminder set for: ${reminderDateTime.toLocaleString()}`);
  } else {
    alert("Invalid input. Please enter a valid number of minutes.");
  }
}

// Event listener for the set reminder button
setReminderBtn.addEventListener("click", setReminder);







  
  
  