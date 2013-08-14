</div>
<div id="rightbar">
    
                    <div id="news">
                        <div id="news_title">Внимание, скоро!</div>
                        <!-- <a href="/"><div class="news_tag">
                            <div class="news_add_date">25 января 2013</div>
                            Конференция. 100 способов увеличения продаж.
                        </div></a>
                        <a href="/"><div class="news_tag">
                            <div class="news_add_date">30 мая 2013</div>
                            Семинар. 20 стратегий по увеличению продаж.
                        </div></a>
                        <a href="/"><div class="news_tag">
                            <div class="news_add_date">14 июня 2013</div>
                            Семинар. 20 стратегий по увеличению продаж.
                        </div></a> -->
                        <?
                            foreach ($news as $key => $value) {?>
                                <a href=<?='"'.$URL_news.$value['id'].'"'?>><div class="news_tag">
                            <div class="news_add_date"><?=$value['date']?></div>
                            <?=$value['description']?>
                        </div></a>
                            <?}
                        ?>
                    </div>
                    <div id="countdown">
                        
                        <div id="look_video">
                           <div id="countdown_title">Узнай 20 стратегий по увеличению продаж!</div> 
                           <div id="countdown_button">Я хочу узнать!</div>
                        </div>
                        
                        <div id="countdownBlock">
                            <div id="countdown_text">До конца акции с 30% скидкой осталось</div>
                            <div id="rezult"></div>
                            <script>
                                function countdown(){
                                    var today = new Date().getTime();
                                    var end = new Date(2013,7,19).getTime();
                                    var dateX = new Date(end-today);
                                    var perDays = 60*60*1000*24;
                                    date_to_write = '<div class="timeBlock"><div id="d" class="timeEm">' + (Math.round(dateX/perDays) + '&nbsp</div><div>дней</div></div><div class="timeBlock"><div id="h" class="timeEm">' + dateX.getUTCHours().toString() + '&nbsp</div><div>часов</div></div><div class="timeBlock"><div id="m" class="timeEm">' + dateX.getMinutes().toString() + '&nbsp</div><div>минут</div></div><div class="timeBlock"><div id="s" class="timeEm">' + dateX.getSeconds().toString() + '&nbsp</div><div>секунд</div></div>');
                                    var result = document.getElementById('rezult');
                                    result.innerHTML = date_to_write;
                                    }
                                    countdown();
                                    setInterval(countdown, 1000);
                            </script>
                        </div>
                    </div>
                    <div id="vk">
                        
                   <!-- VK Widget -->
                            <div id="vk_groups"></div>
                            <script type="text/javascript">
                            VK.Widgets.Group("vk_groups", {mode: 0, width: "260", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 54540103);
                            </script>
                        
                    </div>
                        

                    <div id="facebook">
                      <div class="fb-like-box" data-href="https://www.facebook.com/goodpract" data-width="260" data-height="420" data-show-faces="true" data-stream="false" data-show-border="true" data-header="false"></div>
                       </div>


                    
                    
                

               </div>


                
