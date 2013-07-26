
        <!-- liike vk-->
        
         
        <!-- liike vk end-->
                        <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=384403321677819";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
        <div id="dynamic_header">
            
            <div id="top">
                <div id="logo"><a href="/"></a></div>
                <div id="entreg">
                <? if(!$logged){?>
                    <div id="enter">Войти &rarr; </div>
                    <div id="regist">Регистрация</div>

                <?} else {?> <div class="logged"><? echo $nameo ?></div> <div class="logged"><a href="/auth/logout">Выйти</a></div> <?}?>    
                </div>
                <div id="soc_icons">
                    <img src="/include/images/soc_icons_n.png" usemap="#map">
                    <map name="map"> 
                        <area shape="rect" alt="facebook" 
                        coords="0,0,30,27" 
                        href="http://facebook.com/goodpract" target="_blank">
                        <area shape="rect" alt="vk" 
                        coords="32,0,60,27" 
                        href="http://vk.com/goodpractice_crm" target="_blank">
                        <area shape="rect" alt="youtube" 
                        coords="64,0,93,27" 
                        href="http://youtube.com" target="_blank">
                        <area shape="rect" alt="twitter" 
                        coords="97,0,125,27" 
                        href="https://twitter.com/verona86_?lang=ru" target="_blank">
                        <area shape="rect" alt="LinkedIn" 
                        coords="131,0,162,27" 
                        href="http://linkedin.com" target="_blank">
                        <area shape="rect" alt="google+" 
                        coords="164,0,192,27" 
                        href="http://google.com" target="_blank">
                </div>
                <div id="contacts">
                    (8352) 294-224<br>
                    <a href="mailto:info@goodpratice.ru">info@goodpractice.ru</a>
                </div>
                
                <div id="menu">
                        <div class="menu_button popup_reg" id="red_button"><a href="/main/site/buy">КУПИТЬ</a>
                    
                        </div>
                        <div class="menu_button"><a href="/main/consulting">УВЕЛИЧИВАЕМ ПРОДАЖИ</a>
                    
                        </div>
                        <div class="menu_button"><a href="/main/crm-cloud">ВНЕДРЯЕМ CRM</a>
                    
                        </div>
                        <div class="menu_button"><a href="/main/about_us/">О НАС</a>
                    
                        </div>
                    
                </div>
            
            </div>
        </div>
         <div id="header_background"></div>
        <div id="wrapper">