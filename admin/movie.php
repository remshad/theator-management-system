<?php
require('login1.php'); 


include_once('head.php');    
?>  


 <div class="container">
   
  <?php
  


  
        $sql="SELECT * FROM language";
        $result = mysqli_query($link,$sql);
        if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }   
        $langoption="<option default>-select language-</option>";

        while($row=mysqli_fetch_assoc($result))
        {
           $langoption=$langoption."<option value='{$row['lang_id']}'>{$row['language']}</option>";
        }


        $sql="SELECT * FROM category";
        $result = mysqli_query($link,$sql);
        if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }   
        $genreoption="";
        $genreoptionsort="<option default>-select genre-</option>";
        while($row=mysqli_fetch_assoc($result))
        {
           $genreoption=$genreoption."{$row['cat_name']}&nbsp;<input type='checkbox' name='new_movcat[]' value='{$row['cat_id']}'>&nbsp;&nbsp;";
           $genreoptionsort=$genreoptionsort."<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
        }
        
       
        echo "
        <button type='button' class='collapsible'>Add New Movie</button>
        <div class='content'>
        <form action='movieadd.php' method='post' enctype='multipart/form-data'>
        
            <div>
                <div>Movie Name:</div>
                <div><input type='text' name='new_movname'></div>
            </div>
            <div>
                <div>Language:</div>
                <div><select name='new_lang'>{$langoption}</select></div>
            </div>
            <div>
                <div>Genre:</div>
                <div>{$genreoption}</div>
            </div>
            <div>
                <div>Image Path:</div>
                <div><input type='text' name='new_imgsrc'></div>
            </div>
            <div>
                <div>Duration:</div>
                <div><input type='time' name='new_movdur' min='01:00' max='05:00'></div>
            </div>
            <div>
                <div>Youtube Trailer Path:</div>
                <div><input type='text' name='new_vidsrc'></div>
            </div>
            <div>
                <div>Release Date:</div>
                <div><input type='date' name='new_movreldate'></div>
            </div>
            <div>
                <div>Direction:</div>
                <div><input type='text' name='new_movdir'></div>
            </div>
            <div>
                <div>Cast:</div>
                <div><textarea name='new_movcast'>Enter text here...</textarea></div>
            </div>
            <div>
                <div>Production:</div>
                <div><input type='text' name='new_movprod'></div>
            </div>
            <div>
                <div>Description:</div>
                <div><textarea name='new_movdesc'>Enter text here...</textarea></div>
            </div>
        
            <center><input type='submit' name='submitadd' value='Add' ></center>
        </form>
        </div>";

        echo "<script>
        var coll = document.getElementsByClassName('collapsible');
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener('click', function() {
            this.classList.toggle('activec');
            var content = this.nextElementSibling;
            if (content.style.display === 'block') {
            content.style.display = 'none';
            } else {
            content.style.display = 'block';
            }
        });
        }
        </script>
        
        <br><br>";
        if(isset($_POST['filter'])){

            $filterorder=$filterlang=$filtergenre=$catjoin=$where="";
            
            if(!(($_POST['sort_lang'])=='-select language-')){
                $filterlang=" lang_id=".$_POST['sort_lang']." ";
                $where=" WHERE ";
            }

            if(!(($_POST['sort_cat'])=='-select genre-')){
                if(!$filterlang==""){
                    $filtergenre=" cat_id=".$_POST['sort_cat']." AND ";
                } else{
                    $filtergenre=" cat_id=".$_POST['sort_cat']." ";
                }
                
                
                $catjoin= " category NATURAL JOIN movie_category NATURAL JOIN ";
                $where=" WHERE ";
            }

            if(!(($_POST['sort_id'])=='-select filter-')){
                if(($_POST['sort_id'])==1){
                    $filterorder=" ORDER BY mov_released";
                } else if(($_POST['sort_id'])==2) {
                    $filterorder=" ORDER BY mov_released DESC";
                } else if(($_POST['sort_id'])==3) {
                    $filterorder=" ORDER BY mov_name";
                } else if(($_POST['sort_id'])==4) {
                    $filterorder=" ORDER BY mov_name DESC";
                }
            }


            $sql="SELECT * FROM $catjoin movie NATURAL JOIN language $where $filtergenre $filterlang $filterorder";
            //echo $sql;
            $result = mysqli_query($link,$sql);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }

        } else if(isset($_POST['filtername'])){

            
            


            $sql='SELECT * FROM movie NATURAL JOIN language WHERE mov_name LIKE "'.$_POST['checkname'].'%"';
            //echo $sql;
            $result = mysqli_query($link,$sql);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }

        } else {
            $sql="SELECT * FROM movie NATURAL JOIN language";
            $result = mysqli_query($link,$sql);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }

        }   


        echo "
            <div class='movieboxborder'>
            <center>
            <form action='movie.php' method='post' enctype='multipart/form-data'>
            <div class='contentsortbar'>
                <div class='csb-item'>
                Language:<select name='sort_lang'>{$langoption}</select>
                </div>
                <div class='csb-item'>
                Genre:<select name='sort_cat'>{$genreoptionsort}</select>
                </div>
                <div class='csb-item'>
                Sort by:
                    <select name='sort_id'>
                    <option default>-select filter-</option>
                    <option value='1'>Release Date ASC</option>
                    <option value='2'>Release Date DESC</option>
                    <option value='3'>Movie name ASC</option>
                    <option value='4'>Movie name DESC</option>
                    </select>
                </div>
                <div class='csb-item'>
                <input type='submit' name='filter' value='Apply Filter'>
                </div>
           
            </div>
            <div class='contentsortbarb'>
                <div class='csb-itemb'>
                Name:<input type='text' name='checkname'>
                </div>
                
                <div class='csb-itemb'>
                <input type='submit' name='filtername' value='Search by name'>
                </div>
           
            </div>
            </form>
            </center>";



        echo "<div class='movgrid-container'>";
       
        while($row=mysqli_fetch_assoc($result))
        {
            $sqlcat="SELECT * FROM movie NATURAL JOIN movie_category NATURAL JOIN category WHERE mov_id='{$row['mov_id']}'";
            $resultcat = mysqli_query($link,$sqlcat);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }
            $categories="";
            while($rowcat=mysqli_fetch_assoc($resultcat))
            {
                $categories.="{$rowcat['cat_name']}&nbsp";
            }
            $sqlcount="SELECT COUNT(DISTINCT(t_id)) FROM movie NATURAL JOIN movie_show NATURAL JOIN show_time NATURAL JOIN screen NATURAL JOIN theatre WHERE mov_id='{$row['mov_id']}'";
            $resultcount = mysqli_query($link,$sqlcount);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }
            while($rowcount=mysqli_fetch_assoc($resultcount))
            {
                $theatrecount=$rowcount['COUNT(DISTINCT(t_id))'];
            }

            $desc=" <b>{$row['mov_id']}.{$row['mov_name']}&nbsp({$row['language']})&nbsp{$row['mov_duration']}mins</b><br>
                    {$categories}<br>
                    Director:&nbsp{$row['mov_direction']}<br>
                    Running in theatres:&nbsp{$theatrecount}<br>
                    Production:&nbsp;{$row['mov_production']}<br>";
            

           echo "<div class='movgrid-item'>
                    <div class='movgrid-itemimg'><img src='{$row['mov_img_path']}'></div>
                    
                    <div class='movgrid-itemdesc'>
                        <div>{$desc}</div>
                        <div>
                            <form name='editmovie' action='movieedit.php' method='post' enctype='multipart/form-data'>
                            <input type='hidden' name='edit_movid' value={$row['mov_id']}>
                            <input type='submit' name='submitedit' value='Edit'>
                            </form></div>
                    </div>
                </div>";
        }
       
       
        echo "</div></div>";
    ?>
        
  </div>
<?php
    include_once('foot.php');
?>
     