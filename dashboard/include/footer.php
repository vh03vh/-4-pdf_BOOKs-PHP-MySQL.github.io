<!--jQuery-->
<script src="js/jquery-3.4.1.min.js"></script>
<!--Font Awesome-->
<script src="https://kit.fontawesome.com/03757ac844.js"></script>
<!--Bootstrap-->
<script src="js/bootstrap.min.js"></script>
<script src="tiny/tinymce.min.js"></script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<!-- jquery lettre are you sure -->
<script>
    $('.confirm').click(function() {
        return confirm("هل أنت متأكد ؟");
    });
</script>
</body>

</html>