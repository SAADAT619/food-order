<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br> <br>
        <?php

            if(isset($_SESSION['add']))
           
           {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
           }

         ?>

        <br><br>


        <!---Add catergory from starts--->
     <form action=""method="post" >
        <table class="tb1-30">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text"name="title"placeholder="Category Title">
                </td>
            </tr>
            <tr>
                <td>featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes"> yes
                    <input type="radio" name="featured" value="No">No 
                </td>
            </tr>
            <tr>
               
                <td>Active:</td>
                <td>
                    <input type="radio"name="active"value="yes">Yes
                    <input type="radio"name="active"value="No">No
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit"name="submit"value="Add Category"class="btn-secondary">
                </td>
            </tr>
        </table>
       
    </form>
     <!---Add catergory from ends--->

    <?php
        // CHeck whether the Submit Button is clicked or Not
        if(isset($_POST['submit']))
        {
            //echo"clicked";
            
            //1.Get the Value from CAtegory Form
            $title=$_POST['title'];
            
            // For Radio input,we need to check whether the button is selected or not
            if(isset($_POST['featured']))
            {
                // Get the Value from form
                $featured=$_POST['featured'];
            }
            else
            {
                // Set the Default Value
                $featured="No";
            }

            if(isset($_POST['active']))
            {
                $active=$_POST['active'];
            }
   
            else
            {
                $active="NO";
            }


            //2.Create SQL Query to Insert Category into Database
            $sql="INSERT INTO tbl_category SET
                title='$title',
                featured='$featured',
                active='$active' 
            ";

            //3.Execute the Query and Save in Database
            $res=mysqli_query($conn, $sql);

            
            //4.Check whether the query executed or not and data added or not
            if($res == true)
            {
                // Query Executed and Category Added
                $_SESSION['add']="<div class='success'>Category Added Successfully.</div>";
                // Redirect to Manage Category Page
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
            
                // Query Executed and Category Added
                $_SESSION['add']="<div class='error'>Failed to add category.</div>";
                // Redirect to Manage Category Page
                header('location:'.SITEURL.'admin/add-category.php');
            }
        }
        
    
    ?>
   
    </div>

</div>


<?php include('partials/footer.php'); ?>

