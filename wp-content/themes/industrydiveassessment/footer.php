<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IndustryDiveAssessment
 */

?>

<footer>
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-left">
                <div class="footer-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </div>

                <div class="footer-copyright">
                    <p>Copyright &copy; 2022 All rights reserved.</p>
                </div>
            </div>

            <div class="footer-right">
                <div class="footer-news-letter">
                    <h2>Sign up for our newsletter</h2>
                    <a href="#"class="open-button" onclick="openForm()">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon-envelope-black.svg" alt="">
                        Subscribe
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->


<script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    $j=jQuery.noConflict();
    $j(document).ready(function (){

        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

        var count = 1;
        $j(document).on("click",".latest-post-load-more",function (e){
            e.preventDefault();
            count++;
            var data = {
                'action': 'load_more_func',
                'page': count,
            }

            $j.ajax({
                url : ajaxurl, // AJAX handler
                data : data,
                type : 'POST',
                beforeSend : function ( xhr ) {
                    $j(".latest-post-load-more").text("Please wait...");
                },

                success : function( data ){
                    var obj = JSON.parse(data);
                    var max_page = obj.max_page;
                    $j(".latest-posts-wrapper").append(obj.html);
                    $j(".latest-post-load-more").text("Load More");
                    if (count == max_page) $j(".latest-post-load-more").css("display","none");

                }
            });
        });

        $j(document).on("click",".subscribeBtn",function (e){
            e.preventDefault();
            var email = $j('#subscribe_email').val();
            if (email == "") alert("email can not be empty");
            var data = {
                'action': 'subscribe_func',
                'email': email,
            }

            $j.ajax({
                url : ajaxurl, // AJAX handler
                data : data,
                type : 'POST',
                beforeSend : function ( xhr ) {
                    $j(".subscribeBtn").text("Please wait...");
                },

                success : function( data ){
                    $j("#subscribeMsg").text(data);
                    $j(".subscribeBtn").text("Subscribe");
                }
            });
        });
    });
</script>

<?php wp_footer(); ?>

</body>
</html>
