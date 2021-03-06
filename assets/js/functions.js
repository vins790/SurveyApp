$(document).ready(function () {
   "use strict";
    $("#submitButton").click(function(){
        var username = $("#inputLogin").val(), password = $("#inputPass").val();
		var output = false;
        if ((username === "") || (password === "")) {
			//console.log("empty input");
            //$("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter username and password</div>");
        } else {
            $.ajax({
                type: "POST",
                url: "assets/php/checkLogin.php",
                data: "myusername=" + username + "&mypassword=" + password,
                dataType: 'JSON',
                success: function (html) {
                    //console.log(html.isExisting+" login.js");
                    if (html.isExisting === true) {
                        output = true;
						if (html.type === "user"){
							loadSurveyList("surveyList");
							go("loginPanel", "surveySelectionPanel");
						}else {
							go("loginPanel", "adminPanel");
						}	
                    } else {
						confirmBox("Błąd","Niepoprawne dane logowania.");
                    }
                document.getElementById("inputPass").value = "";
                },
                error: function(){
                    confirmBox("Brak internetu","Nie można nawiązać połączenia z serwerem.");
                },
                complete: function(){
                    return output;
                }
            });
        }
    });
});

function newQuestion(selector,n){
    if(n==1){$("#"+selector).empty();}
    $("#"+selector).append(
                "<div id='q"+n+"'><h3><strong>Pytanie "+n+"   </strong><button type='button' class='btn delete'><i class='fa fa-times' aria-hidden='true'></i>  Usuń</button></h3>"
                +"<input type='text' maxlength='255' placeholder='Wpisz treść pytania.' name=p"+n+"></input>"
                +"<div class='btn-group'>"
                +"<button type='button' class='btn answers'><i class='fa fa-gears' aria-hidden='true'></i><span>   Odpowiedzi</span>"
                +"</button>"
                +"<button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>"
                +"<span class='caret'></span></button><ul class='dropdown-menu' role='menu'>"
                +"<li>2</li>"
                +"<li>3</li>"
                +"<li>4</li>"
                +"<li>5</li>"
                +"<li>6</li>"
                +"</ul></div>"
                +"<div class='answers'></div></div>");

               
                if(n==1){
                    $("#newQuestions").empty()
                    .append("<tr id='ql1'><td><span class='fa-stack fa-sm'><i class='fa fa-circle fa-stack-2x' aria-hidden='true'></i><i class='fa fa-stack-1x'><strong>1</strong></i></span></td></tr>")
                    .append("<tr id='plus'><td><span class='fa-stack fa-sm'><i class='fa fa-plus-circle fa-stack-2x' aria-hidden='true'></i></span></td></tr>");
                }else{
                    $("#q"+n).css("display","block");
                    $("#ql"+(n-1)).after("<tr id='ql"+n+"'><td><span class='fa-stack fa-sm'><i class='fa fa-circle fa-stack-2x' aria-hidden='true'></i><i class='fa fa-stack-1x'><strong>"+n+"</strong></i></span></td></tr>");
                     
                    for(i=1 ; i<parseInt(n) ; i++){
                        var selector = "div#q" + i;
                            if($(selector).css("display")=="block"){
                                $(selector).css("display", "none");
                            }
                    }
                };
              
};

function removeQuestion(removed,n){
   
    if(n>2){
        $("#q"+removed).remove();
        $("#ql"+removed).remove();

        for(i=parseInt(removed)+1 ; i<parseInt(n) ; i++){
            $("#ql"+i).attr('id','ql'+(i-1));
            $("#ql"+(i-1)+" td span i:nth-of-type(2) strong").text(i-1);

            $("#q"+i).attr('id','q'+(i-1));
            $("#q"+(i-1)+" input[name=p"+i+"]").attr('name','p'+(i-1));
            $("#q"+(i-1)+' div[class="answers"] input').each(function(){
              var name = $(this).attr("name");
              var newName = "p"+(i-1)+name.substr(2);
              $(this).attr("name", newName);    
            });
            $("#q"+(i-1)+" h3 strong").text("Pytanie "+(i-1)+"   ");
            
        }
        
                                                        //sprawdzamy czy po usunieciu istnieje div na miejscec usunietego
        if($("#q"+(removed)).length!=0){
            $("#q"+(removed)).css('display','block')    //jesli tak to go wyswietlamy
        }else{
            $("#q"+(removed-1)).css('display','block'); //jesli nie to wyswietlamy poprzedni
        }

    }
};

function showQuestion(n,nMax){
     for(i=1 ; i<=parseInt(nMax) ; i++){
                var selector = "div#q" + i;
                    if($(selector).css("display")=="block"){
                        $(selector).css("display", "none");
                        break;
                    }
            } 
            $("div#q"+n).css("display","block");  
}
 
function setAmountOfAnswers(questionNumber,n){
    $("div[id='q"+questionNumber+"'] div[class='btn-group'] button[class*='answers'] > span").text("     " + n);
            
            $("div[id='q"+questionNumber+"'] div[class='answers']").empty();     
            for(i=0 ; i<parseInt(n) ; i++){
            $("div[id='q"+questionNumber+"'] div[class='answers']").append("<input type='text' maxlength='255' id='"+(i+1)+"' placeholder='Odpodziedź numer "+(i+1)+".' name=p"+questionNumber+"o"+(i+1)+"></input>")
            }
}

function go(from, to, func){
        $("#contener").hide(300);
        $("#"+to).css("display", "block");
        $("#"+from).css("display", "none");
        if(arguments.length ==3 ){
         func();   
        }
        $("#contener").fadeToggle(300);
};

function addSurveyToDB(){
    
    var answersAmount = [];
    var questionAmount = $("#newQuestions tr:nth-last-child(2)").attr("id").substr(2);        //ilość pytań
     
    
    
    var survey = [];
    survey[0] = [];
    survey[0][0] = [];
    survey[0][0][0] = $('input[name="surveyTitle"]').val();
    survey[0][0][1] = $('input[name="surveyDescription"]').val();
    
    $("#newQuestion > div[id^='q']").each(function(){
        var questionNumber = $(this).attr("id").substr(1);
        var question = $("#newQuestion > div[id="+ $(this).attr("id") + "] input[name = p" +questionNumber+ "]").val();
        var answers = [];
        survey[0][questionNumber] = $('div#q'+questionNumber+' div[class="answers"] input:last-child').attr("id");    //ilość odpowiedzi w pytaniu 
        
        $("#newQuestion > div[id="+ $(this).attr("id") + "] div[class = answers] input").each(function(){
            answers.push($(this).val());
        });
        
        var temp = [];
        temp.push(question);
        temp.push(answers);
        
        survey[questionNumber] = temp;
    });
    var JSONdata = JSON.stringify(survey);
    $.ajax({
            type: "POST",
            url: "http://erowerek.pl/assets/php/addSurvey.php",
            data: {n:questionAmount , survey: JSONdata},
            dataType: "text",
            beforeSend: function(){
                $('div[class="container"]').css("display", "none");
                $("body").append('<div class="loader" height: "auto" width: 400></div>');
            },
            success: function(data){
               $('div[class="loader"]').remove();
               confirmBox("Sukces","Ankieta dodana pomyślnie!");
               newQuestion("newQuestion",1);
            },
            error: function(){
                $('div[class="loader"]').remove();
                confirmBox("Brak internetu","Ankieta zostanie zapiasana w bazie po ponownym nawiązaniu połączenia.");
                newQuestion("newQuestion",1);
            }
    });
};

function confirmBox(title, massage){
     $('div[class="container"]').css("display", "none");
                $("body").append(
                    '<div id="dialog-confirm" title="'+title+'">'+
                    '<p>'+massage+'</p></div>'
                );
                
                $( function() {
                    $( "#dialog-confirm" ).dialog({
                      dialogClass: "no-close",
                      resizable: false,
                      height: "auto",
                      width: 400,
                      buttons: {
                        "OK": function() {
                          $( this ).dialog( "close" );
                          $('div[class="container"]').css("display", "block");
                          $('div[id="dialog-confirm"]').remove();
                        }
                      }
                    });
                });
}

function surveyManagementBox(id, title){
    $.ajax({
            type: "POST",
            url: "http://erowerek.pl/assets/php/getDescription.php",
            data: {id:id},
            dataType: "text",
            beforeSend: function(){
                $("body").append('<div class="loader" height: "auto" width: 400></div>');
            },
            success: function(data){
                $('div[class="loader"]').remove();
                $("body").append(
                    '<div id="dialog" title="'+title+'">'+
                    '<p>'+JSON.parse(data).Opis+'</p></div>'
                );

                $( function() {
                    $( "#dialog" ).dialog({
                      dialogClass: "no-close",
                      resizable: false,
                      height: "auto",
                      width: 400,
                      buttons: {
                        "Usuń": function() {
                          $( this ).dialog( "close" );
                          $.ajax({
                            type: "POST",
                            url: "http://erowerek.pl/assets/php/deleteSurvey.php",
                            data: {id:id},
                            dataType: "text",
                            beforeSend: function(){
                                $('div[class="container"]').css("display", "none");
                                $("body").append('<div class="loader" height: "auto" width: 400></div>');
                            },
                            success: function(data){
                                $('div[class="loader"]').remove();
                                loadSurveyList("managementList");
                                confirmBox("Sukces","Pomyślnie usunięto ankiete!");
                                $('div[id="dialog"]').remove();
                            },
                            error: function(data){
                                $('div[class="loader"]').remove();
                                confirmBox("Błąd","brak połączenia z internetem. Ankieta nie zostanie usunięta!");
                                $('div[id="dialog"]').remove();
                            } 
                          });
                        },
                        "OK": function() {
                          $( this ).dialog( "close" );
                          $('div[class="container"]').css("display", "block");
                          $('div[id="dialog-confirm"]').remove();
                        }
                      }
                    });
                });
            },
            error: function(){
                $('div[class="loader"]').remove();
                confirmBox("Brak internetu","Nie można pobrać danych dotyczących ankiety.");
            }
    });
}

function loadSurveyList(divID){

   $.ajax({
            url: "http://erowerek.pl/assets/php/loadSurveyList.php",
            data: "",
            dataType: "text",
            beforeSend: function(){
                if( $('div[class="loader"]') ) $('div[class="loader"]').remove();
                $('div[class="container"]').css("display", "none");
                $("body").append('<div class="loader" height: "auto" width: 400></div>');
                $("#"+divID).empty();
            },
            success: function(data){
                
                var items = [];
                $.each(JSON.parse(data), function(id,value){
                    items.push("<tr id='listElem" + value.id + "'><td><span>" + value.Tytul + "</span><td></tr>");
                });
                $("#"+divID).html(items);
                $('div[class="loader"]').remove();
                $('div[class="container"]').css("display", "block");
            },
            error: function(){
                $('div[class="loader"]').remove();
                $('div[class="container"]').css("display", "block");
                confirmBox("Brak internetu",'Nie można załadować listy ankiet. Użyj przycisku "Odśwież Listę Ankiet", kiedy połączenie z siecią będzie dostępne. ');
                $("#"+divID).html('<div class="col-xs-12 col-sm-12 col-md-12" id="refreshList" >Odśwież Listę Ankiet</div>');
                $("#refreshList").click(function(){
                    $("#refreshList").remove();
                    loadSurveyList(divID);
                });
            }
   });
};

function getAnswers(questions, surveyID){
   
    surveyPanelBubbles(questions.length);
    $("#SurveyForm").empty();
    var len = questions.length;
    $.each(questions, function(id,question){
        $.ajax({
            type: "POST",
            url: "http://erowerek.pl/assets/php/getAnswers.php",
            data: {id:question[0]},
            dataType: "text",
            success: function(data){

                var answers = [];
                $.each(JSON.parse(data), function(valID,value){
                    answers[valID] = [value.id, value.opis];
                });
                questions[id].push(answers);
                var displayBlock = "block";
                var displayNone = "none";
                var newQuestion = 
                    '<div id="q'+(id+1)+'" name="'+question[0]+'" style="display:'; 
                    if(id == 0){newQuestion+=displayBlock; }
                    else{ newQuestion+=displayNone; }
                newQuestion += ';"><h3>Pytanie ' +(id+1)+ "</h3>" +
                    "<span>" +question[1]+ "</span><br>";
                    "<form>" +
                $.each(question[2], function(ansID,ans){
                    newQuestion+='<input type="radio" name="q'+(id+1)+'" value="'+ans[0]+'"/>' +ans[1]+ "<br>";
                });
                newQuestion+='</form></div>';
                $("#SurveyForm").append(newQuestion);
                if(id == len-1){
                    $('div[class="loader"]').remove();
                    $('div[class="container"]').css("display", "block");
                }
            },
            error: function(){
                confirmBox("Brak internetu","Nie można załadować ankiety. Ankieta zostanie załadowana, kiedy połączenie z internetem będzie dostępne.");
            }
        });
    });
    
};

function getQuestions(id){
    
    $('div[class="container"]').css("display", "none");
    $("body").append('<div class="loader" height: "auto" width: 400></div>');
    
    var questions= [];
    $.ajax({
            type: "POST",
            url: "http://erowerek.pl/assets/php/getQuestions.php",
            data: {id:id},
            dataType: "text",
            success: function(data){
                
                $.each(JSON.parse(data), function(id,value){
                    questions[id] = [value.id, value.Pytanie];
                });
                getAnswers(questions, id);
            },
            error: function(){
                confirmBox("Brak internetu","Nie można załadować ankiety. Ankieta zostanie załadowana, kiedy połączenie z internetem będzie dostępne.");
            }
    });
    
};

function surveyPanelBubbles(questionAmount){
    $("#spQuestionsList").empty();
    for(var i = 1 ; i<=questionAmount ; i++)
    $("#spQuestionsList").append("<tr id='spql"+i+"'><td><span class='fa-stack fa-sm'><i class='fa fa-circle fa-stack-2x' aria-hidden='true'></i><i class='fa fa-stack-1x'><strong>"+i+"</strong></i></span></td></tr>");
}

function getResault(){
    var results = [];
    var questionAmount;
  $("#SurveyForm > div").each(function(i,q){
      questionAmount=i;
      $("#"+$(q).attr("id")+" > input").each(function(i2,input){
         if(input.checked){
             results[i] = [];
             results[i] = [$(q).attr("name"), $(input).attr("value")];
         } 
      });
  });
    
    var JSONdata = JSON.stringify(results);
    $.ajax({
            type: "POST",
            url: "http://erowerek.pl/assets/php/sendResult.php",
            data: {results:JSONdata, questionAmount:questionAmount},
            dataType: "text",
            success: function(data){
                confirmBox("Sukces","Odpowiedzi zapisane w bazie!");
            },
            error: function(){
                confirmBox("Brak internetu","Odpowiedzi zostaną zapiasane w bazie po ponownym nawiązaniu połączenia.");
            }
    });
};

        function loadUsers(){
            $.ajax({
            url: "assets/php/users.php",
            data: "",
            dataType: "text",
            success: function(data){
                $("#users-table").empty;
                var items = [];
                $.each(JSON.parse(data), function(id, json){
                    items.push("<tr id='" + json.Login +"'><td>#<span>" + json.Login +"</span></td></tr>")
                })
                $("#users-table").html(items);
            },
            error: function(){
                confirmBox("Brak internetu","Nie można załadować listy użytkowników. Lista zostanie załadowana, kiedy połączenie z internetem będzie dostępne.");
            }
            });
        };

        function searchUsers(){
            
            var log = $("#inputSearch").val();
            
            if(log!=""){
            $.ajax({
            type: "POST",
            url: "assets/php/usersSearch.php",
            data: "log="+log,
            dataType: "text",
            success: function(data){
                $("#users-table").empty;
                var items = [];
                $.each(JSON.parse(data), function(id, json){
                    items.push("<tr id='" + json.Login +"'><td>#<span>" + json.Login +"</span></td></tr>")
                })
                $("#users-table").html(items);
            },
            error: function(){
                confirmBox("Brak internetu","Nie można wyszukać użytkowników. Użytkownicy zostaną załadowani, kiedy połączenie z internetem będzie dostępne.");
            }
            });
            }
            else{
                loadUsers();
            }
        };

        function userInfo(u_id){
            $.ajax({
            type: "POST",
            url: "assets/php/userInfo.php",
            data: {userID : u_id},
            dataType: "text",
            success: function(data){
                $("#userInfo").empty();
                var items = []; 
                $.each(JSON.parse(data), function(id, json) {  
               items.push('<li class="list-group-item" tag="'+ u_id +'" id="userLogin">Login : <span>'+json.Login+'</span></li>'+
                         '<li class="list-group-item" id="userPass">Haslo : <span>'+json.Haslo+'</span></li>');
               $("#userInfo").html(items);
                });
                },
            error: function(){
                confirmBox("Brak internetu","Nie można załadować danych użytkownika. Dane zostaną załadowane, kiedy połączenie z internetem będzie dostępne.");
            }
        });
        };

        function deleteUser(name){
        $.ajax({
            type: "POST",
            url: "assets/php/userDelete.php",
            data: {Uname: name},
            dataType: "text",
            success: function(data){
                loadUsers()
                confirmBox("Sukces","Użytkownik został usunięty!");
            },
            error: function(){
                confirmBox("Brak internetu","Użytkownik zostanie usunięty z bazy po ponownym nawiązaniu połączenia.");
            }
        });}

        function addUser(login, pass){
        $.ajax({
            type: "POST",
            url: "assets/php/userAdd.php",
            data: {a : login, b : pass},
            dataType: "text",
            success: function(data){
                confirmBox("Sukces","Użytkownik został dodany!");
            },
            error: function(){
                confirmBox("Brak internetu","Użytkownik zostanie zapiasany w bazie po ponownym nawiązaniu połączenia.");
            }
        });}

        var slideIndex = 1;
        showDivs(slideIndex);

        function currentDiv(n) {
        showDivs(slideIndex = n);
        }

        function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("chart");
        var dots = document.getElementsByClassName("choose");
        if (n > x.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" b-grey", "");
        }
        x[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " b-grey";
        }   




function getAnswers2(questions, surveyID){
   
    surveyPanelBubbles2(questions.length);
    $("#VisualisationForm").empty();
    var len = questions.length;
    $.each(questions, function(id,question){
        $.ajax({
            type: "POST",
            url: "assets/php/getAnswers.php",
            data: {id:question[0]},
            dataType: "text",
            success: function(data){

                var answers = [];
                $.each(JSON.parse(data), function(valID,value){
                    answers[valID] = [value.id, value.opis];
                });
                questions[id].push(answers);
                var displayBlock = "block";
                var displayNone = "none";
                var newQuestion = 
                    '<div id="q'+(id+1)+'" name="'+question[0]+'" style="display:'; 
                    if(id == 0){newQuestion+=displayBlock; }
                    else{ newQuestion+=displayNone; }
                newQuestion += ';"><h3>Pytanie ' +(id+1)+ "</h3>" +
                    "<span>" +question[1]+ "</span><br>";
                    "<form>" +
                $.each(question[2], function(ansID,ans){
                    newQuestion+='<name="q'+(id+1)+'" value="'+ans[0]+'"/>' +ans[1]+ "<br>";
                });
                newQuestion+='</form></div>';
                $("#VisualisationForm").append(newQuestion);
                if(id == len-1){
                    $('div[class="loader"]').remove();
                    $('div[class="container"]').css("display", "block");
                }
            },
            error: function(){
                confirmBox("Brak internetu","Nie można załadować ankiety. Ankieta zostanie załadowana, kiedy połączenie z internetem będzie dostępne.");
            }
        });
    });
    
};



function getQuestions2(id){
    
    $('div[class="container"]').css("display", "none");
    $("body").append('<div class="loader" height: "auto" width: 400></div>');
    
    var questions= [];
    $.ajax({
            type: "POST",
            url: "assets/php/getQuestions.php",
            data: {id:id},
            dataType: "text",
            success: function(data){
                
                $.each(JSON.parse(data), function(id,value){
                    questions[id] = [value.id, value.Pytanie];
                });
                getAnswers2(questions, id);
            },
            error: function(){
                confirmBox("Brak internetu","Nie można załadować ankiety. Ankieta zostanie załadowana, kiedy połączenie z internetem będzie dostępne.");
            }   
    });
    
};

function surveyPanelBubbles2(questionAmount){
    $("#QList").empty();
    for(var i = 1 ; i<=questionAmount ; i++)
    $("#QList").append("<tr id='spql"+i+"'><td><span class='fa-stack fa-sm'><i class='fa fa-circle fa-stack-2x' aria-hidden='true'></i><i class='fa fa-stack-1x'><strong>"+i+"</strong></i></span></td></tr>");
}