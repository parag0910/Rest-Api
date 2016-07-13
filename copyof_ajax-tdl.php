<html>
<head>

    <title>To-DoList</title>
    <style>
        .strike{
            text-decoration: line-through;
        }
        .btn{
            color: red;
        }
        h1{
            font-size: 300%;
        }
        .input-box{
            margin-left: 30%;
            /*padding:35px;*/
            height:5%;
            width:35%;
        }
        .btn{
            height:5%;
            width:10%;


        }


    </style>
    <script src="jquery-2.2.4.min.js" type="text/javascript"></script>
    <link href="bootstrap.css" type="text/css" >
    <link href="bootstrap.min.css" type="text/css" >
    <script src="bootstrap.js" type="text/javascript"></script>
    <script src="bootstrap.min.js" type="text/javascript"></script>

    <script>

        $(document).ready(function () {
            var i=0;
            $('.btn').click(function () {

                $.ajax({
                    url: "insert_db.php",
                    type: "POST",
                    data: {
                        "task": $('.input-box').val()
                    },
                    success: function (data) {
                        var toAdd = $('input[name=message]').val();
                        if (toAdd != "") {
                            $("#messages").append("<li> <input type='checkbox'  " +
                            " name='todo'" + "class='todoname'" + "value='" + toAdd + "'/>" + "  " +
                            toAdd + "     " +"<input type='button'  value='DELETE' id='" + toAdd + "' class='del-btn' />" + "</li>");
                            $(".input-box").val("");

                        }
                        else{
                            document.tdl.message.focus();
                            alert("please add something to new task");
                        }


                    },
                    error: function () {
                        alert("error");
                    }
                });
                return false;
            });

            $.ajax({
                url: "select.php",
                type: "GET",
                success: function (data) {

                    var val = eval(data);

                    $.each(val, function () {

                        $('#messages').append("<li> <input type='checkbox'  " +
                        " name='todo'" + "class='todoname'" + "value='" + val[i] + "'/>" +
                        val[i] + "<input type='button'  value='DELETE' id='" + val[i] + "' class='del-btn' />" + "</li>");

                        i++;


                    });
                },
                error: function () {
                    alert("error can't fetched");
                }
            });

            $(document).on('click', '.del-btn', function () {

                var id=this.id;
                $('#'+id).parent().fadeOut('slow', function () {
                    $('#'+id).parent().remove();
                });


                $.ajax({

                    url: "delete.php",
                    type: "GET",
                    data: {
                        "task":id
                    },

                    success: function () {


                        alert("Task Deleted Successfully");
                    },
                    error: function () {
                        alert("error can't deleted");
                    }
                });
            });
            $(document).on('click','.todoname',function(){
                $(this).parent().toggleClass("strike");
            });
        });
    </script>
</head>
<body>
<center><h1><em>To-Do-List</em></h1 ></center>
<div class="container">
    <form name="tdl" method="POST" >
        <div class="form-group">
            <div class="row">
                <div class="col-xs-10">
                    <!--<div class="col-md-10">-->
                    <input type="text" name="message" class="input-box  form-control" placeholder="AddTask" >
                    <!--</div>-->


                    <input type="submit" class="btn btn btn-default form-control " value="AddToList"  />
                    <!--<input type="button" class="bton" value="Select"  />-->
                </div>
            </div>
        </div>
    </form>


</div>
<div>
    <ol id="messages">
    </ol>
</div>

</body>
</html>