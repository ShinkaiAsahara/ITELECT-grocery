<?php
include '../backend/database/session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/process.css">
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
        background-color: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 20px;
    }

    .modal-body {
        width: 100%;
        margin-bottom: 20px;
        border-bottom: 1px gray solid;
    }

    .item-row {
        display: flex;
        justify-content: space-between;
        width: 100%;
        padding: 5px 0;
    }

    .checked-out {
        text-decoration: line-through;
        color: #999;
    }

    .modal-footer {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .close {
        cursor: pointer;
    }

    .modal-btn {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        border: solid 1px black;
    }

    </style>
</head>
<body>
    <header>
        <a href="main.php"><img src="../img/back.png" alt="" class="search"></a>
        <span class="text-top">GroceryHub</span>
        <a href="../backend/logout_action.php"><img src="../img/logout.png" alt="" class="logout"></a>
    </header>

    <main>
        <div class="container">
            <img src="../img/trash.png" alt="" class="trash" onclick="removeProduct(this)">
            <div class="product-container">
                <div class="product-left">
                    <img src="../img/nestle.png" alt="">
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
                    <button>Qty: 2</button>
                </div>
            </div>
        </div>

        <div class="container">
            <img src="../img/trash.png" alt="" class="trash" onclick="removeProduct(this)">
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
                    <button>Qty: 5</button>
                </div>
            </div>
        </div>

        <div class="container">
            <img src="../img/trash.png" alt="" class="trash" onclick="removeProduct(this)">
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
                    <button>Qty: 2</button>
                </div>
            </div>
        </div>

        <div class="container">
            <img src="../img/trash.png" alt="" class="trash" onclick="removeProduct(this)">
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
                    <button>Qty: 1</button>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <button onclick="openModal()">Checklist</button>
    </footer>

     <!-- modal  -->
    <div id="checkoutModal" class="modal">
            <div class="modal-content">
            <div class="modal-header">
                <h2>Checkout Summary</h2>
                <span class="close" onclick="closeModal()">x</span>
            </div>
            <div class="modal-body">
                <div class="item-row">
                    <span class="item">Oranges</span>
                    <span class="qty">Qty: 5</span>
                </div>
                <div class="item-row">
                    <span class="item">Pineapple</span>
                    <span class="qty">Qty: 2</span>
                </div>
                <div class="item-row">
                    <span class="item">Apple</span>
                    <span class="qty">Qty: 1</span>
                </div>
            </div>
            <div class="modal-footer">
                <span class="total-label">Total:</span>
                <span class="total-price">₱1,320</span>
            </div>
            <button class="modal-btn">Checkout</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const checkoutButton = document.querySelector('.modal-btn');
        const itemRows = document.querySelectorAll('.item-row');

        checkoutButton.addEventListener('click', () => {
            itemRows.forEach(row => {
                row.classList.toggle('checked-out');
            });
        });
    });

        function openModal() {
            document.getElementById('checkoutModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('checkoutModal').style.display = 'none';
            window.location.href = 'main.php';
        }

        function removeProduct(trashIcon) {
            
            const productContainer = trashIcon.closest('.container');
            
            if (productContainer) {
                productContainer.remove();
            }
        }
    </script>
</body>
</html>
