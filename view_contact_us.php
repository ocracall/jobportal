<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact us List</title>
    <link rel="icon" type="image/x-icon" href="images/logo2.ico">
    <link rel="stylesheet" href="css/viewContactUs.css" />
    <link rel="stylesheet" href="css/admin-console.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php include 'components/header.php' ?>
    <?php
    include("connection.php");
    $session_username = $_SESSION['session_username'];

    if ($session_username == true) {


        $getContactsData = "SELECT * FROM contactform";
        $result = $conn->query($getContactsData);
        if ($result->num_rows > 0) {
            $ContactsData = $result->fetch_assoc();
            // echo print_r($ContactsData);
        }

        // echo "<pre>";
        // print_r($ContactsData);

        if (isset($_POST['delete'])) {
            // echo "Delete Clicked";
             $id = $_POST['delete'];

            $sql = "DELETE FROM contactform WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                //   echo "Record deleted successfully";
                $getContactsData = "SELECT * FROM contactform";
                $result = $conn->query($getContactsData);
                if ($result->num_rows > 0) {
                    $ContactsData = $result->fetch_assoc();
                    // echo print_r($ContactsData);
                }
            } else {
                //   echo "Error deleting record: " . $conn->error;
            }
        }
    } else {
        header('Location: login');
    }
    ?>

    <div class="events-profile">
    <div class="user-profile-display">
            <p><?php echo "Logged in as :" ?> <span class="username"><?php echo $session_username; ?></span></p>
        </div>

        <div>
            <a href="events"><button type="button" name="PublishEvents" class="logout" value="Publish Events">Publish Events</button></a>
            <a href="export.php"><button type="button" name="Export" class="logout" value="Export">Export</button></a>
            <a href="logout.php"><button type="submit" name="Logout" class="logout" value="Logout">Logout</button></a>
        </div>

    </div>

    <div class='table-container'>
        <table id="productTable">
            <div style="margin: 1% auto; text-align:center; font-size: 1.2em">
                <h1>Contacts Data</h1>
            </div>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sr = 0;
                while ($contact = $result->fetch_assoc()) {

                    $sr++;
                    echo "<tr>
    <td>" . $sr . "</td>
    <td>" . $contact['username'] . "</td>
    <td>" . $contact['email'] . "</td>
    <td>" . $contact['subject'] . "</td>
    <td>" . $contact['message'] . "</td>
 
    <td><form method='post' action='#'>
        
        <button name='delete' value=" . $contact['id'] . ">delete</button>
        </form>
    </td>
  </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php include 'components/footer.php' ?>