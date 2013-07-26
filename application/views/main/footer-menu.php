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
                        VK.Widgets.Like("vk_like2", {type: "button", verb: 1, height: 20});
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
                <div id="bottom_menu">
                      <div class="menu_button popup_reg" id="red_button"><a href="/main/site/buy">КУПИТЬ</a>
                    
                        </div>
                        <div class="menu_button"><a href="/main/consulting">УВЕЛИЧИВАЕМ ПРОДАЖИ</a>
                    
                        </div>
                        <div class="menu_button"><a href="/main/crm-cloud">ВНЕДРЯЕМ CRM</a>
                    
                        </div>
                        <div class="menu_button"><a href="/main/about_us/">О НАС</a>
                    
                        </div>                    
                </div>
              <div id="entreg">
                <? if(!$logged){?>
                    <div id="enter">Войти &rarr; </div>
                    <div id="regist">Регистрация</div>

                <?} else {?> <div class="logged"><? echo $nameo ?></div> <div id="exit"><a href="/auth/logout">Выйти</a></div> <?}?>    
                </div>
            </div>
</div>