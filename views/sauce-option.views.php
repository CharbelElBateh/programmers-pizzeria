<?php

//Views files are generic container for certain information 
//They help in avoiding repetition of html code and makes them easily updatable

//Getting all sauces information from the table
$sauces = getAllTbl('tbl_sauce');

//Create a container for each sauce
while ($row = $sauces->fetch_assoc()) {
  echo '
    <label class="option_item">
      <div class="option_inner">               
        <img src="images/' . $row["sauce_name"] . '.jpg" alt="' . $row["sauce_name"] . ' Sauce" width="60">
          <p>
            <label for="' . $row["sauce_name"] . '" class="h3">' . $row["sauce_name"] . '</label>
          </p>

          <div>
            <label class="switch">
              <input type="checkbox" value="' . $row["sauce_name"] . ' Sauce" class="checkbox" id="' . $row["sauce_name"] . '" name="' . $row["sauce_name"] . '">
              <span class="slider"></span>
            </label>
          </div>
      </div>
    </label>';
}
