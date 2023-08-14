<?php
include('../admin/config/dbcon.php');
 $sql="SELECT 
            p.post_id,
            p.title,
            c.category_id,
            c.category_name,
            
            s.*
            
            FROM
                category c
            LEFT JOIN
                subcategory s ON c.category_id = s.category_id
            LEFT JOIN
                post p ON c.category_id = p.category_id
            WHERE
                c.category_id = 28
                group by c.category_id
            ORDER BY
                s.subcategory_id, p.post_id";
            $run_query= mysqli_query($con,$sql);
            // $fetchdata= mysqli_fetch_assoc($run_query);
            // var_dump($fetchdata);

            // $SQLL= "SELECT * FROM subcategory WHERE category_id= '28' ";
            // $run_query= mysqli_query($con,$SQLL);
            // $fetchdata= mysqli_fetch_row($run_query);
            // var_dump($fetchdata);

            // $subcategory_query = "SELECT * FROM subcategory WHERE category_id = '28'";
            // $subcategory_query_run = mysqli_query($con, $subcategory_query);
            // $subcategory_row = mysqli_fetch_assoc($subcategory_query_run);
            // print_r($subcategory_row);


            if ($run_query->num_rows > 0) {
                // Output data of each row
                while ($row = $run_query->fetch_assoc()) {
                    echo "Category ID: " . $row["category_id"] . "<br>";
                    echo "Category Name: " . $row["category_name"] . "<br>";
                    echo "Subcategory ID: " . $row["subcategory_id"] . "<br>";
                    echo "Subcategory Name: " . $row["subcategory_name"] . "<br>";
                    echo "Post ID: " . $row["post_id"] . "<br>";
                    echo "Post Title: " . $row["title"] . "<br>";
                    echo "<hr>";
                }
            } else {
                echo "0 results";
            }



            ?>