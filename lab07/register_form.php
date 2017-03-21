<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Form Validation</title>
    </head>
    <body>
        <h3> แบบฟอร์มลงทะเบียน </h3>
        <form action="dopost.php" method="post" class="a">
        ชื่อ-นามสกุล: <br/>
        <input type="text" class="text" name="name" id="name" /> <br/>
        อีเมล: <br/>
        <input type="email" class="text" name="email" id="email" /> <br/>
        เพศ: <br/>
        <input type="radio" class="radio" name="sex" id="sex" value="M" /> ชาย<br/>
        <input type="radio" class="radio" name="sex" id="sex" value="F" />หญิง <br/>
        <br/>
        ความสนใจ: <br/>
        <input type="checkbox" class="checkbox" name="intr1" id="intr1"  />เรียน <br/>
        <input type="checkbox" class="checkbox" name="intr2" id="intr2"  />เกมส์ <br/>
        <br/>
        ที่อยู่: <br/>
        <textarea class="text" name="address" id="address" rows="4" cols="50"></textarea>
        <br />
        จังหวัด: <br/>
        <select name="province" id="province">
            <option value="">---เลืกจังหวัด---</option>
            <option value="1">กรุงเทพมหานคร</option>
            <option value="2">ชลบุรี</option>
        </select><br/>
        <br><br>
        <input type="submit" id="submit" value="Submit" name="submit" />
        </form>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
            $('#submit').on('click' , function(even) {
                var valid = true,
                errorMessage = "";
                
                if($('#name').val() == '') {
                    errorMessage += "โปรดป้อนชื่อ-นามสกุล \n";
                    valid = false;
                }

                if($('#address').val()== '') {
                errorMessage += "โปรดป้อนที่อยู่\n";
                valid = false;
                }

                if($('#email').val() == '') {
                    errorMessage += "โปรดป้อน email\n";
                    valid = false;
                }

                if($('#province').val() == '') {
                    errorMessage += "โปรดป้อน จังหวัด\n";
                    valid = false;
                }

                if($( "input[type=checkbox][id=intr1]" ).prop( "checked" )==false && $( "input[type=checkbox][id=intr2]" ).prop( "checked" )==false  ) {
                    errorMessage += "โปรดป้อน ความสนใจ\n";
                    valid = false;
                }

                if($( "input[type=radio][value=M]" ).prop( "checked" )==false && $( "input[type=radio][value=F]" ).prop( "checked" )==false  ) {
                    errorMessage += "โปรดป้อน เพศ\n";
                    valid = false;
                }
                

                if(!valid && errorMessage.length > 0 ) {
                   alert(errorMessage);
                   event.preventDefault();
                }    
            });
            </script>
            </body>
            </html>


