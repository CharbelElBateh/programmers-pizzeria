<?php

//Views files are generic container for certain information 
//They help in avoiding repetition of html code and makes them easily updatable

//Getting all toppings information from the table
$toppings = getAllTbl('tbl_topping');

//Create a container for each sauce
while ($row = $toppings->fetch_assoc()) {
  echo '
    <label class="option_item">
      <div class="option_inner size">
        <img src="images/' . $row["topping_name"] . '.jpg" alt="' . $row["topping_name"] . '" width="107">
        <p>
          <label for="' . $row["topping_name"] . '" class="h3">' . $row["topping_name"] . '</label>
        </p>
        <div>
          <label class="switch">
            <input type="checkbox" value="' . $row["topping_name"] . '" class="checkbox" id="' . $row["topping_name"] . '" name="' . $row["topping_name"] . '">
            <span class="slider"></span>
          </label>
        </div>
      </div>
  </label>';
}
