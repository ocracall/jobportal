<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Temple in Gondia">
    <meta name="keywords" content="Temple, Mandir, Gondia, Gondiya, Gayatri, Gayatri Shaktipeeth, Shaktipeeth, Gayatri Mandir,Gayatri Temple, Shiv Mandir, Shiv Temple">
    <meta name="robots" content="index, follow">
    <title>Sai Rojgar</title>
    <link rel="icon" type="image/x-icon" href="image/sai_rojgar_icon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/ViewContactData.css" />
    <script language="JavaScript" type="text/javascript" src="/js/index.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Kumbh+Sans:wght@100..900&family=Mukta:wght@200;300;400;500;600;700;800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poetsen+One&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include("connection.php");
    // $getEvents = "SELECT * FROM jobList";
    // $result = $conn->query($getEvents);


    $sql = "SELECT * FROM jobList ORDER BY orderId";
    $all_product = $conn->query($sql);

    while ($Events = $all_product->fetch_assoc()) {
        // echo print_r($Events) ;
        // echo ($Events['position']) ;
        // echo "<h1> Heading</h1><br>" ;
    }

    ?>

    <div class="bg-light">
        <?php
        session_start();

        $session_username = $_SESSION['session_username'] ?? null;
        // echo $session_username;
        if (isset($session_username)) {
            include 'components/headerAdmin.php';
        } else {
            include 'components/header.php';
        }
        ?>

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


                    $sql = "SELECT * FROM contactform";
                    $ContactTableData = $conn->query($sql);

                    if (isset($_POST['delete'])) {
                        // echo "Delete Clicked";
                        $id = $_POST['delete'];

                        $sql = "DELETE FROM contactform WHERE id=$id";

                        if ($conn->query($sql) === TRUE) {
                            //   echo "Record deleted successfully";
                            $sql = "SELECT * FROM contactform";
                            $ContactTableData = $conn->query($sql);
                        } else {
                            //   echo "Error deleting record: " . $conn->error;
                        }
                    }

                    while ($ContactData = $ContactTableData->fetch_assoc()) {
                        // echo print_r($ContactData) ;
                        // echo ($ContactData['position']) ;
                        // echo "<h1> Heading</h1><br>" ;
                        $sr++;
                        echo "<tr>
<td>" . $sr . "</td>
<td>" . $ContactData['username'] . "</td>
<td>" . $ContactData['email'] . "</td>
<td>" . $ContactData['subject'] . "</td>
<td>" . $ContactData['message'] . "</td>

<td><form method='post' action='#'>

<button class='contactDeleteBtn' name='delete' value=" . $ContactData['id'] . ">delete</button>
</form>
</td>
</tr>";
                    }



                    ?>
                </tbody>
            </table>
        </div>

        <?php include 'components/footer.php' ?>
</body>

</html>