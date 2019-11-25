<?php

// 4. Release returned data
  mysqli_free_result($result_set);

  // 5. Close database connection
  mysqli_close($connection);
?>

