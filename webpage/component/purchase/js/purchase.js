window.onload = function() {
    sectionselect('cinema');
    $("unopen").style.display = 'none';
};

var prices = 10000;
var count;
var selectcinema;
var selectmovie;
var selectmovie_name;
var selectday;
var selecttheater;
var selectseat = {};
var today = new Date();
var day = today.getDate();
var month = today.getMonth()+1;
var year = today.getYear();
var nextday = new Date(year,month,day+1,0,0,0);

function sectionselect(section) {
    var sections = document.getElementsByTagName('section');
    for (var i = sections.length - 1; i >= 0; i--) {
        sections[i].style.display = 'none';
    }
    if(section != 'none')
        document.getElementById(section).style.display = 'block';
}

function usecoupon(obj) {
    var discount = prices * (100 - obj[obj.selectedIndex].id);
    $('뿌아아앙').innerHTML = "결제금액은 : " + discount +"원입니다.";
    $('hiddenprice').value = discount;
}


function changecinema() {
    for (var i = 1; i <= 5; i++) {
        $('MENU'+i).style.backgroundColor = 'transparent';
    }
    $('selection_movie').innerHTML = '선택하신 영화 : 미선택';
    resetseat();
    resetdate();
    resetapproval();
    new Ajax.Request("movie_json.php",{
        method : "get",
        onSuccess : movie_JSON,
        onFailure : ajaxFailed,
        onException : ajaxFailed
    });
}

function changemovie(){
    for (var i = 2; i <= 5; i++) {
        $('MENU'+i).style.backgroundColor = 'transparent';
    }
    $('selection_movie').innerHTML = '선택하신 영화 : ' + this.id;
    resetseat();
    resetapproval();
    selectmovie_name = this.id;
    selectmovie = this.value;
    new Ajax.Request("selectday_json.php",{
      method : "get",
      onSuccess : selectday_JSON,
      onFailure : ajaxFailed,
      onException : ajaxFailed
  });
}

function changetime(){    
    for (var i = 3; i <= 5; i++) {
        $('MENU'+i).style.backgroundColor = 'transparent';
    }
    selecttheater = this.id;
    selectday = this.className;
    resetapproval();
    new Ajax.Request("seat_json.php",{
        method : "get",
        onSuccess : seat_JSON,
        onFailure : ajaxFailed,
        onException : ajaxFailed
    });

}
function changeseat() {
    var j = 0;
    var options = document.getElementById('select_seat').options, count = 0;
    for (var i = 4; i <= 5; i++) {
        $('MENU'+i).style.backgroundColor = 'transparent';
    }
    $('MENU4').style.backgroundColor = 'pink';
    $('approvals').descendants().each(function(element){element.remove();});
    var img = document.createElement('img');
    img.src = '../img/movie/movie_'+ selectmovie +'.jpeg';
    $("approvals").appendChild(img);
    var movie_data = document.createElement('div');
    movie_data.id = 'movie_data';
    $("approvals").appendChild(movie_data);
    var h3 = document.createElement('h3');
    h3.innerHTML = selectmovie_name;
    $("movie_data").appendChild(h3);
    var seti = document.createElement('p');
    seti.innerHTML = "상영 시간: " + selectday;
    $("movie_data").appendChild(seti);
    var seth = document.createElement('p');
    seth.innerHTML = "상영관: " + selecttheater;
    $("movie_data").appendChild(seth);


    var sese = document.createElement('p');
    sese.innerHTML = '선택한 좌석: ';
    var type = 1;
    for (var i=0; i < options.length; i++){
        if (!options[i].selected)
            continue;
        count++;
        if(type)
            type = 0;
        else
            sese.innerHTML +=", ";
        sese.innerHTML +=options[i].value;
    }
    $('people').innerHTML = '선택 인수 : ' + count +'명';
    $("movie_data").appendChild(sese);
    prices = 10000 * count;
    var purchase = document.createElement('div');
    purchase.id = 'purchase';
    $("approvals").appendChild(purchase);
    var price = document.createElement('p');
    price.id = '뿌아아앙';
    price.innerHTML = "결제금액은 : " + prices +"원입니다.";
    $("purchase").appendChild(price);

    var hidden = document.createElement('input')
    hidden.setAttribute("id","hiddenprice");
    hidden.setAttribute("type", "hidden");
    hidden.setAttribute("name", "price");
    hidden.setAttribute("value", prices);
    $("approvals").appendChild(hidden);
    $("unopen").style.display = 'block';
}
function isseat_JSON(ajax) {
    var data = JSON.parse(ajax.responseText);
    for (var i = 0; i < data.isseat.length; i++) {
        $(data.isseat[i].seat).disabled = true;
    }
}

function seat_JSON(ajax) {
    var data = JSON.parse(ajax.responseText);
    $('seats').descendants().each(function(element){element.remove();});
    for (var i = 0; i < data.seats.length; i++) {
        if(data.seats[i].cinema != selectcinema || data.seats[i].theater != selecttheater)
            continue;
        if(data.seats[i].seat.length == 0){
            alert("선택한 상영관의 좌석 정보가 등록되지 않았습니다. 불편을 드려서 죄송합니다.");
            var paragraph = document.createElement("p");
            paragraph.innerHTML = "죄송합니다. 빠르게 복구하도록 하겠습니다."
            $("seats").appendChild(paragraph);
        } 
        else {
            $('MENU3').style.backgroundColor = 'pink';
            var select = document.createElement('select');
            select.name = 'seat[]'
            select.id = 'select_seat'
            select.multiple = 'multiple';
            select.onchange = changeseat;
            $("seats").appendChild(select);
            for(var j=0;j<data.seats[i].seat.length;j++) {
                var option = document.createElement('option');
                option.id = data.seats[i].seat[j];
                option.value = data.seats[i].seat[j];
                option.innerHTML = data.seats[i].seat[j];
                $("select_seat").appendChild(option);
            }
        }
    }
    new Ajax.Request("isseat_json.php",{
        method : "get",
        parameters : {
            cinema:selectcinema,
            theater:selecttheater,
            time:selectday
        },
        onSuccess : isseat_JSON,
        onFailure : ajaxFailed,
        onException : ajaxFailed
    });
}

function selectday_JSON(ajax) {
    $('select_day').descendants().each(function(element){element.remove();});
    var data = JSON.parse(ajax.responseText);
    for(var i=0;i<data.dates.length;i++) {
        if(data.dates[i].cinema != selectcinema || data.dates[i].movie != selectmovie)
            continue;
        if(data.dates[i].theater_and_time.length == 0){
            alert("선택하신 영화는 선택일에 상영하지 않습니다.");
            var paragraph = document.createElement("p");
            paragraph.innerHTML = "선택하신 영화는 현재 상영하지 않습니다."
            $("movies").appendChild(paragraph);
        }
        else {
            $('MENU2').style.backgroundColor = 'pink';
            for(var j=0;j<data.dates[i].theater_and_time.length;j++) {
                var lab = document.createElement('label');
                lab.id = 'theater_time'+j;
                $("select_day").appendChild(lab);                
                var radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'theater_time';
                radio.id = data.dates[i].theater_and_time[j][0];
                radio.className = data.dates[i].theater_and_time[j][1];
                radio.value = "theater="+data.dates[i].theater_and_time[j][0]+"&time="+data.dates[i].theater_and_time[j][1];
                radio.onclick = changetime;
                $("theater_time"+j).appendChild(radio);
                var span = document.createElement("span");
                span.innerHTML = data.dates[i].theater_and_time[j][0] + " " + data.dates[i].theater_and_time[j][1];
                $("theater_time"+j).appendChild(span);
                $("theater_time"+j).appendChild(document.createElement("br"));
            }
        }
    }
}

function movie_JSON(ajax) {
    var selectBox = document.getElementById("select_cinema");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    selectcinema = selectedValue;
    $('movies').descendants().each(function(element){element.remove();});
    var data = JSON.parse(ajax.responseText);
    for (var i = 0; i < data.movies.length; i++) {
        if(data.movies[i].cinema != selectedValue)
            continue;
        if(data.movies[i].movie.length == 0){
            alert("선택하신 영화관은 현재 영화를 상영하지 않습니다.");
            var paragraph = document.createElement("p");
            paragraph.innerHTML = "상영중인 영화가 없습니다."
            $("movies").appendChild(paragraph);
        }
        else{
            $('MENU1').style.backgroundColor = 'pink';
            for(var j =0; j< data.movies[i].movie.length;j++){
                var lab = document.createElement("label");
                lab.id = 'POSTER'+j;
                $("movies").appendChild(lab);
                var paragraph = document.createElement("p");
                paragraph.innerHTML = data.movies[i].movie[j][1];
                var image = document.createElement("img");
                image.src = '../img/movie/movie_'+data.movies[i].movie[j][0]+'.jpeg';
                var radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'movie';
                radio.value = data.movies[i].movie[j][0];
                radio.id = data.movies[i].movie[j][1];
                radio.className = 'movieposter';
                radio.onclick = changemovie;
                $('POSTER'+j).appendChild(image);
                $('POSTER'+j).appendChild(radio);
                $('POSTER'+j).appendChild(paragraph);
            }
        }
    }
}

function ajaxFailed(ajax, exception) {
    var errorMessage = "Error making Ajax request:\n\n";
    if (exception) {
        errorMessage += "Exception: " + exception.message;
    } else {
        errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
        "\n\nServer response text:\n" + ajax.responseText;
    }
    alert(errorMessage);
}


function resetseat() {
    $('seats').descendants().each(function(element){element.remove();});
    var noseat = document.createElement('p');
    noseat.innerHTML = '좌석을 선택할 수 없습니다.';
    $('seats').appendChild(noseat);
    $('people').innerHTML = '선택 인수 : 0명';
}

function resetdate() {
    $('select_day').descendants().each(function(element){element.remove();});
    var nodate = document.createElement('p');
    nodate.innerHTML = '날짜를 선택할 수 없습니다.';
    $('select_day').appendChild(nodate);
}

function resetapproval() {
    $('approvals').descendants().each(function(element){element.remove();});
    var nodata = document.createElement('p');
    nodata.innerHTML = '선행 과제를 수행해 주세요';
    $('approvals').appendChild(nodata);
    $("unopen").style.display = 'none';
}