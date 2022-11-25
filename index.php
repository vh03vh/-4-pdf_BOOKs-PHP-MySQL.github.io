<?php
include 'layout/include/header.php';
?>


<!-- Start banar -->
<div class="banar">
	  <div class="lib-info">

<h4>"قم الآن بتحميل أهم المحاضرات " </h4>
<p>كتب برمجية ..محاضرات في علم الحاسوب و محاضرات في تخصص الإعلام الآلي </p>


</div>
</div>
<!-- End banar -->
<!-- Start Books -->
<div class="books">
	  <div class="container">
  <div class="row">
  	<!-- bach njibo kutob mn base de donne  -->
  	    <?php
            $query = "SELECT * FROM books ORDER BY id DESC";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
    <div class="col-md-6 col-lg-4">
                        <div class="card text-center">
                            <div class="img-cover">
                                <img src="uploads\bookCovers/<?php echo $row['bookCover']; ?>" alt="Book Cover" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>"><?php echo $row['bookTitle']; ?></a>
                                </h4>
                                <p class="card-text"><?php echo mb_substr($row['bookContent'], 0, 100, "UTF-8"); ?></p>
                                <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>">
                                    <button class="custom-btn">تحميل الكتاب</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="text-center">لاتوجد أي كتب</div>
            <?php
            }
            ?>

</div>
</div>
</div>

<!-- End Books -->
<!-- Start Footre -->
<?php
include 'layout/include/footer.php';
?>