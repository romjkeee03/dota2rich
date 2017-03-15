@extends('layout')

@section('content')
<div class="notice advantages">

        <div class="item inline-block">
            <div class="icon"><img src="http://cshot.ru/assets/images/icon_percent.png" alt=""></div>
            <h3>ДЕШЕВЛЕ ЧЕМ В STEAM НА 30-50%</h3>
            <!--  <p><a href="">Посмотреть инвентарь бота</a></p> -->
        </div>

        <div class="item inline-block">
            <div class="icon"><img src="http://cshot.ru/assets/images/icon_rocket.png" alt=""></div>
            <h3>МОМЕНТАЛЬНАЯ ОТПРАВКА ВЕЩЕЙ</h3>
            <!--  <p><a href="">Читать отзывы</a></p> -->
        </div>

        <div class="clr-b"></div>

    </div>  <!-- End of Notice -->

    <div class="store-page container">

        <h1>Магазин предметов CS:GO</h1>

        <div id="countItems" class="pre" style="display: none;">По фильтрам найдено <span>0</span> предметов</div>

        <div class="filters">
            <form>

                <div class="field select left">
                    <div class="title">Категория</div>
                    <select id="searchType" multiple="multiple">
                        <option value="Нож">Нож</option>
                        <option value="Винтовка">Винтовка</option>
                        <option value="Дробовик">Дробовик</option>
                        <option value="Снайперская винтовка">Снайперская винтовка</option>
                        <option value="Пистолет">Питолет</option>
                        <option value="Пулемёт">Пулемёт</option>
                    </select>
                </div>

                <div class="field select left">
                    <div class="title">Качество</div>
                    <select id="searchQuality" multiple="multiple">
                        <option value="Прямо с завода">Прямо с завода</option>
                        <option value="Немного поношенное">Немного поношенный</option>
                        <option value="После полевых испытаний">После полевых испытаний</option>
                        <option value="Поношенное">Поношенный</option>
                        <option value="Закаленное в боях">Закалённый в боях</option>
                    </select>
                </div>

                <div class="field select left">
                    <div class="title">Редкость</div>
                    <select id="searchRarity" multiple="multiple">
                        <option value="Тайное">Тайное</option>
                        <option value="Засекреченное">Засекреченное</option>
                        <option value="Запрещенное">Запрещённое</option>
                        <option value="Промышленное качество">Промышленное качество</option>
                        <option value="Армейское качество">Армейское качество</option>
                    </select>
                </div>

                <div class="field price left">
                    <div class="title">Диапазон цен</div>
                    <div class="wrapper-price-bar">
                        <div id="price-bar"></div>
                    </div>
                    <span id="price-min"></span><span id="price-max"></span>
                </div>

                <div class="field sort left">
                    <a href="#" onclick="changeSort(this); return false;">Сначала дорогие</a>
                </div>

                <div class="field search right">
                    <input id="searchName" type="text" name="searchName" value="" placeholder="Поиск">
                </div>

                <div class="clr-b"></div>

            </form>
        </div> <!-- End of Filters -->

        <div class="list-products">
            <!-- 0 -->
                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/469467523/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>USP-S | Орион</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> Немного поношенное</li>
                                <li><span class="gray">Цена в стиме:</span> 550.40 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">358.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 0 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/360467259/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>AK-47 | Красная линия</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> После полевых испытаний</li>
                                <li><span class="gray">Цена в стиме:</span> 341.12 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">222.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 1 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/520026599/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>Glock-18 | Водяной</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> Немного поношенное</li>
                                <li><span class="gray">Цена в стиме:</span> 288.64 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">188.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 2 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/1011940678/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>MP7 | Заклятый враг</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> Немного поношенное</li>
                                <li><span class="gray">Цена в стиме:</span> 282.24 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">183.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 3 -->
                                    <div class="clr-b"></div>
                    <!-- 0 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/1011935526/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>CZ75-Auto | Желтый жакет</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> После полевых испытаний</li>
                                <li><span class="gray">Цена в стиме:</span> 196.48 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">128.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 0 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/1234829145/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>StatTrak&trade; USP-S | Закрученный</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="milspec">Армейское качество</span></li>
                                <li><span class="gray">Качество:</span> Прямо с завода</li>
                                <li><span class="gray">Цена в стиме:</span> 191.36 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">124.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 1 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/360480382/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>Nova | Антиквариат</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> Прямо с завода</li>
                                <li><span class="gray">Цена в стиме:</span> 188.80 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">123.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 2 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/310778907/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>Five-SeveN | Поверхностная закалка</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="restricted">Запрещенное</span></li>
                                <li><span class="gray">Качество:</span> Поношенное</li>
                                <li><span class="gray">Цена в стиме:</span> 184.96 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">120.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 3 -->
                                    <div class="clr-b"></div>
                    <!-- 0 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/360473095/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>P90 | Треугольник</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> После полевых испытаний</li>
                                <li><span class="gray">Цена в стиме:</span> 177.92 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">116.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 0 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/520030556/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>StatTrak&trade; P250 | Сверхновая</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="restricted">Запрещенное</span></li>
                                <li><span class="gray">Качество:</span> Прямо с завода</li>
                                <li><span class="gray">Цена в стиме:</span> 170.24 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">111.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 1 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/937880004/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>StatTrak&trade; P250 | Валентность</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="milspec">Армейское качество</span></li>
                                <li><span class="gray">Качество:</span> Прямо с завода</li>
                                <li><span class="gray">Цена в стиме:</span> 157.44 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">102.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 2 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/1400821961/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>M4A1-S | Атомный сплав</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> После полевых испытаний</li>
                                <li><span class="gray">Цена в стиме:</span> 156.80 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">102.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 3 -->
                                    <div class="clr-b"></div>
                    <!-- 0 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/720318454/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>M4A4 | 龍王 (Король драконов)</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> Король драконов</li>
                                <li><span class="gray">Цена в стиме:</span> 151.68 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">99.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 0 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/720328212/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>AK-47 | Картель</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> Немного поношенное</li>
                                <li><span class="gray">Цена в стиме:</span> 152.96 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">99.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 1 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/720318454/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>M4A4 | 龍王 (Король драконов)</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> Король драконов</li>
                                <li><span class="gray">Цена в стиме:</span> 151.68 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">99.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 2 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/720320344/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>AK-47 | Картель</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> После полевых испытаний</li>
                                <li><span class="gray">Цена в стиме:</span> 115.84 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">75.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 3 -->
                                    <div class="clr-b"></div>
                    <!-- 0 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/720320344/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>AK-47 | Картель</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified">Засекреченное</span></li>
                                <li><span class="gray">Качество:</span> После полевых испытаний</li>
                                <li><span class="gray">Цена в стиме:</span> 115.84 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">75.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 0 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/1365597532/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>M4A1-S | Нитро</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="restricted">Запрещенное</span></li>
                                <li><span class="gray">Качество:</span> Поношенное</li>
                                <li><span class="gray">Цена в стиме:</span> 110.72 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">72.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 1 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/720357195/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>Galil AR | Щелкунчик</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="covert">Тайное</span></li>
                                <li><span class="gray">Качество:</span> Закаленное в боях</li>
                                <li><span class="gray">Цена в стиме:</span> 100.48 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">65.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 2 -->
                                            <div class="item left">
                    <div class="image">
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/310777057/120fx120f" alt="">
                    </div>
                    <div class="wrapper">
                        <h2>UMP-45 | Карамель</h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="common">Ширпотреб</span></li>
                                <li><span class="gray">Качество:</span> Немного поношенное</li>
                                <li><span class="gray">Цена в стиме:</span> 89.60 руб.</li>
                            </ul>
                        </div>
                        <div class="price left">58.00 руб.</div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
                <!-- 3 -->
                                    <div class="clr-b"></div>
                    <!-- 0 -->
                            
        </div> <!-- End of List Products -->
        <div class="clr-b"></div>
        <center id="paginator"><ul class="pagination"> <li class="disabled"><span>1</span></li></ul></center>
    </div>
    </div>
    <script>

        var options = {
            maxPrice : 358.00,
            minPrice : 0,
            searchName : $('#searchName').val(),
            searchType : null,
            searchRarity: null,
            searchQuality: null,
            sort: 'desc'
        }, timer;

        function changeSort(btn){
            if(options.sort == 'asc'){
                $(btn).text('Сначала дорогие');
                options.sort = 'desc'
            }else{
                $(btn).text('Сначала дешёвые');
                options.sort = 'asc'
            }
            clearTimeout(timer);
            timer = setTimeout(getSortedItems, 100);
        }

        function getSortedItems(){
            $.post('http://cshot.ru/ajax', {action:'shopSort',options:options}, function(response){
                var html = '';
                var i = 0;
                response.items.data.forEach(function(item){
                                        i++;
                    html += '<div class="item left">';
                    html += '<div class="image">';
                    html += '<img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/'+ item.classId +'/120fx120f" alt="">';
                    html += '</div>';
                    html += '<div class="wrapper">';
                    html += '<h2>'+ item.name +'</h2>';
                    html += '<div class="chars">';
                    html += '<ul>';
                    html += '<li><span class="gray">Редкость:</span> <span class="'+ getRarity(item.rarity) +'">'+ item.rarity +'</span></li>';
                    html += '<li><span class="gray">Качество:</span> '+ item.quality +'</li>';
                    html += '<li><span class="gray">Цена в стиме:</span> '+ item.steam_price +' руб..</li>';
                    html += '</ul>';
                    html += '</div>';
                    html += '<div class="price left">'+ item.price +' руб.</div>';
                    html += '<div class="buy right">';
                    html += '<a class="buyItem" data-item="'+ item.id +'" href="#">Купить</a>';
                    html += '</div>';
                    html += '<div class="clr-b"></div>';
                    html += '</div>';
                    html += '</div>';
                    if(i == 4){
                        html += '<div class="clr-b"></div>';
                        i=0;
                    }
                })
                $('.list-products').html(html);
                $('#countItems').show();
                $('#paginator').html(response.pages);


                $('.buyItem').click(function () {
                    var that = $(this);
                    $.ajax({
                        url: 'http://cshot.ru/shop/buy',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: $(this).data('item')},
                        success: function (data) {
                            if (data.success) {
                                that.notify(data.msg, {position: 'bottom middle', className :"success"});
                                setTimeout(function(){that.parent().parent().parent().hide()}, 5500);
                            }
                            else {
                                if(data.msg) that.notify(data.msg, {position: 'bottom middle', className :"error"});
                            }
                        },
                        error: function () {
                            that.notify("Произошла ошибка. Попробуйте еще раз", {position: 'bottom middle', className :"error"});
                        }
                    });
                    return false;
                });
            });
        }
        $(function(){
            /* Price */
            $('#price-bar').slider({
                range: true,
                min: 0,
                max: 358.00,
                values: [0, 358.00],
                slide: function( event, ui ){
                    $('#price-min').html(ui.values[0]);
                    $('#price-max').html(ui.values[1]);

                    clearTimeout(timer);
                    timer = setTimeout(getSortedItems, 300);

                    options.minPrice = ui.values[0];
                    options.maxPrice = ui.values[1];

                    moveValueLabels();
                }
            });

            $('#price-min').html($('#price-bar').slider('values', 0));
            $('#price-max').html($('#price-bar').slider('values', 1));


            function moveValueLabels() {
                var pos_first_handle = $('.ui-slider-handle:first').position();
                var pos_last_handle = $('.ui-slider-handle:last').position();
                $('#price-min').css('left', pos_first_handle.left);
                $('#price-max').css('left', pos_last_handle.left);
            }

            moveValueLabels();

            /* Select */
            $('select').multipleSelect({
                selectAll: false,
                width: '161px',
                placeholder: 'Все',
                allSelected: 'Выбраны все',
                countSelected: 'Выбраны # из %'
            });


            $('#searchType').change(function(){
                options.searchType = $(this).val();
                clearTimeout(timer);
                timer = setTimeout(getSortedItems, 100);
                console.log(options);
            })
            $('#searchRarity').change(function(){
                options.searchRarity = $(this).val();
                clearTimeout(timer);
                timer = setTimeout(getSortedItems, 100);
                console.log(options);
            })
            $('#searchQuality').change(function(){
                options.searchQuality = $(this).val();
                clearTimeout(timer);
                timer = setTimeout(getSortedItems, 100);
                console.log(options);
            })

            $('#searchName').keyup(function(){
                options.searchName = $(this).val();
                clearTimeout(timer);
                timer = setTimeout(getSortedItems, 100);
                console.log(options);
            })

            $('.buyItem').click(function () {
                var that = $(this);
                $.ajax({
                    url: 'http://cshot.ru/shop/buy',
                    type: 'POST',
                    dataType: 'json',
                    data: {id: $(this).data('item')},
                    success: function (data) {
                        if (data.success) {
                            that.notify(data.msg, {position: 'bottom middle', className :"success"});
                            setTimeout(function(){that.parent().parent().parent().hide()}, 5500);
                        }
                        else {
                            if(data.msg) that.notify(data.msg, {position: 'bottom middle', className :"error"});
                        }
                    },
                    error: function () {
                        that.notify("Произошла ошибка. Попробуйте еще раз", {position: 'bottom middle', className :"error"});
                    }
                });
                return false;
            });
        });
    </script>
    <!-- End of Content -->

@endsection