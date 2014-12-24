<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Canvas Line">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Komgraf</title>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            #main{
                margin: 20px;
                font-family: "segoe ui";
                width: auto;

            }
            #menu-left
            {
                width: 400px;
                height: 610px;
                overflow: scroll;
            }
            #kanvas{
                /*border: 1px solid black;*/
                float: right;
                margin-right: 20px;
            }
            #canvas
            {
                width: 610px;
                height: 610px;
                float: right;
            }
            #wrapper{
                margin-left: 5px;
                width: auto;
            }
            td{
                padding: 10px 10px;
                /*text-align: center;*/
            }
            input[type="number"]{
                /*float: left;*/
                width: 110px;
                height: 50px;
                text-align: center;	
                font-size: 30px;
            }
            button{
                width: 150px;
            }
            footer{
                width: 1200px;
            }
        </style>
    </head>
    <body>
        <div  id="menu">
            <?php
            include './menu.php';
            ?>
        </div>
        <div id="main">
            <div id="wrapper">
                <div id="canvas"><canvas id="kanvas" width="600" height="1000" style="margin-top: 10px;"></canvas>
                </div>
                <div id="menu-left">
                    <div class="alert alert-warning" role="alert" style="float: left; text-align: center; width: 400px;  margin-top: 10px;">
                        <table>
                            <thead style="background-color: #6CE089">
                                <tr><td colspan="4" style="color: black; text-align: center;"><h3><strong>Creating Points</h3></strong></td></tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>X</td>
                                    <td><input class="form-control" type="number" id="pointX" min="-15" max="15" step="1" value="0"></td>
                                    <td>Y</td>
                                    <td><input class="form-control" type="number" id="pointY" min="-15" max="15" step="1" value="0"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <button id="run2" class="btn btn-primary btn-lg">Create Point</button>
                                    </td>
                                    <td colspan="2" style="text-align: center;">
                                        <button id="del" class="btn-danger btn-lg">Clear</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-warning" role="alert" style="float: left; text-align: center; width: 400px; margin-top: 10px;">
                        <table>
                            <thead style="background-color: #6CE089">
                                <tr><td colspan="4" style="color: black; text-align: center;"><h3><strong>Creating Lines</h3></strong></td></tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>X1</td>
                                    <td><input class="form-control" type="number" id="fromX" min="-15" max="15" step="1" value="0"></td>
                                    <td>Y1</td>
                                    <td><input class="form-control" type="number" id="fromY" min="-15" max="15" step="1" value="0"></td>
                                </tr>
                                <tr>
                                    <td>X2</td>
                                    <td><input class="form-control" type="number" id="toX" min="-15" max="15" step="1" value="0"></td>
                                    <td>Y2</td>
                                    <td><input class="form-control" type="number" id="toY" min="-15" max="15" step="1" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Panjang Line</td>
                                    <td ><input class="form-control" type="text" min="15" max="15" id="length" ></td>
                                </tr>
                                <tr>
                                    <td>Dot Product</td>
                                    <td ><input class="form-control" type="text" min="15" max="15" id="dot" ></td>
                                </tr>
                                <tr>
                                    <td  colspan="2" style="text-align: center;">
                                        <button id="run" class="btn btn-primary btn-lg">Create Line</button>
                                    </td>
                                    <td colspan="2" style="text-align: center;">
                                        <button id="adt" class="btn btn-primary btn-lg">Addition</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <button id="sub" class="btn btn-info btn-lg">Substraction</button>
                                    </td>
                                    <td  colspan="2" style="text-align: center;">
                                        <button id="del" class="btn-danger btn-lg" type="button" name="clear" value="Clear Form">Clear All</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var kanvas = document.getElementById('kanvas');
            var c = kanvas.getContext("2d");

            // c.fillStyle = "blue";
            // c.fillRect(0,0,40,40);
            for (i = 0; i <= 30; i++) {   //pengulangan untuk membuat sumbu y
                i = i * 20;

                c.beginPath();
                c.moveTo(i, 0);
                c.lineTo(i, 600);
                c.stroke();

                i = i / 20;
                if (i === 14) {
                    c.strokeStyle = "black";
                } else {
                    c.strokeStyle = "#cbd0d3";
                }
            }

            for (i = 0; i <= 30; i++) {   //pengulangan untuk membuat sumbu x

                i = i * 20;

                c.beginPath();
                c.moveTo(0, i);
                c.lineTo(600, i);
                c.stroke();

                i = i / 20;
                if (i === 14) {
                    c.strokeStyle = "black";
                } else {
                    c.strokeStyle = "#cbd0d3";
                }
            }

            // arrrow
            c.fillStyle = "black"; //membuat panah kecil di sumbu x kiri
            c.beginPath();
            c.moveTo(0, 300); //awal
            c.lineTo(10, 305); //kedua
            c.lineTo(10, 295); //ketiga
            c.fill();
            c.closePath();

            c.beginPath(); //membuat panah kecil di sumbu y atas
            c.moveTo(300, 0); //awal
            c.lineTo(305, 10); //kedua
            c.lineTo(295, 10); //ketiga
            c.fill()
            c.closePath();

            c.beginPath(); //membuat panah kecil di sumbu y bawah
            c.moveTo(600, 300); //awal
            c.lineTo(590, 295); //kedua
            c.lineTo(590, 305); //ketiga
            c.fill();
            c.closePath();

            c.beginPath();  //membuat panah kecil di sumbu x kiri
            c.moveTo(300, 600); //awal
            c.lineTo(305, 590); //kedua
            c.lineTo(295, 590); //ketiga
            c.fill()
            c.closePath();

            c.font = "20px segoe-ui";
            c.fontStyle = "bold";
            c.fillStyle = "red";
            c.fillText("x", 587, 295);  //membuat tulisan x pada sumbu x
            c.fillText("y", 305, 15);  //membuat tulisan y pada sumbu y

            for (var j = -7; j <= 7; j++) { //buat angka pada sumbu x
                var i = j * 40;
                var t = j * 2;

                c.font = "10px segoe-ui";
                c.fillText(t, 300 + i - 5, 310); //parameter (isi text,posisi x, posisi y)
            }

            for (var j = -7; j <= -1; j++) { //buat angka pada sumbu y tapi cuma dari (0,14) sampe (0,2) biar ga duplikat (0,0)
                var i = j * 40;
                var t = j * 2;

                c.font = "10px segoe-ui";
                c.fillText(t * -1, 288, 300 + i);
            }

            for (var j = 1; j <= 7; j++) { //buat angka pada sumbu y tapi cuma dari (0,-2) sampe (0,-14) biar ga duplikat (0,0)
                var i = j * 40;
                var t = j * 2;

                c.font = "10px segoe-ui";
                c.fillText(t * -1, 288, 300 + i);
            }

            $("#run").click(createLine);
            $("#run").click(getLength);
            $("#run").click(dotproduct);
//            $("#run").click(getAngle);
            $("#run2").click(createPoint);
            $("#adt").click(addition);
            $("#sub").click(substraction);
            $("#del").click(function() {
                //$("input").val('0');
                location.reload();
            });

            $('document').ready(function() {

            });

            var color = new Array(
                    "#832C65",
                    "#1f2838",
                    "#6b3f3f",
                    "#0F9096",
                    "#C01283",
                    "#F92817"
                    );

            var colorStatus = 0;

            function createLine() {
                var fromX = parseFloat($("#fromX").val());
                var fromY = parseFloat($("#fromY").val());
                var toX = parseFloat($("#toX").val());
                var toY = parseFloat($("#toY").val());
                var margin = 300; //default punya kita titik (0,0) itu marginnya 300
                var lineangle = Math.atan2(toY - fromY, toX - fromX);
                var kanvas = document.getElementById('kanvas');
                var c = kanvas.getContext("2d");

                x1 = (fromX * 20) + margin; 
                y1 = (fromY * 20) + margin - (40 * fromY);
                x2 = (toX * 20) + margin;
                y2 = (toY * 20) + margin - (40 * toY);

                var text1 = "P(" + fromX + "," + fromY + ")";
                var text2 = "Q(" + toX + "," + toY + ")";


                c.beginPath();
                c.strokeStyle = color[colorStatus];
                //				c.lineCap ="round";
                c.moveTo(x1, y1);
                c.lineTo(x2, y2);
                c.lineWidth = 2;
                c.stroke();

                c.font = "15px sans-serif";
                c.fillText(text1, x1, y1 - 8);
                c.fillText(text2, x2, y2 + 8);

                if (x1 == x2) { //x1 sebanding dengan x2, y1 berbanding terbalik dengan y2
                    if (y2 > y1) {
                        c.beginPath();
                        c.moveTo(x2, y2);
                        c.lineTo(x2 - 3, y2 - 5);
                        c.lineTo(x2 + 3, y2 - 5);
                        c.fill();
                        c.closePath();
                    } else if (y2 < y1) {
                        c.beginPath();
                        c.moveTo(x2, y2);
                        c.lineTo(x2 - 3, y2 + 5);
                        c.lineTo(x2 + 3, y2 + 5);
                        c.fill();
                        c.closePath();
                    }
                }

                if (y1 == y2) {
                    if (x2 > x1) {
                        c.beginPath(); //membuat panah kecil di sumbu y bawah
                        c.moveTo(x2, y2); //awal
                        c.lineTo(x2 - 5, y2 - 3); //kedua
                        c.lineTo(x2 - 5, y2 + 3); //ketiga
                        c.fill();
                        c.closePath();
                    } else if (x2 < x1) {
                        c.beginPath(); //membuat panah kecil di sumbu y bawah
                        c.moveTo(x2, y2); //awal
                        c.lineTo(x2 + 5, y2 - 3); //kedua
                        c.lineTo(x2 + 5, y2 + 3); //ketiga
                        c.fill();
                        c.closePath();
                    }
                }

                if (x1 > x2) {
                    if (y2 > y1) {
                        if (lineangle > -2.8 && lineangle < -2) {
                            c.beginPath(); //membuat panah kecil di sumbu y bawah
                            c.moveTo(x2, y2); //awal
                            c.lineTo(x2, y2 - 4); //kedua
                            c.lineTo(x2 + 4, y2); //ketiga
                            c.fill();
                            c.closePath();
                        } else if (lineangle < -2.8) {
                            c.beginPath(); //membuat panah kecil di sumbu y bawah
                            c.moveTo(x2, y2); //awal
                            c.lineTo(x2 + 3, y2 - 4); //kedua
                            c.lineTo(x2 + 4, y2 + 3); //ketiga
                            c.fill();
                            c.closePath();
                        } else if (lineangle > -2) {
                            c.beginPath(); //membuat panah kecil di sumbu y bawah
                            c.moveTo(x2, y2); //awal
                            c.lineTo(x2 - 3, y2 - 4); //kedua
                            c.lineTo(x2 + 4, y2 - 3); //ketiga
                            c.fill();
                            c.closePath();
                        }
                    } else if (y2 < y1) {
                        if (lineangle < 2.8 && lineangle > 2) {
                            c.beginPath(); //membuat panah kecil di sumbu y bawah
                            c.moveTo(x2, y2); //awal
                            c.lineTo(x2, y2 + 4); //kedua
                            c.lineTo(x2 + 4, y2); //ketiga
                            c.fill();
                            c.closePath();
                        } else if (lineangle > 2.8) {
                            c.beginPath(); //membuat panah kecil di sumbu y bawah
                            c.moveTo(x2, y2); //awal
                            c.lineTo(x2 + 4, y2 - 2); //kedua
                            c.lineTo(x2 + 4, y2 + 3); //ketiga
                            c.fill();
                            c.closePath();
                        } else if (lineangle < 2) {
                            c.beginPath(); //membuat panah kecil di sumbu y bawah
                            c.moveTo(x2, y2); //awal
                            c.lineTo(x2 - 3, y2 + 4); //kedua
                            c.lineTo(x2 + 4, y2 + 3); //ketiga
                            c.fill();
                            c.closePath();
                        }
                    }
                } else if (x1 < x2) {
                    if (y2 > y1) {
                        c.beginPath(); //membuat panah kecil di sumbu y bawah
                        c.moveTo(x2, y2); //awal
                        c.lineTo(x2, y2 - 4); //kedua
                        c.lineTo(x2 + 4, y2); //ketiga
                        c.fill();
                        c.closePath();
                    }

                    else if (y2 < y1) {
                        if (lineangle > 0.2 && lineangle < 1) {
                            c.beginPath(); //membuat panah kecil di sumbu y bawah
                            c.moveTo(x2, y2); //awal
                            c.lineTo(x2, y2 + 4); //kedua
                            c.lineTo(x2 - 4, y2); //ketiga
                            c.fill();
                            c.closePath();
                        } else if (lineangle < 0.2) {
                            c.beginPath(); //membuat panah kecil di sumbu y bawah
                            c.moveTo(x2, y2); //awal
                            c.lineTo(x2 - 3, y2 - 3); //kedua
                            c.lineTo(x2 - 2, y2 + 3); //ketiga
                            c.fill();
                            c.closePath();
                        } else if (lineangle > 1) {
                            c.beginPath(); //membuat panah kecil di sumbu y bawah
                            c.moveTo(x2, y2); //awal
                            c.lineTo(x2 + 2, y2 + 4); //kedua
                            c.lineTo(x2 - 4, y2 + 3); //ketiga
                            c.fill();
                            c.closePath();
                        }
                    }
                }
                c.strokeStyle = "color[colorStatus]";
                c.stroke();

                colorStatus++;
                if (colorStatus == color.length)
                    colorStatus = 0;
            }

            function createPoint() {
                var X = parseFloat($("#pointX").val());
                var Y = parseFloat($("#pointY").val());
                var margin = 300; //default punya kita titik (0,0) itu marginnya 300

                var kanvas = document.getElementById('kanvas');
                var c = kanvas.getContext("2d");

                xp = (X * 20) + margin; //skalanya 1:20, diatur supaya (20,20) menjadi (1,1)
                yp = (Y * 20) + margin - (40 * Y);

                var text1 = "(" + X + "," + Y + ")";
                c.font = "15px sans-serif";
                c.fillText(text1, xp, yp - 5);

                c.beginPath();
                c.arc(xp, yp, 4, 0, 2 * Math.PI);

                c.fill();
                colorStatus++;
                if (colorStatus == color.length)
                    colorStatus = 0;
            }

            function addition() {
                var fromX = parseFloat($("#fromX").val());
                var fromY = parseFloat($("#fromY").val());
                var toX = parseFloat($("#toX").val());
                var toY = parseFloat($("#toY").val());
                var margin = 300; //default punya kita titik (0,0) itu marginnya 300

                var kanvas = document.getElementById('kanvas');
                var c = kanvas.getContext("2d");

                // console.log(x1+" "+x2+" "+y1 +" "+ y2);
                var xn = fromX + toX;
                var yn = fromY + toY;
                x3 = (xn * 20) + margin;
                y3 = (yn * 20) + margin - (40 * yn);

                var text3 = "C(" + xn + "," + yn + ")";

                c.beginPath();
                c.strokeStyle = color[colorStatus];
                //				c.lineCap ="round";
                c.moveTo(x1, y1);
                c.lineTo(x3, y3);
                c.lineWidth = 2;
                c.stroke();

                c.moveTo(x2, y2);
                c.lineTo(x3, y3);
                c.lineWidth = 2;
                c.stroke();

                c.font = "15px sans-serif";
                c.fillText(text3, x3, y3 - 8);


                c.strokeStyle = "color[colorStatus]";
                c.stroke();


                colorStatus++;
                if (colorStatus == color.length)
                    colorStatus = 0;
            }
            function substraction() {
                var fromX = parseFloat($("#fromX").val());
                var fromY = parseFloat($("#fromY").val());
                var toX = parseFloat($("#toX").val());
                var toY = parseFloat($("#toY").val());
                var margin = 300; //default punya kita titik (0,0) itu marginnya 300

                var kanvas = document.getElementById('kanvas');
                var c = kanvas.getContext("2d");

                // console.log(x1+" "+x2+" "+y1 +" "+ y2);
                var xn = toX - fromX;
                var yn = toY - fromY;
                x4 = (xn * 20) + margin;
                y4 = (yn * 20) + margin - (40 * yn);

                var text4 = "C(" + xn + "," + yn + ")";

                c.beginPath();
                c.strokeStyle = color[colorStatus];
                //				c.lineCap ="round";
                c.moveTo(x1, y1);
                c.lineTo(x4, y4);
                c.lineWidth = 2;
                c.stroke();

                c.moveTo(x2, y2);
                c.lineTo(x4, y4);
                c.lineWidth = 2;
                c.stroke();

                c.font = "15px sans-serif";
                c.fillText(text4, x4, y4 - 8);


                c.strokeStyle = "color[colorStatus]";
                c.stroke();


                colorStatus++;
                if (colorStatus == color.length)
                    colorStatus = 0;
            }

            function getLength() {
                var x1 = document.getElementById("fromX").value;
                var y1 = document.getElementById("fromY").value;
                var x2 = document.getElementById("toX").value;
                var y2 = document.getElementById("toY").value;

                var hitung = Math.sqrt((x2 - x1) * (x2 - x1) + (y2 - y1) * (y2 - y1));
                document.getElementById("length").value = hitung;

            }

            function dotproduct() {
                var x1 = document.getElementById("fromX").value;
                var y1 = document.getElementById("fromY").value;
                var x2 = document.getElementById("toX").value;
                var y2 = document.getElementById("toY").value;

                var hitung = (x1 * x2) + (y1 * y2);
                document.getElementById("dot").value = hitung;
            }
        </script>
    </body>
</html>
