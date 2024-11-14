
function confirmReset() {
    var confirmed = confirm("Are you sure you want to reset the habit ?");
    if (confirmed) {
      // Perform the form reset
      document.getElementById("myForm").reset();
    }
  }
  function displayText() {
    var inputText = document.getElementById("textInput").value;
    document.getElementById("displayArea").innerHTML = "Your Habit: " + inputText;
}
  