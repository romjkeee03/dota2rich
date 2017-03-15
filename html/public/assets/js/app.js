var BANNED_DOMAINS = '(csgo|csgoup|CSGOHAP|csgobay|CSGOEX|CSGO-FIRE|EasyDrop|CSGOWAR|CSGOBET|CSGOMANIA|csgo-factory|CSGONOW|PLAYCSGO|JACKPOTSKINS|CSGOEZY|FAST-LOTTERY|lucky-cowboy|CSGOEX|CSGOENJOY|csgostars|DROPSMURF|UPSKINS|CSGOSELECTOR|CSGOCoin|CSGO-HOPE|CSgetto|d2wins|CSGOHAP|CSGOFORCE|CSGOHappy|itemgrad|SuperSkins|skin|CSGONOW|csgo|go|csgofast|csgolucky|csgocasino|game-luck|g2a|csgostar|csgo|hellstore|cs-drop|csgo|csgoshuffle|csgotop|csbets|csgobest|csgolike|fast-jackpot|skins-up|hardluck-shop|csgogamble|csgohot|csgofairplay|csgoluxe|csgo1|csgo-chance|csgofb|ezyskins|ezpzskins|csgokill|csgoway|csgolotter|csgomany|csrandom|csgo-winner|csgoninja|csgopick|csgodraw|csgoeasy|csgojackpot|game-raffle|csgonice|kinguin|realskins|csgofart|csgetto|csgo-rand|csgo-jackpot|CSGOSELLER|timeluck|forgames|csgobig|csgo-lottery|csgovictory|CSGO|CSGOEFFECT|csgotrophy|csgo-farming|ezskinz|cslots)\.(ru|com|net|gl|one|c|pro|US|in|RU|COM|IN|US|NET|ONLINE)';

$(document).ready(function() {

    $('.player-deposits .title a').each(function(){
        $(this).text(replaceLogin($(this).text()));
        $(this).text(replaceLogin($(this).text()));
        $(this).text(replaceLogin($(this).text()));
    });

    $('.player-name a').each(function(){
        $(this).text(replaceLogin($(this).text()));
        $(this).text(replaceLogin($(this).text()));
        $(this).text(replaceLogin($(this).text()));
    });

    $('#winUser').text(replaceLogin($('#winUser').text()));
    $('#winUser').text(replaceLogin($('#winUser').text()));
    $('#winUser').text(replaceLogin($('#winUser').text()));
    
    $('.fancybox').each(function(){
        if(!$(this).find('img').length && !$(this).find('div').length)
            $(this).text(replaceLogin($(this).text()));
    });

    CSGO777.init();
    $('[data-modal]').click(function() {
        $($(this).data('modal')).arcticmodal();
        return false;
    });

    $('.no-link').click(function () {
        $('.linkMsg').removeClass('msgs-not-visible');
        return false;
    });

    $('.offer-link input, .offer-link-inMsg input')
        .keypress(function(e) {
            if (e.which == 13) $(this).next().click()
        })
        .on('paste', function() {
            var that = $(this);
            setTimeout( function() {
                that.next().click();
            }, 0);
        });

    $('.save-link, .save-link2').click(function () {
        var that = $(this).prev();
        $.ajax({
            url: '/settings/save',
            type: 'POST',
            dataType: 'json',
            data: {trade_link: $(this).prev().val()},
            success: function (data) {
                if (data.status == 'success') {
                    that.notify(data.msg, {position: 'left middle', className :"success"});
                    $('.no-link a').attr('href', '#deposit').parent().removeClass('.no-link').off('click');
                    $('.linkMsg').addClass('msgs-not-visible');
                    $('#settings_link').val(that.val());
                }
                else {
                    if(data.msg) that.notify(data.msg, {position: 'left middle', className :"error"});
                }
            },
            error: function () {
                that.notify("Произошла ошибка. Попробуйте еще раз", {position: 'left middle', className :"error"});
            }
        });
        return false;
    });


    $(document).on('click', '#checkHash', function () {
        var hash = $('#roundHash1').val();
        var number = $('#roundNumber1').val() || '';
        var bank = $('#roundPrice1').val() || 0;
        var result = $('#checkResult');
        if (hex_md5(number) == hash) {
            var n = Math.floor(bank * parseFloat(number));
            result.html('Хэш Раунда и Число Раунда верны.<br/> ПОБЕДНЫЙ БИЛЕТ - ' + n);
        }
        else {
            result.html('Хэш Раунда и Число Раунда не совпадают.');
        }
    });
});

function getRarity(type) {
    var rarity = '';
    var arr = type.split(',');
    if (arr.length == 2) type = arr[1].trim();
    if (arr.length == 3) type = arr[2].trim();
    if (arr.length && arr[0] == 'Нож') type = '★';
    switch (type) {
        case 'Армейское качество':      rarity = 'milspec'; break;
        case 'Запрещенное':             rarity = 'restricted'; break;
        case 'Засекреченное':           rarity = 'classified'; break;
        case 'Тайное':                  rarity = 'covert'; break;
        case 'Ширпотреб':               rarity = 'common'; break;
        case 'Промышленное качество':   rarity = 'common'; break;
        case '★':                       rarity = 'rare'; break;
    }
    return rarity;
}

function n2w(n, w) {
    n %= 100;
    if (n > 19) n %= 10;

    switch (n) {
        case 1: return w[0];
        case 2:case 3:case 4: return w[1];
        default: return w[2];
    }
}
function lpad(str, length) {
    while (str.toString().length < length)
        str = '0' + str;
    return str;
}

function replaceLogin(login) {
    var reg = new RegExp(BANNED_DOMAINS, 'i');
    return login.replace(reg, "");
}

if (START) {
    var socket = io.connect(':2020');
    socket
        .on('connect', function () {
            $('#loader').hide();
        })
        .on('disconnect', function () {
            $('#loader').show();
        })
        .on('newDeposit', function(data){
            data = JSON.parse(data);
            if(LANG == 'ru') {
                $('#bets').prepend(data.html);
            }else {
                $('#bets').prepend(data.html_en);
            }
            $('.player-deposits .title a').each(function(){
                $(this).text(replaceLogin($(this).text()));
            });
            $('#roundBank').text(convertToCurrency(data.gamePrice));
            $('.progress-digits span').text(data.itemsCount);
            $('#progress-bar div').css('width', data.itemsCount + '%');
            console.log( data.chances);
            html_chances = '';
            data.chances = sortByChance(data.chances);
            data.chances.forEach(function(info){
                if(USER_ID == info.steamid64){
                    $('#myItems').text(info.items + n2w(info.items, [' предмет', ' предмета', ' предметов']));
                    $('#myChance').text(info.chance);
                }
                $('.chance_' + info.steamid64).text('('+ info.chance +' %)');
                html_chances +=
                '<a data-profile="' + info.steamid64 + '" href="#player-modal" class=" fancybox user inline-block" style="text-decoration: none;">' +
                    '<div class="avatar">' +
                        '<img src="' + info.avatar + '" alt="">' +
                    '</div>' +
                    '<div class="chance">' + info.chance + '%</div>' +
                '</a>';
            });
            $('#game-chances').html(html_chances);
            $('#game-chances').removeClass('msgs-not-visible');

            $('#newBet')[0].play();
            CSGO777.initTheme();
        })
        .on('online', function (data) {
            $('#online').text(Math.abs(data));
            $('.online span').text(Math.abs(data));
        })
        .on('timer', function (time) {
            if(timerStatus) {
                console.log(time);
                timerStatus = false;
                $('.wrapper-timer').show();
                $('#timer').html('<div>PT'+time+'S</div>');
                $('#timer div').countDown({
                    with_labels: false
                });
            }
        })
        .on('slider', function (data) {
            if(ngtimerStatus) {
                ngtimerStatus = false;
                console.log(data);
                var users = data.users;
                users = mulAndShuffle(users, Math.ceil(110 / users.length));
                if(!data.showSlider) {
                    users[5] = data.winner;
                }
                users[99] = data.winner;
                html = '';
                var counter = 0;
                users.forEach(function (i) {
                    html += '<li id="img-' + counter + '"><img src="' + i.avatar + '"></li>';
                    counter++;
                });

                $('#ngtimer').html('<div>PT'+data.time+'S</div>');
                $('#ngtimer div').countDown({
                    with_labels: false
                });
                $('#gameInfo').addClass('msgs-not-visible');
                $('.game-end-page').removeClass('msgs-not-visible');

                $('.wrapper-carousel .all-players-list').html(html);
                $('#winBank').html(convertToCurrency(data.game.price, true));
                $('#winTicket').html('???');
                $('#winUser').text('???');
                $('#winChance').text('???%');
                $('.roundNumber').text('');
                $('.wrapper-carousel .all-players-list').removeClass('active');



                if(data.showSlider) {
                    setTimeout(function () {
                        $('.wrapper-carousel .all-players-list').addClass('active');
                    }, 0);
                }
                var timeout = data.showSlider ? 13 : 0;
                setTimeout(function () {
                    $('.roundNumber').text(data.round_number);
                    $('.end-notice').removeClass('msgs-not-visible');

                    $('#winTicket').text('#' + data.ticket);
                    $('#winUser').html('<a data-profile="' + data.winner.steamid64 + '" href="#player-modal" class="fancybox"></a>');
                    $('#winUser a').text(replaceLogin(data.winner.username));
                    $('#winChance').text(data.chance + '%');
                    $('#usersToday').text(data.usersToday);
                    $('#maxPriceToday').html(data.maxPriceToday);
                    $('#maxPrice').html(data.maxPrice);
                    $('#gamesToday').text(data.gamesToday);

                }, 1000 * timeout);
            }
        })
        .on('newGame', function (data) {
            $('#game-chances').addClass('msgs-not-visible');
            $('.game-end-page').addClass('msgs-not-visible');
            $('#gameInfo').removeClass('msgs-not-visible');
            $('.end-notice').addClass('msgs-not-visible');
            $('.wrapper-timer').hide();
            $('#bets').html('');
            $('#roundId').text('#' + data.id);
            $('#roundBank').text(0);
            $('#roundHashUp').text(data.hash);
            $('#myChance').text(0);
            $('#roundHash').text(data.hash);
            $('.progress-digits span').text(0);
            $('#progress-bar div').css('width','0%');
            
            timerStatus = true;
            ngtimerStatus = true;
        })
        .on('queue', function (data) {
            console.log(data);
            if (data) {
                var n = data.indexOf(USER_ID);
                if (n !== -1) {
                    $('.queueMsg u').text('Ваш депозит обрабатывается. Вы '+(n + 1)+' в очереди.');
                    $('.queueMsg').removeClass('msgs-not-visible');
                }
                else {
                    $('.queueMsg').addClass('msgs-not-visible');
                }
            }
        })
        .on('depositDecline', function (data) {
            data = JSON.parse(data);
            if (data.user == USER_ID) {
                clearTimeout(declineTimeout);
                declineTimeout = setTimeout(function() {
                    $('.declineMsg').addClass('msgs-not-visible');
                }, 1000 * 10)
                $('.declineMsg u').text(data.msg);
                $('.queueMsg').addClass('msgs-not-visible');
                $('.declineMsg').removeClass('msgs-not-visible');
            }
        })
        .on('chat', function (data){
            var chat = $('#live-chat');
            data.forEach(function(msg){
                chat.find('.wrapper-messages').append(
                    '<div class="item">' +
                    '<div class="avatar inline-block"><a href="#player-modal" class="fancybox" data-profile="' + msg.steamid64 + '"><img src="'+ msg.avatar +'" alt=""></a></div>' +
                    '<div class="info inline-block">' +
                    '<div class="name"><span>'+ msg.time +'</span> <a href="#" onclick="var u = $(this); $(\'#chatInput\').val(u.text() + \', \'); return false;">'+ replaceLogin(msg.username) +'</a> <a href="#chat-modal" class="admin_controls fancybox" data-chat="' + msg.steamid64 + '" data-chat-username="' + msg.username + '">[x]</a></div>' +
                    '<div class="text">'+ msg.msg +'</div>' +
                    '</div>' +
                    '</div>');
            });

            // Scrollbar

		      var height = $('#live-chat .wrapper-messages').height();
		      
              $('#live-chat .list-messages').customScrollbar('resize', true);
		      $('#live-chat .list-messages').customScrollbar('scrollToY', height);
        })
    var declineTimeout,
        timerStatus = true,
        ngtimerStatus = true;
}


function mulAndShuffle(arr, k) {
    var
        res = [],
        len = arr.length,
        total = k * len,
        rand, prev;
    while (total) {
        rand = arr[Math.floor(Math.random() * len)];
        if (len == 1) {
            res.push(prev = rand);
            total--;
        }
        else if (rand !== prev) {
            res.push(prev = rand);
            total--;
        }
    }
    return res;
}

$(document).on('click', '.vote', function() {
    var that = $(this);
    $.ajax({
        url: '/ajax',
        type: 'POST',
        dataType: 'json',
        data: { action: 'voteUser', id: $(this).data('profile') },
        success: function(data) {
            if (data.status == 'success') {
                $('#player-modal').find('.player-reputation .value').text(data.votes || 0);
            }
            else {
                if (data.msg) that.notify(data.msg, {position: 'bottom middle', className :"error"});
            }
        },
        error: function() {
            that.notify("Произошла ошибка. Попробуйте еще раз", {position: 'bottom middle', className :"error"});
        }
    });
});

$(document).on('click', '[data-profile]', function() {
    var modal = $('#player-modal');
    modal.find('.loading').show();
    modal.find('.hide').hide();
    //modal.arcticmodal();

    var id = $(this).data('profile');
    $.ajax({
        url: '/ajax',
        type: 'POST',
        dataType: 'json',
        data: { action: 'userInfo', id: id },
        success: function(data) {
            modal.find('.player-name').text(replaceLogin(data.username));
            modal.find('.games-played span').text(data.games);
            modal.find('.games-won span').text(data.wins);
            modal.find('.winrate span').text(data.winrate + '%');
            modal.find('.totalBank span').text(data.totalBank);
            modal.find('.player-reputation .value').text(data.votes || 0);
            modal.find('.player-link a').attr('href', data.url).text(data.url);
            modal.find('.player-avatar img').attr('src', data.avatar);

            var html = '';
            data.list.forEach(function(game) {
                html += '<tr>';
                html += '<td>';
                html += '<div class="game-id">#'+game.id+'</div>';
                html += '</td>';
                html += '<td>';
                html += '<div class="player-chance">'+game.chance+'%</div>';
                html += '</td>';
                html += '<td>';
                if(LANG == 'en')
                    html += '<div class="player-jackpot">'+game.bank+' $</div>';
                else
                    html += '<div class="player-jackpot">'+game.bank+' руб.</div>';

                html += '</td>';
                html += '<td>';
                if(LANG == 'en'){
                    if (game.win == -1) html += '<div class="game-status">Not completed</div>';
                    else if (game.win) html += '<div class="game-status win">Win</div>';
                    else html += '<div class="game-status lose">Lose</div>';
                }else{
                    if (game.win == -1) html += '<div class="game-status">Не завершена</div>';
                    else if (game.win) html += '<div class="game-status win">Победа</div>';
                    else html += '<div class="game-status lose">Поражение</div>';
                }
                html += '</td>';
                html += '</tr>';

            });

            modal.find('.games-list').html(html);

            modal.find('.vote').data('profile', id);

            modal.find('.loading').hide();
            modal.find('.hide').show();

            //if (modal.find('.games-list').is('.ps-container')) modal.find('.games-list').perfectScrollbar('destroy');
            //modal.find('.games-list').perfectScrollbar();
        },
        error: function() {
            $.notify("Произошла ошибка. Попробуйте еще раз", {className :"error"});
        }
    });
    return false;
});


function sortByChance(arrayPtr){
    var temp = [],
        item = 0;
    for (var counter = 0; counter < arrayPtr.length; counter++)
    {
        temp = arrayPtr[counter];
        item = counter-1;
        while(item >= 0 && arrayPtr[item].chance < temp.chance)
        {
            arrayPtr[item + 1] = arrayPtr[item];
            arrayPtr[item] = temp;
            item--;
        }
    }
    return arrayPtr;
}

function convertToCurrency(value, with_currency){
    if(with_currency){
        if(LANG == 'en'){
            return (value/KURS).toFixed(2).toString() + " $";
        }
        return value.toString() + " <span class='currency'>руб.</span>";
    }
    if(LANG == 'en'){
        return (value/KURS).toFixed(2);
    }
    return Math.round(value);
}