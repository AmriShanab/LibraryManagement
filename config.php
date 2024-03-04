<?php
session_start();
$conn = mysqli_connect("localhost","root","","LibraryDB");





function getUserStatistics($conn)
{
    $userStatistics = array();

    // Total users
    $queryTotalUsers = "SELECT COUNT(*) as totalUsers FROM users";
    $resultTotalUsers = mysqli_query($conn, $queryTotalUsers);
    $rowTotalUsers = mysqli_fetch_assoc($resultTotalUsers);
    $userStatistics['totalUsers'] = $rowTotalUsers['totalUsers'];

    // Active users
    $queryActiveUsers = "SELECT COUNT(*) as activeUsers FROM users WHERE status = 'active'";
    $resultActiveUsers = mysqli_query($conn, $queryActiveUsers);
    $rowActiveUsers = mysqli_fetch_assoc($resultActiveUsers);
    $userStatistics['activeUsers'] = $rowActiveUsers['activeUsers'];

    // Add more statistics as needed

    return $userStatistics;
}

function getTotalBooks($conn) {
    $query = "SELECT COUNT(*) as totalBooks FROM books";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['totalBooks'];
}

function getBookStatusStatistics($conn) {
    $query = "SELECT 
                SUM(CASE WHEN status = 'Available' THEN 1 ELSE 0 END) as availableBooks,
                SUM(CASE WHEN status = 'Checked-Out' THEN 1 ELSE 0 END) as checkedOutBooks
              FROM books";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function getBookCategories($conn) {
    $query = "SELECT DISTINCT category, genre FROM books";
    $result = mysqli_query($conn, $query);
    $categories = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }

    return $categories;
}


?>

