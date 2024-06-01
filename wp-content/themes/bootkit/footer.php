<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<?php wp_footer();?>

<!-- Ajax button -->
<button id="bootkit_button">Надіслати</button>
<script>
jQuery(function($) {
    $('#bootkit_button').click(function() {
        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php") ?>',
            type: 'POST',
            data: 'action=bootkit&param1=2&param2=3', // передаем данные – 2 и 3
            beforeSend: function(xhr) {
                $('#bootkit_button').text('Завантаження, 5 сек...');
            },
            success: function(data) {
                $('#bootkit_button').text('Надіслати');
                alert(data);
            }
        });
    });
});
</script>

</body>

</html>