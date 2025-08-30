<?php
//connecting to a database
$server = "localhost";
$username = "root";
$password = "";
$database = "iNotes";

$insert = false;
$update = false;
$delete = false;

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Database Connection Failed</strong>' . mysqli_connect_error() . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
     $sql = "DELETE FROM `notes` WHERE `notes`.`s.no` = $sno";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        // Update the record
        $sno = $_POST['snoEdit'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descEdit'];
        $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `s.no` = $sno";
        $result = mysqli_query($conn, $sql);
        $tag = true;
        
    } else {
        $title = $_POST['title'];
        $description = $_POST['desc'];
        $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Error!</strong> Your note was not inserted successfully because of this error: ' . mysqli_error($conn) . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/2.3.3/css/dataTables.dataTables.min.css">
</head>

<body>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit this Note</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/practise/crud.php" method="POST">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3 mx-5 px-5">
                            <label for="titleEdit" class="form-label">Note title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" required>
                        </div>
                        <div class="mb-3 mx-5 px-5">
                            <label for="descEdit" class="form-label">Description</label>
                            <textarea class="form-control" id="descEdit" name="descEdit" rows="3" required></textarea>
                            <button class="btn btn-primary mt-3" type="submit">Update Note</button>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">iNotes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true">Contact</a>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
    <?php
    if ($insert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Your note has been inserted successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    if ($update) {
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Your note has been updated successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Error!</strong> Your note was not updated successfully because of this error: ' . mysqli_error($conn) . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
    if ($delete) {
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Your note has been deleted successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Error!</strong> Your note was not deleted successfully because of this error: ' . mysqli_error($conn) . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }

    ?>
    <div class="contain my-3 mx-5 px-5">
        <h2 class="mx-5 px-5">Add a Note</h2>
    <form action="/practise/crud.php" method="POST">
        <div class="mb-3 mx-5 px-5">
            <label for="title" class="form-label">Note title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3 mx-5 px-5">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea required>
            <button class="btn btn-primary mt-3" type="submit">Add Note</button>
        </div>
        </form>
    </div>

    <div class="container w-90  px-4 mx-auto my-4">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM `notes`";
                $num = 1;
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<tr>
                    <th scope="row">' . $num . '</th>
                        <td>' . $row['title'] . '</td>
                        <td>' . $row['description'] . '</td>
                        <td><button type="button" class="edit btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" id="' . $row['s.no'] . '">Edit</button> 
                        <button type="button" class="btn btn-primary delete" id= d"' . $row['s.no'] . '">Delete</button></td>
                        </tr>';
                    // echo $num . ". " . $row['title'] . " :- " . $row['description'] . "<br>";

                    $num++;
                }

                ?>




            </tbody>
        </table>
        
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.3.3/js/dataTables.min.js"></script>
    <script>
        // let table = new DataTable('#myTable');
        // let table = new DataTable('#myTable');
        $(document).ready(function () {
            $('#myTable').DataTable();
        });

        
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", function (e) {
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName('td')[0].innerText;
                description = tr.getElementsByTagName('td')[1].innerText;
                // document.getElementById('titleEdit').value = title;
                // document.getElementById('descEdit').value = description;
                document.getElementById('snoEdit').value = e.target.id;
                console.log(e.target.id);
            });
        });


        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", function (e) {
                // tr = e.target.parentNode.parentNode;
                // title = tr.getElementsByTagName('td')[0].innerText;
                // description = tr.getElementsByTagName('td')[1].innerText;

                sno = e.target.id.substr(1, );
                
                if (confirm("Are you sure you want to delete this note!")) {
                    console.log("yes");
                    window.location = `crud.php?delete=${sno}`;
                }
                else{
                    console.log("no");
                }
            });
        });
</script>
</body>

</html>