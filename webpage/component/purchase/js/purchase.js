window.onload = function() {
    sectionselect('cinema');
    // areaselect('area1');
    // $("A1").onclick=function(){
    //     areaselect('area1');
    // }
    // $("A2").onclick=function(){
    //     areaselect('area1');
    // }
    // $("A3").onclick=function(){
    //     areaselect('area1');
    // }
    // $("A4").onclick=function(){
    //     areaselect('area1');
    // }
    // $("A5").onclick=function(){
    //     areaselect('area1');
    // }
};

//bye... lovly ajax.. fu x   k k 
// function areaselect(Type){
//     //construct a Prototype Ajax.request object
//     new Ajax.Request("cinema_json.php",{
//         method : "get",
//         parameters : {area: Type },
//         onSuccess : cinema_JSON,
//         onFailure : ajaxFailed,
//         onException : ajaxFailed
//     });
// }

// function cinema_JSON(ajax) {
//     alert(ajax.responseText);
//     $('road').descendants().each(function(element){element.remove();});
//         var data = JSON.parse(ajax.responseText);
//         for (var i = 0; i < data.cinemas.length; i++) {
//             var li = document.createElement("li");
//             li.innerHTML = data.cinemas[i].Name;;
//             $("road").appendChild(li);
//         }
// }

// function ajaxFailed(ajax, exception) {
//     var errorMessage = "Error making Ajax request:\n\n";
//     if (exception) {
//         errorMessage += "Exception: " + exception.message;
//     } else {
//         errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText + 
//         "\n\nServer response text:\n" + ajax.responseText;
//     }
//     alert(errorMessage);
// }
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