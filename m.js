function openPopup() {
  var popup = document.getElementById("popup");
  popup.style.display = "block";
}

function closePopup() {
  var popup = document.getElementById("popup");
  popup.style.display = "none";
}


function calculateTotalCost() {
  // Get the selected vehicle's price per kilometer
  const vehicleModel = document.getElementById("vehicleModel");
  const selectedOption = vehicleModel.options[vehicleModel.selectedIndex];
  const pricePerKm = parseFloat(selectedOption.getAttribute("data-price"));

  // Get the user-entered distance
  const distanceInput = document.getElementById("distance");
  const distance = parseFloat(distanceInput.value);

  // Check if pricePerKm and distance are valid numbers
  if (!isNaN(pricePerKm) && !isNaN(distance)) {
    // Calculate the total cost
    const totalCost = pricePerKm * distance;

    // Display the total cost
    const totalCostSpan = document.getElementById("total-cost");
    totalCostSpan.textContent = totalCost.toFixed(2) + " ₹";
  } else {
    // Handle invalid inputs (e.g., NaN)
    const totalCostSpan = document.getElementById("total-cost");
    totalCostSpan.textContent = "Invalid input";
  }
}

// Attach the calculateTotalCost function to the button's click event
document.querySelector("button").addEventListener("click", calculateTotalCost);

// Assuming you have JavaScript code to calculate the total cost
// Update the "price" output element with the calculated value
var totalCost = calculateTotalCost(); // Replace this with your actual calculation logic
document.getElementById("total-cost").textContent = totalCost + " ₹";




