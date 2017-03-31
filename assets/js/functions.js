function newQuestion(selector,n){
    if(n==1){$("#"+selector).empty();}
    $("#"+selector).append(
                "<div id='q"+n+"'><h3><strong>Pytanie "+n+"   </strong><button type='button' class='btn delete'><i class='fa fa-times' aria-hidden='true'></i>  Usuń</button></h3>"
                +"<input type='text' maxlength='255' placeholder='Wypisz treść pytania.'></input>"
                +"<div class='btn-group'>"
                +"<button type='button' class='btn answers'><i class='fa fa-gears' aria-hidden='true'></i><span>   Odpowiedzi</span>"
                +"</button>"
                +"<button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>"
                +"<span class='caret'></span></button><ul class='dropdown-menu' role='menu'>"
                +"<li>1</li>"
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
                                $(selector).css("display", "none")
                            }
                    }
                }
              
};

function removeQuestion(removed,n){
   
    if(n>2){  
        $("#q"+removed).remove();
        $("#ql"+removed).remove();

        for(i=parseInt(removed)+1 ; i<parseInt(n) ; i++){
            $("#ql"+i).attr('id','ql'+(i-1));
            $("#ql"+(i-1)+" td span i:nth-of-type(2) strong").text(i-1);

            $("#q"+i).attr('id','q'+(i-1));
            $("#q"+(i-1)+" h3 strong").text("Pytanie "+(i-1)+"   ");
        }

        if($("#q"+(removed)).length!=0){
            $("#q"+(removed)).css('display','block')
        }else{
            $("#q"+(removed-1)).css('display','block');
        }

    }
};

function showQuestion(n,nMax){
     for(i=1 ; i<parseInt(nMax) ; i++){
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
            $("div[id='q"+questionNumber+"'] div[class='answers']").append("<input type='text' maxlength='255' id='"+i+"' placeholder='Odpodziedź numer "+(i+1)+".'></input>")
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

