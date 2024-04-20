document.addEventListener('DOMContentLoaded', function() {
    const budgetForm = document.getElementById('budget-form');
    const budgetTracker = document.getElementById('budget-tracker');
    const addExpenseBtn = document.getElementById('add-expense-btn');
  
    let initialBudget = 0;
    let totalExpenses = 0;
  
    budgetForm.addEventListener('submit', function(event) {
      event.preventDefault();
  
      // Get initial budget input value
      initialBudget = parseFloat(document.getElementById('initial-budget').value);
  
      // Calculate remaining budget
      const remainingBudget = initialBudget - totalExpenses;
  
      // Display budget tracker
      budgetTracker.innerHTML = `
        <h2>Budget Tracker</h2>
        <p>Initial Budget: $${initialBudget}</p>
        <p>Total Expenses: $${totalExpenses}</p>
        <p>Remaining Budget: $${remainingBudget}</p>
      `;
    });
  
    addExpenseBtn.addEventListener('click', function() {
      // Get expense input value
      const expense = parseFloat(document.getElementById('expenses').value);
  
      // Add expense to total expenses
      totalExpenses += expense;
  
      // Clear expense input field
      document.getElementById('expenses').value = '';
  
      // Display added expense in budget tracker
      const expenseItem = document.createElement('div');
      expenseItem.classList.add('expense');
      expenseItem.textContent = `Expense: $${expense}`;
      budgetTracker.appendChild(expenseItem);
    });
  });
  