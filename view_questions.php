<?php
include "includes/security.php";
include "includes/user_homepage_header.php";
include "includes/db_connection.php";

if ($_SESSION['permission'] == "restricted") {
    header('Location: login.php');
    exit;
}

?>

<div class="card text-center">
    <!-- <div class="card-header">

    </div> -->
    <div class="card-body">
        <div id="total_questions" style="float: right">0</div>
        <div style="float: right">/</div>
        <div id="current_question" style="float: right">0</div>
        <div class="card-body" id="load_questions"></div>
        <div class="container" style=" margin-top: 100px">
            <input type="button" class="btn btn-warning" value="Previous" onclick="loadPreviousQuestion();">&nbsp;
            <input type="button" class="btn btn-warning" value="Next" onclick="loadNextQuestion();">
            <div class="answer" style="margin-top: 10px">
                <input type="button" class="btn btn-info" value="Answer" onclick="">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function loadTotalQuestionNumber() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_questions").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "ajax/load_total_questions.php", true);
        xmlhttp.send(null);
    }

    var questionNumber = "1";
    loadQuestions(questionNumber);


    function loadQuestions(questionNumber) {
        document.getElementById("current_question").innerHTML = questionNumber;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "End of quiz") {
                    window.location = "result.php";
                } else {
                    document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                    loadTotalQuestionNumber();
                }
            }
        };
        xmlhttp.open("GET", "ajax/load_questions.php?questionNumber=" + questionNumber, true);
        xmlhttp.send(null);
    }


    function loadPreviousQuestion() {
        if (questionNumber == "1") {
            loadQuestions(questionNumber)
        } else {
            questionNumber = eval(questionNumber) - 1;
            loadQuestions(questionNumber);
        }
    }


    function loadNextQuestion() {
        questionNumber = eval(questionNumber) + 1;
        loadQuestions(questionNumber);
    }
</script>
</body>

</html>