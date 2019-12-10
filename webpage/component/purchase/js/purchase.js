window.onload = function() {
    sectionselect('cinema');
};

var prices = 10000;

var selectcinema;
var selectmovie;
var selectmovie_name;
var selectday;
var selecttheater;
var selectseat;
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

function changecinema() {
    for (var i = 1; i <= 5; i++) {
        $('MENU'+i).style.backgroundColor = 'transparent';
    }
    $('selection_movie').innerHTML = '선택하신 영화 : 미선택';
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
    new Ajax.Request("seat_json.php",{
      method : "get",
      onSuccess : seat_JSON,
      onFailure : ajaxFailed,
      onException : ajaxFailed
  });
}

function changeseat() {
    for (var i = 4; i <= 5; i++) {
        $('MENU'+i).style.backgroundColor = 'transparent';
    }
    $('MENU4').style.backgroundColor = 'pink';
    selectseat = this.value;
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
    seti.innerHTML = selectday;
    $("movie_data").appendChild(seti);
    var seth = document.createElement('p');
    seth.innerHTML = selecttheater;
    $("movie_data").appendChild(seth);

    var purchase = document.createElement('div');
    purchase.id = 'purchase';
    $("approvals").appendChild(purchase);
    var price = document.createElement('p');
    price.innerHTML = "결제금액은 : " + prices +"입니다.";
    $("purchase").appendChild(price);

    var hidden = document.createElement('input')
    hidden.setAttribute("type", "hidden");
    hidden.setAttribute("name", "price");
    hidden.setAttribute("value", prices);
    $("approvals").appendChild(hidden);
}

function seat_JSON(ajax) {
    $('seats').descendants().each(function(element){element.remove();});
    var data = JSON.parse(ajax.responseText);
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
            for(var j=0;j<data.seats[i].seat.length;j++) {
                var lab = document.createElement('label');
                lab.id = 'seat'+j;
                $("seats").appendChild(lab);                
                var radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'seat';
                radio.id = data.seats[i].seat[j];
                radio.value = data.seats[i].seat[j];
                radio.onclick = changeseat;
                $("seat"+j).appendChild(radio);
                var span = document.createElement("span");
                span.innerHTML = data.seats[i].seat[j];
                $("seat"+j).appendChild(span);
                $("seat"+j).appendChild(document.createElement("br"));
            }
        }
    }
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
