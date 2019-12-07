window.onload = function() {
    sectionselect('cinema');
};

// function areaselect(Type){
//     new Ajax.Request("cinema_json.php",{
//         method : "get",
//         parameters : {area: Type },
//         onSuccess : cinema_JSON,
//         onFailure : ajaxFailed,
//         onException : ajaxFailed
//     });
// }

function changecinema() {
    new Ajax.Request("movie_json.php",{
        method : "get",
        onSuccess : movie_JSON,
        onFailure : ajaxFailed,
        onException : ajaxFailed
    });
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
            alert("적자라 영화를 상영할 돈도 없나 봐요..");
            var paragraph = document.createElement("p");        
            paragraph.innerHTML = "상영중인 영화가 없습니다."
            $("movies").appendChild(paragraph);
        }
        else
            for(var j =0; j< data.movies[i].movie.length;j++){
            var span = document.createElement("span");        
            span.innerHTML = data.movies[i].movie[j][1];
            $("movies").appendChild(createRadioElement('movie',data.movies[i].movie[j][0], 0));
            $("movies").appendChild(span);
            $("movies").appendChild(document.createElement("br"));
        }
    }
}

function createRadioElement(name, value, checked) {
    var radioHtml = '<input type="radio" name="' + name + '" value="' + value + '"';
    if ( checked ) {
        radioHtml += ' checked="checked"';
    }
    radioHtml += '/>"' + value +'"';

    var radioFragment = document.createElement('div');
    radioFragment.innerHTML = radioHtml;

    return radioFragment.firstChild;
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

function sectionselect(section) {
    var sections = document.getElementsByTagName('section');
    for (var i = sections.length - 1; i >= 0; i--) {
        sections[i].style.display = 'none';
    }
    if(section != 'none')
        document.getElementById(section).style.display = 'block';
}

// function areaselect(areat) {
//     var areas = document.getElementsByClassName('road');
//     for (var i = areas.length - 1; i >= 0; i--) {
//         areas[i].style.display = 'none';
//     }
//     if(areat != 'none')
//         document.getElementById(areat).style.display = 'block';
// }