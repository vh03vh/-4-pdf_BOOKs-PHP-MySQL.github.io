<?php
session_start();
include 'include/connection.php';
include 'include/header.php';
if (!isset($_SESSION['adminInfo'])) {
  header('Location:index.php');
  exit;
} else {


?>

  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->

  <!-- Start Delete category -->
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM categories WHERE id = '$id'";
    $delete = mysqli_query($con, $query);
  }
  ?>
  <!-- End Delete category -->

  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    if (empty($category)) {
      $catErro =  "<div class='alert alert-danger'>" . "الرجاء ملء الحقل أدناه" . "</div>";
    } else {
      $query = "INSERT INTO categories(categoryName) VALUES('$category')";
      $result = mysqli_query($con, $query);
      if (isset($result)) {
        $catSuccess =  "<div class='alert alert-success'>" . "تم إضافة التصنيف بنجاح" . "</div>";
      }
    }
  }

  ?>

  <div class="container-fluid">
    <!-- Start categories section -->
    <div class="categories">
      <?php
      if (isset($catErro)) {
        echo $catErro;
      }
      if (isset($catSuccess)) {
        echo $catSuccess;
      }
      ?>
      <div class="add-cat">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label for="cat">إضافة تصنيف :</label>
            <input type="text" id="cat" class="form-control" name="category">
          </div>
          <button class="custom-btn">إضافة</button>
        </form>
      </div>
      <div class="show-cat">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">الرقم</th>
              <th scope="col">عنوان التصنيف</th>
              <th scope="col">تاريخ الإضافة</th>
              <th scope="col">الإجراء</th>
            </tr>
          </thead>
          <tbody>
            <!-- كمية التصنيفات في الجدول في كل صفحة  -->
            <!-- Fetch categories from database -->
            <?php
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            $limit = 4;
            $start = ($page - 1) * $limit;
            $query = "SELECT * FROM categories ORDER BY id DESC LIMIT $start, $limit";
            $res = mysqli_query($con, $query);
            $sNo = 0;
            while ($row = mysqli_fetch_assoc($res)) {
              $sNo++;
            ?>

              <tr>
                <td><?php echo $sNo; ?></td>
                <td><?php echo $row['categoryName']; ?></td>
                <td><?php echo $row['categoryDate']; ?></td>
                <td>
                  <a href="edit-cat.php?id=<?php echo $row['id']; ?>" class="custom-btn">تعديل</a>
                  <a href="categories.php?id=<?php echo $row['id']; ?>" class="custom-btn confirm">حذف</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
        <!-- Start pagination -->
             <!-- معرفة العدد الكلي  للصف أو معلومات موجودة في قاعدة البيانات -->
        <?php
        $query = "SELECT * FROM categories";
        $result = mysqli_query($con, $query);
        $total_cat = mysqli_num_rows($result);
        $total_pages = ceil($total_cat / $limit);/*دالة التقريب  العدد  الصحيح*/
        ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <!--هنا تنسيق  السابق والتالي  -->
            <li class="page-item"><a class="page-link" href="categories.php?page=<?php if (($page - 1) > 0) {
                                                                                    echo  $page - 1;
                                                                                  } else {
                                                                                    echo 1;
                                                                                  }

                                                                                  ?>">السابق</a></li>
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
            ?>
              <li class="page-item"><a class="page-link" href="categories.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item"><a class="page-link" href="categories.php?page=<?php
                                                                                  if (($page + 1) < $total_pages) {
                                                                                    echo $page + 1;
                                                                                  } elseif (($page + 1) >= $total_pages) {
                                                                                    echo $total_pages;
                                                                                  }
                                                                                  ?>">التالي</a></li>
          </ul>
        </nav>
        <!-- End pagination -->
      </div>
    </div>
    <!-- End categories section -->
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