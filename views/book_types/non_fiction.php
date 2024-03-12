<?php
include '/../xampp/htdocs/LibraryManagement/views/layouts/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Fiction Books</title>
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="../../Assets/Images/sapiens.webp" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Sapiens- a Brief History of Humankind</h5>
                    <p class="card-text">Yuval Noeh Harari</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="../../Assets/Images/Immortal-Life-of-Henrietta-Lacks.jpg" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Immortal Life of Henrietta Lacks</h5>
                    <p class="card-text">Rebecca Skloot</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="../../Assets/Images/educated.jpeg" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Educated : A Memeoir</h5>
                    <p class="card-text">Tara Westover</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="../../Assets/Images/glass.webp" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Glass Castle</h5>
                    <p class="card-text">Jeannette Walls</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="../../Assets/Images/into the wild.webp" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Into The Wild</h5>
                    <p class="card-text">John Krakuer</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="../../Assets/Images/quiet.jpeg" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Quiet : The Power of Introverts in a World that Can't stop talking</h5>
                    <p class="card-text">Susan Cain</p>
                    <button><a href="../admin/book_borrow.php">TO BORROW</a></button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="../../Assets/Images/wright brothers.jpg" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Wright Brothers</h5>
                    <p class="card-text">David McCullough</p>
                </div>
            </div>
        </div>
       
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="../../Assets/Images/michelle-obama-2-28d967730dfd4825bf67f8bf61310ce9.jpg" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">Becoming</h5>
                    <p class="card-text">Micheller Obama</p>
                </div>
            </div>
        </div>

        

        <!-- Card 10 -->
        <div class="col-md-4 mb-4">
            <div class="card books">
                <img src="../../Assets/Images/diry of young girl.webp" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">The Diary of a Young Girl </h5>
                    <p class="card-text">Anne Frank</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include '/../xampp/htdocs/LibraryManagement/views/layouts/footer.php';
