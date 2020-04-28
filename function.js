$(document).ready(function(){
            $("#main").click(function(){
            $("#slider").css('left','-240px');
            $("#dot").css('left',"250px");
        });

            $("#dot").click(function(){
            $("#slider").css('left','0px');
            $("#dot").css('left','-40px');
        });

            $("#logout").click(function(){
              var uname=$("a[data-uname]").attr("data-uname");
             var t=confirm("are you Sure "+uname+" , you want to logout");
             if(t){
                         window.location.href="logout.php";
                         alert("you are logout");
             }
        });

            $("#ibook").submit(function(){
             if(confirm("are you sure ...you want to insert book data")){
                alert("Book inserted successfully..");
                return true;
              }
             else{
                alert("Book not inserted");
                location.reload(true);
                return false;
              }
        });

            $("#forgotpw").submit(function(){
             if($("#pw").val()!=$("#cpw").val()){
             alert("password miss match try again");
             return false;
             }
             else{
               var t=confirm("are you sure..you want to change password??");
               if(t){
                alert("password changed successfully");
                return true;
                }
               else{
                alert("password not changed");
                return false;
               }        
              }
        });

            $("#upbook").submit(function(){
             if(confirm("are you sure ...you want to update book data")){
                alert("Book updated successfully..");
                return true;
              }
             else{
                alert("Book not updated");
                window.location.href="viewbook.php?page=1"
                return false;
              }
        }); 

             $("#disp").submit(function(){
              if($("#pw").val()!=$("#cpw").val()){
              alert("password miss match try again");
              return false;
             }
              else{
              alert("your account successfully created...");
              return true;
            }
        }); 

            $("#delbook").click(function(){
             var items=new Array();
             $("input[type=checkbox]:checked").each(function(){
                items.push($(this).val());
              });
             if(items.length){ 
             if(confirm("are you sure ...you want to delete books...")){
                alert("Books deleted successfully..");
                return true;
              }
             else{
                alert("Books not deleted");
                window.location.href="viewbook.php?page=1"
                return false;
               }
             }
            else{
               alert("please select number of books you want to delete.");
               return false;
            }
        });

            $("a[data]").click(function(){
              var str=$(this).attr("data");
              t=confirm("are you sure  ...you want to issue this books");
             if(t){
                         window.location.href="issuebook.php?bid="+str;
                         alert("book issued successfully");
             }
             else
              alert("book not issued");
        });

            $("#retbook").submit(function(){
              t=confirm("are you sure  ...you want to return this books");
             if(t){
                         alert("book return successfully");
                         return true;
             }
             else{
              alert("book not return..");
              return false;
              }
        });

            $("#hide").click(function(){
              $("#login").hide();
              $("#account").show();
        });
              $("#show").click(function(){
                $("#login").show();
                $("#account").hide();
        });
        
});
