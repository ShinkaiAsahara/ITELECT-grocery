<?php
include '../backend/database/session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="../img/FruitHubLogo.ico" type="image/x-icon">
    <title>GroceryHub</title>
    <style>
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
        background-color: #fff;
        margin: 10% auto; 
        padding: 30px;
        border-radius: 10px; 
        width: 90%; 
        max-width: 500px;
        transition: transform 0.3s ease;
        transform: translateY(-30px); 
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .modal-content.show {
        transform: translateY(0); 
    }

    .close {
        color: #888;
        font-size: 28px;
        font-weight: bold;
        align-self: flex-end;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #ff0000; 
        text-decoration: none;
    }

    label {
        font-weight: bold; 
        margin-top: 10px; 
    }

    input[type="text"], input[type="number"], input[type="file"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
    }

    button {
        background-color: #4CAF50; 
        color: white;
        padding: 10px 15px; 
        border: none; 
        border-radius: 5px; 
        cursor: pointer; 
        transition: background-color 0.3s; 
        align-self: center; /* Center horizontally */
    }

    button:hover {
        background-color: #45a049;
    }

    </style>
</head>
<body>
    <header>
        <div class="search-container">
            <img src="../img/search.png" alt="Search" class="search" onclick="toggleSearch()">
            <input type="text" id="searchInput" placeholder="Search for products...">
        </div>
        <span class="text-top">GroceryHub</span>
        <a href="process.php"><img src="../img/basket.png" alt="Basket" class="basket"></a>
    </header>
    
    <main>
        <div class="container">
            <img src="../img/edit.png" alt="Edit" class="edit">
            <div class="product-container">
                <div class="product-left">
                    <img src="../img/nestle.png" alt="Nestle">
                </div>
                <div class="product-mid">
                    <p class="product-text">Fresh Milk</p>
                    <div class="flex-container">
                        <p class="brand">Nestle</p>
                        <span class="weight">100ml</span>
                    </div>
                    <p class="store">Anystore</p>
                    <p class="price">₱120.00</p>
                </div>
                <div class="product-right">
                    <button>Add Basket</button>
                </div>
            </div>
        </div>

        <div class="container">
            <img src="../img/edit.png" alt="Edit" class="edit">
            <div class="product-container">
                <div class="product-left">
                    <img src="../img/oranges.png" alt="Nestle">
                </div>
                <div class="product-mid">
                    <p class="product-text">Oranges</p>
                    <div class="flex-container">
                        <p class="brand">Bukidnon</p>
                        <span class="weight">1kg</span>
                    </div>
                    <p class="store">Supermarket</p>
                    <p class="price">₱150.00</p>
                </div>
                <div class="product-right">
                    <button>Add Basket</button>
                </div>
            </div>
        </div>

        <div class="container">
            <img src="../img/edit.png" alt="Edit" class="edit">
            <div class="product-container">
                <div class="product-left">
                    <img src="../img/apple.png" alt="Nestle">
                </div>
                <div class="product-mid">
                    <p class="product-text">Apple</p>
                    <div class="flex-container">
                        <p class="brand">Baguio</p>
                        <span class="weight">2kg</span>
                    </div>
                    <p class="store">Supermarket</p>
                    <p class="price">₱130.00</p>
                </div>
                <div class="product-right">
                    <button>Add Basket</button>
                </div>
            </div>
        </div>

        <div class="container">
            <img src="../img/edit.png" alt="Edit" class="edit">
            <div class="product-container">
                <div class="product-left">
                    <img src="../img/pineapple.jpg" alt="Nestle">
                </div>
                <div class="product-mid">
                    <p class="product-text">Pineapple</p>
                    <div class="flex-container">
                        <p class="brand">Dahilayan</p>
                        <span class="weight">1kg</span>
                    </div>
                    <p class="store">Supermarket</p>
                    <p class="price">220.00</p>
                </div>
                <div class="product-right">
                    <button>Add Basket</button>
                </div>
            </div>
        </div>

    </main>

    <footer>
        <button onclick="openModal()">Add List</button>
    </footer>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Add Grocery Item</h2>
            <form action="../backend/add_action.php" method="POST" enctype="multipart/form-data">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required>

                <label for="brand">Brand:</label>
                <input type="text" id="brand" name="brand" required>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>

                <label for="weight">Weight/Volume:</label>
                <input type="text" id="weight" name="weight" required>

                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required>

                <label for="store">Store:</label>
                <input type="text" id="store" name="store" required>

                <label for="productImage">Product Image:</label>
                <input type="file" id="productImage" name="productImage" accept="image/*">

                <button class="modal-btn">Add Item</button>
            </form>
        </div>
    </div>

        <script>
        function openModal() {
            const modal = document.getElementById('myModal');
            const modalContent = modal.querySelector('.modal-content');
            modal.style.display = 'block';
            modalContent.classList.add('show'); 
        }

        function closeModal() {
            const modal = document.getElementById('myModal');
            const modalContent = modal.querySelector('.modal-content');
            modalContent.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none'; 
                window.location.href = 'main.php'; 
            }, 300); 
        }

        function toggleSearch() {
            const searchInput = document.getElementById('searchInput');
            searchInput.classList.toggle('show');
        }

  
        function filterProducts() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const containers = document.querySelectorAll('.container');

            containers.forEach(container => {
                const productText = container.querySelector('.product-text').textContent.toLowerCase();
                if (productText.includes(searchInput)) {
                    container.style.display = ''; 
                } else {
                    container.style.display = 'none';
                }
            });
        }
        document.getElementById('searchInput').addEventListener('input', filterProducts);
    </script>
</body>
</html>
