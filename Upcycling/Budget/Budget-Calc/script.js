document.getElementById('budget-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Get values from input fields
    const budget = parseFloat(document.getElementById('budget').value);
    const laborCost = parseFloat(document.getElementById('labor-cost').value) || 0;
    const materialsCost = parseFloat(document.getElementById('materials-cost').value) || 0;
    const additionalCost = parseFloat(document.getElementById('additional-cost').value) || 0;
    
    // Calculate total cost
    const totalCost = laborCost + materialsCost + additionalCost;
    
    // Display budget breakdown
    const budgetResult = document.getElementById('budget-result');
    budgetResult.innerHTML = `
      <h2>Budget Breakdown</h2>
      <p>Total Budget: $${budget}</p>
      <p>Estimated Labor Cost: $${laborCost}</p>
      <p>Estimated Materials Cost: $${materialsCost}</p>
      <p>Estimated Additional Features Cost: $${additionalCost}</p>
      <h3>Total Estimated Cost: $${totalCost}</h3>
    `;
  });
  