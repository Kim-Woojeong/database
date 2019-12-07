window.onload = function() {
    sectionselect('cinema');
};

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
    $('MENU2').style.backgroundColor = 'pink';
    alert("선택하신 영화는 " + this.id + "입니다.");
    $('selection_movie').innerHTML = '선택하신 영화 : ' + this.id;
}

function movie_JSON(ajax) {
    var selectBox = document.getElementById("select_cinema");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
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
                var div = document.createElement("label");
                div.id = 'POSTER'+j;
                $("movies").appendChild(div);
                var paragraph = document.createElement("p");        
                paragraph.innerHTML = data.movies[i].movie[j][1];
                var image = document.createElement("img");
                image.src = '../img/movie/movie_'+data.movies[i].movie[j][0]+'.jpeg';
                var radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'movie';
                radio.value = data.movies[i].movie[j][0];
                //죄송합니다. id를 이따구로 사용하면 안되는데 너무 귀찮아요.
                radio.id = data.movies[i].movie[j][1];
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


// 추후 추가 예정
// function areaselect(Type){
//     new Ajax.Request("cinema_json.php",{
//         method : "get",
//         parameters : {area: Type },
//         onSuccess : cinema_JSON,
//         onFailure : ajaxFailed,
//         onException : ajaxFailed
//     });
// }

// function areaselect(areat) {
//     var areas = document.getElementsByClassName('road');
//     for (var i = areas.length - 1; i >= 0; i--) {
//         areas[i].style.display = 'none';
//     }
//     if(areat != 'none')
//         document.getElementById(areat).style.display = 'block';
// }