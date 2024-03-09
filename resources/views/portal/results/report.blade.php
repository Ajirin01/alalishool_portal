<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        table tr td{
            border: 2px black solid;
            border-collapse: collapse
        }

        table tr th{
            border: 2px black solid;
            border-collapse: collapse
        }

        table{
            border: 2px black solid;
            border-collapse: collapse;
            width: 400px;
            text-align: center
        }

        .report-header{
            width: 100%
        }

        .report-header-title{
            width: auto;
            margin: 0 auto;
            text-align: center
        }

        .student-name{
            color: blue;
        }

        img{
            width: 100%;
            height: 100%;
            z-index: -1000;
            position: absolute;
            top: 0;
            left: 0;
            opacity: .2;
        }

        body{
            /* font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif */
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
        }

        
    </style>
</head>
<body>
    <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
    <div class="report-header">
        <div class="report-header-title">
            <h2>Al-Ali Computer Based Tests Report</h2>
            <h4>Student's name: <span class="student-name"> {{$student->name}} </span></h4>
        </div>

    </div>
    <br>



    <input type="hidden" name="" value="{{ $results }}" id="results">

    <script src="{{ asset( 'adminlte/query-object.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset( 'adminlte/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            var results = JSON.parse(document.getElementById('results').value)
            const arrayQuery = new ArrayQuery(results)

            var colpan_array = []

            // form years array without duplicates STARTS
            var yearsArray = []

            results.forEach(result => {
                let arrayQry = new ArrayQuery(Object.values(yearsArray))
                let yearNotExists = arrayQry.selectWhere({year_id: result.year_id, year: result.year.year}).length == 0
                
                // form subjects array for a current year index with duplicates STARTS
                var yearSubjectsArray = []
                result.year.results.forEach(res => {
                    // console.log("result from for each", res)
                    let arrayQry = new ArrayQuery(Object.values(yearSubjectsArray))
                    let subjectNotExists = arrayQry.selectWhere({subject_id: res.subject_id}).length == 0

                    if(subjectNotExists){
                        yearSubjectsArray.push({
                            subject_id: res.subject_id
                        })
                    }
                });
                // form subjects array for a current year index with duplicates ENDS


                // console.log(yearNotExists)
                if(yearNotExists){
                    yearsArray.push({
                        year_id: result.year_id,
                        year: result.year.year,
                        subject: yearSubjectsArray,
                        classes: result.classes.name
                    })
                }
            });

            // console.log("year array", yearsArray)
            // form years array without duplicates STARTS


            // form subjects array without duplicates STARTS
            var subjectsArray = []
            
            results.forEach(result => {
                // console.log("result from for each", result)
                let arrayQry = new ArrayQuery(Object.values(subjectsArray))
                let subjectNotExists = arrayQry.selectWhere({subject_id: result.subject_id, subject: result.subject.name}).length == 0

                if(subjectNotExists){
                    subjectsArray.push({
                        subject_id: result.subject_id,
                        subject: result.subject.name
                    })
                }
            });
            // console.log("subject array", subjectsArray)

            // form subjects array without duplicates ENDS


            // form exam array without duplicates STARTS
            var examsArray = []
            
            
            results.forEach(result => {
                // console.log("result from for each", result)
                let arrayQry = new ArrayQuery(Object.values(examsArray))
                let examNotExists = arrayQry.selectWhere({exam_id: result.exam.id, exam: result.exam.title}).length == 0

                if(examNotExists){
                    examsArray.push({
                        exam_id: result.exam.id,
                        exam: result.exam.title,
                        term: result.term.id,
                        year: result.year.year
                    })
                }
            });
            // form exam array without duplicates ENDS

            // console.log("exam array", examsArray)


            // function table(year_id, year_name){
            //     let table = "<table id='result"+year_id+"'>"
            //         table +=    "<tr>"
            //         table +=         "<td colspan='4'>Year => "+year_name+"</td>"
            //         table +=     "</tr>"

            //         table +=     "<tr>"
            //         table +=         "<td></td>"
            //         table +=         "<td>First Term</td>"
            //         table +=         "<td>Second Term</td>"
            //         table +=         "<td>Third Term</td>"
            //         table +=     "</tr>"

            //         table +=     "<tr>"
            //         table +=         "<td>Subjects</td>"
            //         table +=         "<td colspan='3'>Score</td>"
            //         table +=     "</tr>"

            //         // subject score row comes here

            //         table += "</table><br>"

            //     return table
            // }

            function table2(year_id, year_name, classes){
                let table = "<table id='result"+year_id+"' style='width: 90%; margin: 0 auto;'>"
                    table +=  "<tr>"
                    table +=      "<td colspan='200'><b>Year</b> => <span class='student-name'>"+year_name+"</span> <b>Class</b> => <span class='student-name'>"+classes+"</span></td>"
                    table +=  "</tr>"

                    table +=  "<tr>"
                    table +=      "<td></td>"
                    table +=      "<td id='term1'>First Term</td>"
                    table +=      "<td id='term2'>Second Term</td>"
                    table +=      "<td id='term3'>Third Term</td>"
                    table +=  "</tr>"

                    // table +=  "<tr id=exam-subject-row'"+year_id+"'>"
                    // table +=      "<td>Subjects</td>"
                    // table +=      "<td id=1term-exam-col'"+year_id+"'>"
                    // table +=          "<td>C.A 1</td>"
                    // table +=          "<td>C.A 2</td>"
                    // table +=          "<td>Exam</td>"
                    // table +=      "</td>"
                    // table +=      "<td id=2term-exam-col'"+year_id+"'>"
                    // table +=          "<td>C.A 1</td>"
                    // table +=          "<td>C.A 2</td>"
                    // table +=          "<td>Exam</td>"
                    // table +=      "</td>"
                    // table +=      "<td id=3term-exam-col'"+year_id+"'>"
                    // table +=          "<td>C.A 1</td>"
                    // table +=          "<td>C.A 2</td>"
                    // table +=          "<td>Exam</td>"
                    // table +=      "</td>"
                    // table +=  "</tr>"

                    /* Commented table elements as to be replaced programatically by the next line
                    that contains a function which takes care of the element formation*/

                    table += examSubjectRow(year_id)

                    // table +=  "<tr id=subject-score-row'"+year_id+"'>"
                    // table +=      "<td>English</td>"
                    // table +=        "<td id=1term-1subject-col'"+year_id+"'>"
                    // table +=             "<td>-</td>"
                    // table +=             "<td></td>"
                    // table +=             "<td>1/5</td>"
                    // table +=        "</td>"

                    // table +=        "<td id=2term-1subject-col'"+year_id+"'>"
                    // table +=             "<td>-</td>"
                    // table +=             "<td>3/10</td>"
                    // table +=             "<td></td>"
                    // table +=        "</td>"

                    // table +=        "<td id=3term-1subject-col'"+year_id+"'>"
                    // table +=             "<td>-</td>"
                    // table +=             "<td>7/10</td>"
                    // table +=             "<td>23/40</td>"
                    // table +=         "</td>"
                    // table +=  "</tr>"

                    // table += subjectScoreRow(year_id)

                    /* Commented table elements to be replaced programatically by the subjectScoreRow(year_id)
                    that contains a function which takes care of the element formation*/

                    table += "</table><br><br>"

                return table
            }

            function examSubjectRow(year_id){
                let table = ""
                    table +=  "<tr id='exam-subject-row"+year_id+"'>"
                    table +=      "<td>Subjects</td>"
                    // table +=      "<td id='1term-exam-col"+year_id+"'>"
                    // table +=          "<td id='1term-exam-1col-1year'>C.A 1</td>"
                    // table +=          "<td id='1term-exam-2col-1year'>C.A 2</td>"
                    // table +=          "<td id='1term-exam-3col-1year'>Exam</td>"
                    // table +=      "</td>"
                    // table +=      "<td id='2term-exam-col"+year_id+"'>"
                    // table +=          "<td id='2term-exam-1col-1year'>C.A 1</td>"
                    // table +=          "<td id='2term-exam-2col-1year'>C.A 2</td>"
                    // table +=          "<td id='2term-exam-3col-1year'>Exam</td>"
                    // table +=      "</td>"
                    // table +=      "<td id='3term-exam-col"+year_id+"'>"
                    // table +=          "<td id='3term-exam-1col-1year'>C.A 1</td>"
                    // table +=          "<td id='3term-exam-2col-1year'>C.A 2</td>"
                    // table +=          "<td id='3term-exam-3col-1year'>Exam</td>"
                    // table +=      "</td>"

                    /* Commented table elements to be replaced programatically*/
                    table +=  "</tr>"

                return table
            }

            function subjectScoreRow(year_id, subject, subject_id){
                let table = ""
                    table +=  "<tr id='"+subject_id+"subject-score-row"+year_id+"'>"
                    table +=      "<td>"+subject+"</td>"
                    // table +=        "<td id='1term-1subject-col"+year_id+"'>"
                    // table +=             "<td>-</td>"
                    // table +=             "<td></td>"
                    // table +=             "<td>1/5</td>"
                    // table +=        "</td>"

                    // table +=        "<td id='2term-1subject-col"+year_id+"'>"
                    // table +=             "<td>-</td>"
                    // table +=             "<td>3/10</td>"
                    // table +=             "<td></td>"
                    // table +=        "</td>"

                    // table +=        "<td id='3term-1subject-col"+year_id+"'>"
                    // table +=             "<td>-</td>"
                    // table +=             "<td>7/10</td>"
                    // table +=             "<td>23/40</td>"
                    // table +=         "</td>"

                    /* Commented table elements to be replaced programatically*/
                    table +=  "</tr>"   

                return table
            }

            // test select from results using given conditions
            // console.log("result RowCol", arrayQuery.selectWhere({
            //     subject_id: 8,
            //     term_id: 2,
            //     year_id: 1
            // })[0])

            // loop through years to print yearly results
            yearsArray.forEach(year => {
                // console.log("year", year)
                // programatically add table2 to BODY STARTS 
                $("body").append(table2(year.year_id, year.year, year.classes))
                // programatically add table2 to BODY ENDS 

                    // programatically ADD  subjectScoreRow to table2 STARTS
                    subjectsArray.forEach(subject => {
                        year.subject.forEach(yrSub => {
                            // console.log(subject.subject_id)
                            if(subject.subject_id == yrSub.subject_id){
                                $("#result"+year.year_id).append(subjectScoreRow(year.year_id, subject.subject, subject.subject_id))
                            }
                        });
                        
                    })
                    // programatically ADD  subjectScoreRow to table2  ENDS
                    
                    var colspan = 0
                    for (let term = 1; term <= 3; term++) {
                        // programatically replace commented element of examScoreRow function STARTS
                        let td1 = ""
                            // td1 += "<td id='"+term+"term-exam-col"+year.year_id+"'>"

                                for (let i = 1; i <= examsArray.length; i++) {
                                    td1 += "<td id='"+term+"term-exam-"+i+"col-"+year.year_id+"year'></td>"

                                    colspan++ 
                                }

                            // td1 += "</td>"
                            
                            $("#term"+term).attr('colspan', colspan)

                            console.log(colspan)
                            
                        $("#exam-subject-row"+year.year_id).append(td1)
                        // programatically replace commented element ofexamScoreRow function ENDS

                        // programatically replace commented element of subjectScoreRow function STARTS
                        subjectsArray.forEach(subject => {
                            year.subject.forEach(yrSub => {
                                // console.log(subject.subject_id)
                                if(subject.subject_id == yrSub.subject_id){
                                    let td2 = ""

                                    // td2 += "<td id='"+term+"subject-col"+year.year_id+"'>"
                                        
                                    for (let i = 1; i <= examsArray.length; i++) {
                                        td2 += "<td id='"+term+"term-"+subject.subject_id+"subject-"+i+"col-"+year.year_id+"year'></td>"
                                    }
                                    // td2 += "</td>"

                                    $("#"+subject.subject_id+"subject-score-row"+year.year_id).append(td2)
                                }
                            });
                            
                        })
                        // programatically replace commented element of subjectScoreRow function ENDS

                        examsArray.forEach((exam, col) => {
                            // console.log("subject_id: ", subject.subject_id)
                            // console.log("term_id: ", term)
                            // console.log("year_id: ", year.year_id)
                            // console.log("exam_id: ", exam.exam_id)
                            // console.log("")

                            // setting values for column headers (Exam headers) STARTS
                            if(term == exam.term && year.year == exam.year){
                                document.getElementById(term+"term-exam-"+Number(col+1)+"col-"+year.year_id+"year").innerText = exam.exam
                            }
                            // setting values for column headers (Exam headers) ENDS

                            // setting values for cells(exam paper / subject scores) STARTS
                            var arrayQry = new ArrayQuery(results)

                            subjectsArray.forEach(subject => {
                                year.subject.forEach(yrSub => {
                                    if(subject.subject_id == yrSub.subject_id){
                                        let result = arrayQry.selectWhere({
                                            subject_id: subject.subject_id,
                                            term_id: term,
                                            year_id: year.year_id,
                                            exam_id: exam.exam_id 
                                        })[0]

                                        // console.log(result)
                                        
                                        if(result != null){
                                            // console.log(term+"term-"+subject.subject_id+"subject-"+Number(col+1)+"col-"+year.year_id+"year")
                                            document.getElementById(term+"term-"+subject.subject_id+"subject-"+Number(col+1)+"col-"+year.year_id+"year").innerText = result.score + "/" + result.over
                                        }else{
                                            document.getElementById(term+"term-"+subject.subject_id+"subject-"+Number(col+1)+"col-"+year.year_id+"year").innerText = "-"
                                        }
                                    }
                                });
                                
                            })
                            // setting values for cells(exam paper / subject scores) ENDS
                            
                        });

                        colspan=0
                    }

                    // document.getElementById("term"+term).setAttribute('colspan',colspan)
                    
                    // console.log($("#1term-exam-col1"+year.year_id))
                    
                // });
            });
        })
    </script>
</body>
</html>