<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Include necessary meta tags here -->
</head>
<body>
  <div>
    <button type="button" id="myButton" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#logout"  style="display: none;"    >
      <i class="fas fa-plus"></i> Logout
    </button>
    @include('livewire.pages.modal.logout')
   
  </div>

  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Add a script to trigger the click event on page load -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var button = document.getElementById('myButton');
      button.style.display = 'block'; // Show the button
      button.click(); // Trigger the click event
      button.style.display = 'none'; // Hide the button again
  
    });
  </script>

</body>
</html>
