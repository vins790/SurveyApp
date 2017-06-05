<!DOCTYPE html>
<html lang="pl_PL">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>SurveyApp</title>

    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
      <link href='http://fonts.googleapis.com/css?family=Armata&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/main.css" />

  </head>
  
    
    
<body>
    

<div class="container">
        
    <div id="loginPanel">
            <div class="col-xs-4 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4" id="plane">            
                    <i class="fa fa-paper-plane-o fa-4x" aria-hidden="true"></i>
            </div>
            <div class="col-xs-4 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4"></div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <h1 id="header"><strong>Survey App</strong></h1>
            </div>
            
            <form class="form-horizontal" role="form">
                
                <div class="form-group" class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                    
                    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true" id="userIcon"></i></span>
                            <input type="text" class="form-control" id="inputLogin" placeholder="Podaj login">
                        </div>
                    </div>
                    <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1"></div>
                </div>

                
                <div class="form-group" class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
    
                    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw" id="keyIcon"></i></span>

                            <input type="password" class="form-control" id="inputPass" placeholder="Podaj hasło">
                        </div>
                    </div>
                    <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1"></div>
                </div>
                
                <div class="form-group" class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                    <div class="col-xs-7 col-xs-offset-1 col-sm-7 col-sm-offset-1 col-md-7 col-md-offset-1">
                        <label class="menuItem" id="submitButton">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>   Zaloguj 
                        </label>
						<div id="message"></div>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5"></div>
                </div>
                
            </form>
            </div>  
    <div id="surveySelectionPanel">
        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
        <div class="col-xs-1 col-xs-offset-11 col-sm-1 col-sm-offset-11 col-md-1 col-md-offset-11">
            <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true" id="back1"></i>
        </div>
        <h1><strong>Lista Ankiet</strong></h1>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
            <div class="scrollbar col-xs-12 col-sm-12 col-md-12" id="scroll-style">
                <div class="force-overflow col-xs-12 col-sm-12 col-md-12">
                    <strong>
                    <table class="table-responsive">
                        <tbody id="surveyList">
                            
                        </tbody>    
                    </table>
                    </strong>
                </div>
            </div>
        </div>
    </div>      
    <div id="surveyPanel" class="col-xs-12 col-sm-12 col-md-12">
        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
        <div class="col-xs-1 col-xs-offset-11 col-sm-1 col-sm-offset-11 col-md-1 col-md-offset-11">
            <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true" id="back2"></i>
        </div>
        <h1><strong>Ankieta</strong></h1>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1"></div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-10 col-sm-10 col-md-10" id="SurveyForm">
            </div>
            
            <div class="col-xs-2 col-sm-2 col-md-2">
    <strong>
    <table id="spQuestionsList">
    
    </table>
    </strong>
            </div>
           <div class="col-xs-12 col-sm-12 col-md-12" id="sendResult" >Zatwierdź</div>
        </div> 
    </div>
    <div id="surveyCreator" class="col-xs-12 col-sm-12 col-md-12">
        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
        <div class="col-xs-1 col-xs-offset-11 col-sm-1 col-sm-offset-11 col-md-1 col-md-offset-11">
            <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true" id="back3"></i>
        </div>
        <h1><strong>Kreator Ankiet</strong></h1>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1"></div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-10 col-sm-10 col-md-10">
            <input type='text' maxlength='255' placeholder='Wpisz tytuł ankiety.' name="surveyTitle">
            <input type='text' maxlength='255' placeholder='Wpisz krótki opis tematu ankiety.' name="surveyDescription">
            <div class="col-xs-12 col-sm-12 col-md-12" id="newQuestion">

	           
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" id="createSurvey" >Zatwierdź</div>
            </div>
            
            <div class="col-xs-2 col-sm-2 col-md-2">
                <strong>
                    <table id="newQuestions">
    

                    </table>
                </strong>
            </div>
        </div>
    </div>
    <div id="adminPanel">

            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                <div class="col-xs-1 col-xs-offset-11 col-sm-1 col-sm-offset-11 col-md-1 col-md-offset-11">
                    <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true" id="back4"></i>
                </div>
                <h1><strong>Admin Panel</strong></h1>
            </div>

            <div class="col-xs-10 col-xs-offset-3 col-sm-10 col-sm offset-3 col-md-10 col-md-offset-3">


                <h3 id="toSurveyCreator"><i class="fa fa-list-ol" aria-hidden="true"></i>
                    <p1></p1>Dodaj ankietę</h3>
                <h3 id="toUsers"><i class="fa fa-users" aria-hidden="true"></i>
                    <p1></p1>Użytkownicy</h3>
                <h3 id="toSurveyManagement"><i class="fa fa-wrench" aria-hidden="true"></i>
                    <p1></p1>Zarządzaj ankietami</h3>
                <h3 id="toVisualisation"><i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p1></p1>Wizualizacje</h3>

            </div>

        </div>
    <div id="Users">

            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                <div class="col-xs-1 col-xs-offset-11 col-sm-1 col-sm-offset-11 col-md-1 col-md-offset-11">
                    <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true" id="back5"></i>
                </div>
                <h1><strong>Użytkownicy</strong></h1>
            </div>

            <div class="col-xs-1 col-sm-1 col-md-1"></div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-10 col-sm-10 col-md-10 col-md-offset-5" id="Opcje">

                    <div id='options'>
                        <h3>Wybór opcji</h3>
                        <div class='btn-group'>
                            <button type='button' class='btn'><i class='fa fa-gears' aria-hidden='true'></i><span>   Opcje</span>
                    </button>
                            <button type='button' id='dropdown' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                    <span class='caret'></span></button>
                            <ul id='dropdown-ul' class='dropdown-menu' role='menu'>
                                <li id='Dodawanie'>Dodawanie</li>
                                <li id='Usuwanie'>Usuwanie</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-10 col-sm-10 col-md-10">

                    <div class="usun" class="col-md-12 col-lg-12 col-md-offset-3">
                        <div class="col-md-8 col-md-offset-1 col-lg-12">
                            <div class="col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2">
                                <h3>Użytkownicy</h3>
                                <div class="form-group" class="col-md-12 col-lg-4 col-md-offset-2">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="inputSearch" placeholder="Podaj login">
                                            <span class="input-group-btn">
                                        <button id="search" type="button" class="btn btn-secondary search"><i class="fa fa-search" aria-hidden="true" id="userIcon"></i></button>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-offset-6 col-sm-offset-6 col-md-offset-6 col-lg-offset-6"></div>
                                </div>
                                <div class="scrollbar-usersTable" id="scroll-style">
                                    <div class="force-overflow">
                                        <table class="table table-hover">
                                            <tbody id="users-table">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="dataTable" class="col-md-4 col-md-offset-1 col-lg-4">
                                <h3>Dane</h3>
                                <ul class="list-group" id="userInfo">
                                    <li class="list-group-item" id="userLogin"><strong>Login : </strong><span></span></li>
                                    <li class="list-group-item" id="userPass"><strong>Hasło : </strong><span></span></li>
                                </ul>

                                <div class="delete">
                                    <button id="delete" type="button" class="btn btn-default btn-lg"><i class="fa fa-trash" aria-hidden="true"></i><span>  Usuń</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="dodaj" class="col-md-12 col-lg-12 col-md-offset-1">
                <div class="col-md-8 col-md-offset-1 col-lg-8">
                    <div id="dataTable" class="col-md-8 col-md-offset-1 col-lg-8">
                        <h3>Dane</h3>
                        <div class="col-md-12 col-lg-12">
                            <table class="table">
                                <tr>
                                    <td>Login: </td>
                                    <td><input id="loginAdd" type="text" maxlength="255" placeholder="Podaj Login" /></td>
                                </tr>
                                <tr>
                                    <td>Hasło: </td>
                                    <td><input id="passAdd" type="text" maxlength="255" placeholder="Podaj Hasło" /></td>
                                </tr>
                            </table>

                            <div class="add">
                                <button id="add" type="button" class="btn btn-default btn-lg"><i class="fa fa-plus-circle" aria-hidden="true"></i><span>  Dodaj</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <div id="surveyManagementPanel">
        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
        <div class="col-xs-1 col-xs-offset-11 col-sm-1 col-sm-offset-11 col-md-1 col-md-offset-11">
            <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true" id="back6"></i>
        </div>
        <h1><strong>Zarzadzanie ankietami</strong></h1>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
            <div class="scrollbar col-xs-12 col-sm-12 col-md-12" id="scroll-style">
                <div class="force-overflow col-xs-12 col-sm-12 col-md-12">
                    <strong>
                    <table class="table-responsive">
                        <tbody id="managementList">
                            
                        </tbody>    
                    </table>
                    </strong>
                </div>
            </div>
        </div>
    </div> 
    <div id="Visualisation">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                <div class="col-xs-1 col-xs-offset-11 col-sm-1 col-sm-offset-11 col-md-1 col-md-offset-11">
                    <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true" id="back7"></i>
                </div>
                <h1><strong>Wybór ankiety</strong></h1>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                <div class="scrollbar col-xs-12 col-sm-12 col-md-12" id="scroll-style">
                    <div class="force-overflow col-xs-12 col-sm-12 col-md-12">
                        <strong>
                    <table class="table-responsive">
                        <tbody id="visualisationList">
                            
                        </tbody>    
                    </table>
                    </strong>
                    </div>
                </div>
            </div>
        </div>
    <div id="visualisationPanel" class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                <div class="col-xs-1 col-xs-offset-11 col-sm-1 col-sm-offset-11 col-md-1 col-md-offset-11">
                    <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true" id="back8"></i>
                </div>
                <h1><strong>Ankieta</strong></h1>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1"></div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-10 col-sm-10 col-md-10" id="VisualisationForm">
                </div>

                <div class="col-xs-2 col-sm-2 col-md-2">
                    <strong>
    <table id="QList">
    
    </table>
    </strong>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div>
                    <div class="chart" style="width:100%">Kołowy</div>
                    <div class="chart" style="width:100%">Słupkowy</div>
                    <div class="chart" style="width:100%">Liniowy</div>
                </div>
                <div class="button-center">
                    <button class="chart-button choose" onclick="currentDiv(1)">Kołowy</button>
                    <button class="chart-button choose" onclick="currentDiv(2)">Słupkowy</button>
                    <button class="chart-button choose" onclick="currentDiv(3)">Liniowy</button>
                </div>
                </div>
        </div>
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- The AJAX login script -->
	<!-- <script src="assets/js/login.js"></script> -->
    <script src="assets/js/offlineJS.js"></script>
    <script>
                
        $("#loginPanel").css("display","block");
        $("#adminPanel").hide();
        $("#Users").hide();
        $("#surveySelectionPanel").hide();
        $("#surveyPanel").hide();
        $("#surveyCreator").hide();
        $("#surveyManagementPanel").hide();
        $("#Visualisation").hide();
        $("#visualisationPanel").hide();
        $("#contener").hide().fadeToggle(1500);

            $("#surveyList").delegate('tr', 'click', function(clicked) {
                var id = $("#" + clicked.currentTarget.getAttribute("id")).attr("id").substr(8);
                getQuestions(id);
                go("surveySelectionPanel", "surveyPanel");
            });

            $("#managementList").delegate('tr', 'click', function(clicked) {
                var id = $("#" + clicked.currentTarget.getAttribute("id")).attr("id").substr(8);
                var title = $("#" + clicked.currentTarget.getAttribute("id")).text();
                surveyManagementBox(id, title);
            });

            $("#visualisationList").delegate('tr', 'click', function(clicked) {
                var id = $("#" + clicked.currentTarget.getAttribute("id")).attr("id").substr(8);
                getQuestions2(id);
                go("Visualisation", "visualisationPanel");
            });

            $("#back1").click(function() {
                go("surveySelectionPanel", "loginPanel");
            });

            $("#back2").click(function() {
                loadSurveyList("surveyList");
                go("surveyPanel", "surveySelectionPanel");
            });

            $("#back3").click(function() {
                go("surveyCreator", "adminPanel");
            });

            $("#back4").click(function() {
                go("adminPanel", "loginPanel");
            });

            $("#back5").click(function() {
                go("Users", "adminPanel");
            });

            $("#back6").click(function() {
                go("surveyManagementPanel", "adminPanel");
            });

            $("#back7").click(function() {
                go("Visualisation", "adminPanel");
            });

            $("#back8").click(function() {
                loadSurveyList("visualisationList");
                go("visualisationPanel", "Visualisation");
            });

            $("#toSurveyCreator").click(function() {
                go("adminPanel", "surveyCreator", function() {
                    return newQuestion("newQuestion", 1);
                });
            });

            $("#toSurveyManagement").click(function() {
                loadSurveyList("managementList");
                go("adminPanel", "surveyManagementPanel");
            });

            $("#toVisualisation").click(function() {
                loadSurveyList("visualisationList");
                go("adminPanel", "Visualisation");
            });

            $("#createSurvey").click(function() {
                addSurveyToDB();
            });

            $("#sendResult").click(function() {
                getResault();
            });


            $("#toUsers").click(function() {
                go("adminPanel", "Users");

                $(".usun").hide();
                $(".dodaj").hide();

                $(document).on('click', '#Dodawanie', function() {
                    $(".usun").hide();
                    $(".dodaj").show();
                });

                $(document).on('click', '#Usuwanie', function() {
                    $(".usun").show();
                    $(".dodaj").hide();
                    loadUsers();
                });
            });


            $(document).on('click', "div[id^='q'] div[class='btn-group'] ul[class='dropdown-menu'] > li", function(clicked) {
                var liClass = clicked.currentTarget.getAttribute('class');
                var n = this.textContent;
                var questionID = (this).parentElement.parentElement.parentElement.getAttribute("id")
                var length = questionID.length;

                if (length == 2) setAmountOfAnswers(questionID.substr(questionID.length - 1), n);
                if (length == 3) setAmountOfAnswers(questionID.substr(questionID.length - 2), n);
            });

            $(document).on('click', '#plus', function() {
                var n = document.getElementById("newQuestions").rows.length;
                newQuestion("newQuestion", n);
            });

            $("#newQuestions").delegate("tr", "click", function(clicked) {

                var id = clicked.currentTarget.getAttribute("id");
                if (id != "plus") {
                    var length = id.length;
                    if (length == 3) showQuestion(id.substr(id.length - 1), document.getElementById("newQuestions").rows.length);
                    if (length == 4) showQuestion(id.substr(id.length - 2), document.getElementById("newQuestions").rows.length);


                }
            });

            $(document).on("click", "div[id^='q'] h3 button[class*='delete']", function(clicked) {

                var parentID = (clicked.currentTarget).parentElement.parentElement.getAttribute("id");
                var length = parentID.length;
                var n = document.getElementById("newQuestions").rows.length;

                if (length == 2) removeQuestion(parentID.substr(parentID.length - 1), n);
                if (length == 3) removeQuestion(parentID.substr(parentID.length - 2), n);
            });

            $("#spQuestionsList").delegate("tr", "click", function(clicked) {
                var id = clicked.currentTarget.getAttribute("id");
                var length = id.length;

                if (length == 5) showQuestion(id.substr(id.length - 1), document.getElementById("spQuestionsList").rows.length);
                if (length == 6) showQuestion(id.substr(id.length - 2), document.getElementById("spQuestionsList").rows.length);
            });


            $("#QList").delegate("tr", "click", function(clicked) {
                var id = clicked.currentTarget.getAttribute("id");
                var length = id.length;

                if (length == 5) showQuestion(id.substr(id.length - 1), document.getElementById("QList").rows.length);
                if (length == 6) showQuestion(id.substr(id.length - 2), document.getElementById("QList").rows.length);
            });
            
            $('button[class~="search"]').click(function() {
                searchUsers();
            });

            $('#inputSearch').keyup(function(e) {
                if (e.keyCode == 13) {
                    searchUsers();
                }
            });

            $("#users-table").delegate('tr', 'click', function(clicked) {
                var userID = clicked.currentTarget.getAttribute("id");
                userInfo(userID);

            });

            $('#delete').click(function() {
                if (!($('#userLogin').is(':empty'))) {
                    var a = document.getElementById("userLogin");
                    var Uname = userLogin.getAttribute("tag");
                    $('#userLogin').empty();
                    $('#userPass').empty();
                    deleteUser(Uname);
                }
            });

            $('#add').click(function() {
                if ((!(document.getElementById("loginAdd").value == '')) && (!(document.getElementById("passAdd").value == ''))) {
                    var a = document.getElementById("loginAdd").value;
                    var b = document.getElementById("passAdd").value;
                    addUser(a, b);
                    document.getElementById("loginAdd").value = "";
                    document.getElementById("passAdd").value = "";
                }
            });

        </script>



    </div>
</body>
</html>