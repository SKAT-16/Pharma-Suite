<?php
function displayBanner()
{
  if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
    echo '<div class="banner" id="banner">' . htmlspecialchars($_SESSION['message']) . '</div>';
    unset($_SESSION['message']);
  }
}
