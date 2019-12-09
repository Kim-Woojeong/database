window.onload = function() {
    sectionselect('cinema');
};

var selectcinema;
var selectmovie;
var selectday;
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
    $('MENU1').style.backgroundColor = 'transparent';
    $('selection_movie').innerHTML = '선택하신 영화 : 미선택';
    new Ajax.Request("movie_json.php",{
        method : "get",
        onSuccess : movie_JSON,
        onFailure : ajaxFailed,
        onException : ajaxFailed
    });
}

function changemovie(){
    $('selection_movie').innerHTML = '선택하신 영화 : ' + this.id;
    selectmovie = this.value;
    new Ajax.Request("selectday_json.php",{
      method : "get",
      onSuccess : selectday_JSON,
      onFailure : ajaxFailed,
      onException : ajaxFailed
  });
}

function selectday_JSON(ajax) {
    $('select_day').descendants().each(function(element){element.remove();});
    var data = JSON.parse(ajax.responseText);
    for(var i=0;i<data.dates.length;i++) {
        if(data.dates[i].cinema != selectcinema && data.dates[i].movie != selectmovie)
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
                radio.value = "theater="+data.dates[i].theater_and_time[j][0]+"&time="+data.dates[i].theater_and_time[j][1];
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
