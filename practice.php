<html>
<head>

    <title>To-DoList</title>
    <style>
        .strike{
            text-decoration: line-through;
        }
    </style>
    <script src="jquery-2.2.4.min.js" type="text/javascript"></script>

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
            $('.bton').click(function () {
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
            });
            $(document).on('click', '.del-btn', function () {
                var id=this.id;

                $.ajax({

                    url: "delete.php",
                    type: "GET",
                    data: {
                        "task":id
                    },

                    success: function () {

                        $('#'+id).parent().fadeOut('slow', function () {
                            $('#'+id).parent().remove();
                        });

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
<div class="labels-2">
    <em>To-DoList</em>
</div>
<form name="tdl" method="POST"   >
    <table>
        <tr>

            <td>
                <div><input type="text" name="message" class="input-box" placeholder="AddTask" ></div>
            </td>
            <td>
                <input type="submit" class="btn" value="AddToList"  />
                <input type="button" class="bton" value="Select"  />
            </td>

        </tr>

    </table>
</form>

<div>
    <ol id="messages">
    </ol>
</div>

</body>
</html>