<?php
session_start();
include 'include/connection.php';
include 'include/header.php';
if (!isset($_SESSION['adminInfo'])) {
    header('Location:index.php');
} else {


?>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    
  <!-- Start Delete Book -->
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM books WHERE id = '$id'";
    $delete = mysqli_query($con, $query);
  }
  ?>
  <!-- End Delete book -->

    <div class="container-fluid">
        <div class="show-books">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">الرقم</th>
                        <th scope="col">عنوان الكتاب</th>
                        <th scope="col">المؤلف</th>
                        <th scope="col">التصنيف</th>
                        <th scope="col">تاريخ الإضافة</th>
                        <th scope="col">الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fetch categories from database -->
                    <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $limit = 4;
                    $start = ($page - 1) * $limit;
                    $query = "SELECT * FROM books ORDER BY id DESC LIMIT $start, $limit";
                    $res = mysqli_query($con, $query);
                    $sNo = 0;
                    while ($row = mysqli_fetch_assoc($res)) {
                        $sNo++;
                    ?>

                        <tr>
                            <td><?php echo $sNo; ?></td>
                            <td><?php echo $row['bookTitle']; ?></td>
                            <td><?php echo $row['bookAuthor']; ?></td>
                            <td><?php echo $row['bookCat']; ?></td>
                            <td><?php echo $row['bookDate']; ?></td>
                            <td>
                                <a href="edit-book.php?id=<?php echo $row['id']; ?>" class="custom-btn">تعديل</a>
                                <a href="books.php?id=<?php echo $row['id']; ?>" class="custom-btn confirm">حذف</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
    include 'include/footer.php';
    ?>


<?php
}
?>