<?php
$con = mysqli_connect("localhost", "root", "", "pb") 
    or die("Could not connect to the server.<br>" . mysqli_connect_error()); 

// Sanitize input to prevent SQL injection
$username = mysqli_real_escape_string($con, $_POST['username'] ?? '');
$password = mysqli_real_escape_string($con, $_POST['password'] ?? '');

// Check if the login form was submitted
if (isset($_POST['login'])) {
    if (empty($username) || empty($password)) {
        echo '<script>alert("Both fields are required.");
        window.location.href = "modal.html";</script>';
    } else {
        $password = md5($password); // Hash the password
        $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $query) or die("Query failed: " . mysqli_error($con));

        if (mysqli_num_rows($result) > 0) {
            header("Location: cake.php");
            exit();
        } else {
            echo '<script>alert("Wrong username or password.");
            window.location.href = "modal.html";</script>';
        }
    }
}

// Register logic
if (isset($_POST['register'])) {
    if (empty($username) || empty($password)) {
        echo '<script>alert("All fields are required.");
        window.location.href = "modal.html";</script>';
    } else {
        $password = md5($password); // Hash password
        $checkUser = "SELECT * FROM login WHERE username='$username'";
        $checkResult = mysqli_query($con, $checkUser) or die("Query failed: " . mysqli_error($con));

        if (mysqli_num_rows($checkResult) > 0) {
            echo '<script>alert("Username already exists!");
            window.location.href = "modal.html";</script>';

        } else {
            $insertQuery = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
            mysqli_query($con, $insertQuery) or die("Query failed: " . mysqli_error($con));

            if (mysqli_affected_rows($con) > 0) {
                echo '<script>
                    alert("Registration successful. Please log in.");
                    window.location.href = "modal.html";
                </script>';
                exit();
            } else {
                echo '<script>alert("Error during registration. Please try again.")
                window.location.href = "modal.html";
                </script>';
            }
        }
    }
}

// Delete account logic
if (isset($_POST['delete_account'])) {
    if (empty($username) || empty($password)) {
        echo '<script>alert("Both fields are required to delete your account.");
        window.location.href = "modal.html"; </script>';
    } else {
        $password = md5($password); // Hash the password
        $deleteQuery = "DELETE FROM login WHERE username='$username' AND password='$password'";
        mysqli_query($con, $deleteQuery) or die("Query failed: " . mysqli_error($con));

        if (mysqli_affected_rows($con) > 0) {
            echo '<script>
                alert("Your account has been deleted.");
                window.location.href = "cake.php";
            </script>';
            exit();
        } else {
            echo '<script>alert("Failed to delete account. Check your username and password.");
            window.location.href = "modal.html";</script>';
        }
    }
}

// Close the database connection
mysqli_close($con);
?>
