const cartItems = [
  { name: "Item 1", amount: 1, price: 10 },
  { name: "Item 2", amount: 2, price: 20 },
  { name: "Item 3", amount: 3, price: 30 }
];

// Function to display cart items
function displayCart() {
  const cartBody = document.getElementById("cart-body");
  cartBody.innerHTML = "";
  cartItems.forEach(item => {
      const row = document.createElement("tr");
      row.innerHTML = `
          <td>${item.name}</td>
          <td>${item.amount}</td>
          <td>${item.price}</td>
          <td>
              <button class="btn btn-danger btn-sm" onclick="removeItem('${item.name}')">Remove</button>
              <button class="btn btn-primary btn-sm" onclick="openChangeAmountModal('${item.name}', ${item.amount})">Change Amount</button>
          </td>
      `;
      cartBody.appendChild(row);
  });
}

// Function to remove item from cart
function removeItem(name) {
  const index = cartItems.findIndex(item => item.name === name);
  if (index !== -1) {
      cartItems.splice(index, 1);
      displayCart();
  }
}

// Function to open modal for changing amount
function openChangeAmountModal(name, currentAmount) {
  const modal = new bootstrap.Modal(document.getElementById('changeAmountModal'), {
      keyboard: false
  });
  document.getElementById('newAmount').value = currentAmount;
  modal.show();
}

// Function to update amount of item in cart
function updateAmount() {
  const name = ''; // Get the name of the item from somewhere
  const newAmount = parseInt(document.getElementById('newAmount').value);
  if (!isNaN(newAmount) && newAmount >= 0) {
      const index = cartItems.findIndex(item => item.name === name);
      if (index !== -1) {
          cartItems[index].amount = newAmount;
          displayCart();
          const modal = bootstrap.Modal.getInstance(document.getElementById('changeAmountModal'));
          modal.hide();
      }
  } else {
      alert("Invalid amount!");
  }
}

// Function to handle checkout
function checkout() {
  // Add your checkout logic here
  alert("Checkout button clicked!");
}

// Initial display of cart
displayCart();