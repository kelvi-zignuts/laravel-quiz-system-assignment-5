<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width :100%;
            border-collapse: collapse;
        }
        th,td{
            border:1px solid black;
            padding:8px;
            text-align:left;
        }
        th{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Exam Result</h1>
    <table>
        <tr>
            <th>Total Questions</th>
            <td>{{$totalQuestions}}</td>
        </tr>
        <tr>
            <th>Correct Answers</th>
            <td>{{$correctAnswers}}</td>
        </tr>
        <tr>
            <th>Incorrect Answer</th>
            <td>{{$totalQuestions - $correctAnswers}}</td>
        </tr>
        <tr>
            <th>Score</th>
            <td>{{$score}}%</td>
        </tr>
    </table>
</body>
</html>