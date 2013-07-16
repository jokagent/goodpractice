<?php
/*
Single Post Template: Single Buy
*/
?>
<?php get_header('top')?>
        <div id="header_background"></div>

        <div id="wrapper">
            <?php get_header('bottom')?> 
            
            <div id="content">
                <?php get_sidebar('left')?>

                <div id="center">
                  
                    <div id="social_like">
                        <div id="social_like_title">Нажмите на "социальную кнопку", чтобы поделиться с друзьями!</div>
                        <div class="social_like_div">
                        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fgoodpract&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=384403321677819" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:125px; height:21px;" allowTransparency="true"></iframe>
                       </div>
                        <!--vk-->
                        <div class="social_like_div">
                        <div id="vk_like"></div>
                        <script type="text/javascript">
                        VK.Widgets.Like("vk_like", {type: "button", verb: 1, height: 18});
                        </script>
                        </div>
                        <!--vk-->
                        <!--tweet-->
                        <div class="social_like_div">
                         <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>

                         <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
                        <!--tweet-->
                    </div>
                    

                     <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post(); ?>
                            <div>
                                
                                <p><?php the_content() ?></p>
                            </div>
                            <div>
                                <?php comments_template() ?>
                            </div>
                            <div>
                                <span><?php previous_post_link()?></span>
                                <span><?php next_post_link() ?></span>
                            </div>
                    <?php endwhile;?>
                    <?php else :
                        echo "Sorry, no posts were found";
                    endif;
                    ?>

                   
                </div>

                <?php get_sidebar('right')?>

            <div id="footer_menu">
                 <div id="social_like2">
                        <div id="social_like_title">Нажмите на "социальную кнопку", чтобы поделиться с друзьями!</div>
                        <div class="social_like_div">
                        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fgoodpract&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=384403321677819" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:125px; height:21px;" allowTransparency="true"></iframe>
                       </div>
                        <!--vk-->
                        <div class="social_like_div">
                        <div id="vk_like2"></div>
                        <script type="text/javascript">
                        VK.Widgets.Like("vk_like2", {type: "button", verb: 1, height: 18});
                        </script>
                        </div>
                        <!--vk-->
                        <!--tweet-->
                        <div class="social_like_div">
                         <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>

                         <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
                        <!--tweet-->
                    </div>
               <div id="entreg">
                    <div id="enter">Войти &rarr; </div>
                    <div id="regist">Регистрация</div>
                    
                </div>
                <div id="bottom_menu">
                    <div class="menu_button">УВЕЛИЧИВАЕМ ПРОДАЖИ</div>
                    <div class="menu_button">ВНЕДРЯЕМ CRM</div>
                    <div class="menu_button">О НАС</div>
                </div>
            </div>
            </div>
                
            <?php get_footer()?>













