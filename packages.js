
function showContainer(containerNumber) {
  // Hide all containers first
  document.querySelectorAll('.container1, .container2, .container3').forEach(function(container) {
    container.style.display = 'none';
  });

  // Show the selected container
  document.querySelector('.container' + containerNumber).style.display = 'block';
}