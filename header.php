<!DOCTYPE html>
<html lang="en">

<head>

  <style>
    .header {
      position: relative;
      top: 0;
      z-index: 1000;
      top: 0;
      left: 0;
      padding: 10px 0;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: nowrap;
      width: 100%;
      transition: background-color .3s;
      height: 105px;
      padding-inline: 100px;
      border-bottom: 1px solid rgb(255, 255, 255, .1);
    }

    .header>div {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .header .headerLeft {
      align-items: center;
      display: flex;
      gap: 35px;
      color: rgb(0, 0, 0);
      transition: .3s;
    }

    .header .headerLeft i {
      font-size: 1.4em;
      cursor: pointer;
      color: rgb(0, 0, 0);
      display: none;
      color: var(--light);
    }

    .header .logo {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .header .logo>a {
      display: flex;
      align-items: center;
      height: 60px !important;
      margin: -15px;
    }

    .header .logo img {
      height: 45px;
    }

    .header .title {
      font-size: 45px;
    }

    .header a {
      text-decoration: none;
      color: rgb(0, 0, 0);
      cursor: pointer;
      transition: .3s;
    }

    .header a div {
      margin-left: 10px;
    }

    .header a h2 {
      font-weight: 600;
      font-size: 1.1em;
      line-height: 23px;
      color: var(--light);
    }

    .header a h3 {
      font-weight: 500;
      font-size: .9em;
      line-height: 23px;
      color: var(--light);
      opacity: .7;
    }

    .header .menu-cont {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .header .menu {
      font-size: 1em;
      display: flex;
      align-items: center;
      flex-direction: row;
      gap: 20px;
      list-style-type: none;
    }

    .header .li a {
      width: fit-content;
      position: relative;
      font-size: .9em;
      font-weight: 500;
      cursor: pointer;
      line-height: 24px;
      height: 50px;
      padding-inline: 15px;
      border-radius: 10px;
      color: var(--light);
      display: flex;
      align-items: center;
      opacity: .9;
    }

    .header .li a i {
      font-size: 20px;
    }

    .header .outline {
      outline: 1px solid rgb(255, 255, 255, .2);
      border-radius: 10px;
    }
    .header .outline a {
      display: flex;
      gap: 5px;
    }
    .header .outline span {
      max-width: 200px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .header .li a::after {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      transform-origin: center;
      transition: .3s;
      border-radius: 10px;
      background-color: rgb(255, 255, 255, .1);
      z-index: -1;
      transform: scale(.5, .5);
      opacity: 0;
    }

    .header .li a:hover::after {
      transform: scale(1, 1);
      opacity: 1;
    }

    .hidden {
      display: none !important;
    }

    .header .v-divider {
      height: 40px;
      border-left: 1px solid rgb(255, 255, 255, .1);
    }

    .icon-butt {
      font-size: 1.5em;
      opacity: .7;
      transition: .3s;
      cursor: pointer;
    }
    .icon-butt:hover {
      opacity: 1;
    }

    .header .search-icon {
      color: var(--light);
    }
    #search {
      height: 65px;
      display: flex;
      align-items: center;
      gap: 15px;
      width: 520px;
      padding-inline: 25px;
      color: var(--light);
    }
    #search input {
      width: 100%;
      border: none;
      outline: none;
      background-color: rgb(0, 0, 0, 0);
      padding-block: 15px;
      font-size: 1em;
      color: var(--light);
    }

    .create-butt {
      display: flex;
      gap: 5px;
      align-items: center;
      justify-content: center;
      border: none;
      padding: 15px 20px;
      white-space: nowrap;
      border-radius: 10px;
      color: var(--light);
      background: linear-gradient(144deg,var(--primary),#5b42f3 50%,#00ddeb);
      cursor: pointer;
      font-size: .9em;
      font-weight: 500;
    }
    .create-butt i {
      margin-top: 2px;
      font-size: 1.3em;
    }

  </style>

</head>

<body>

  <div class="transition"></div>

  <div class="timer-alert hidden">
    <span class="text"></span>
    <div class="progress"></div>
  </div>

  <div class="popup search hidden">
    <div id="search">
      <input type="text" name="search-input" id="search-input" placeholder="Search components" />
      <i class='bx bx-search icon-butt search-go'></i>
    </div>
  </div>

  <?php include 'config.php'; ?>

  <header class="header" data-aos="fade-in" data-aos-anchor-placement="bottom-bottom">
    <div>
      <div class="headerLeft">
        <!-- <i class="toggleMenu bx bx-menu"></i> -->
        <div class="li logo">
          <i class="toggleMenu bx bx-menu"></i>
          <a href="<?php echo $folder ?>/index">
            <img src="<?php echo $folder ?>/favicon.png" alt="" />
            <div>
              <h2>BoxCoding</h2>
              <h3>by Avabucks</h3>
            </div>
          </a>
        </div>
        <div class="nav">
          <ul class="menu">
            <div class="v-divider"></div>
            <li class="lnk li"><a href="<?php echo $folder ?>/community">Community</a></li>
            <li class="lnk li"><a href="<?php echo $folder ?>/component">Components</a></li>
            <li class="lnk li resources-butt"><a href="<?php echo $folder ?>/resources">Resources</a></li>
            <li class="lnk li licence-butt"><a href="<?php echo $folder ?>/privacy">Licence</a></li>
          </ul>
        </div>
      </div>

      <div class="menu-cont">
            <button class="create-butt" onclick="location.href='<?php echo $folder ?>/manage_component?id=0';"><i class='bx bx-plus'></i>Add Component</button>
            <div class="v-divider"></div>
            <i class='bx bx-search icon-butt search-icon'></i>
            <?php if (isset($_COOKIE["login_user"])) { ?>
              <div class="li outline"><a href="<?php echo $folder ?>/dashboard"><i class='bx bx-user'></i><span><?php echo $_COOKIE["username"] ?></span></a></div>            
            <?php } else { ?>
              <div class="li outline"><a href="<?php echo $folder ?>/login">Log In</a></div>
            <?php } ?>
      </div>
    </div>
  </header>

  <script>
    const menus = document.querySelectorAll(".toggleMenu");
    const links = document.querySelectorAll(".lnk a");
    const nav = document.querySelector(".nav");

    menus.forEach((menu, index) => {
      menu.addEventListener("click", handleOnClickToggleMenu);
    });
    links.forEach((link, index) => {
      link.addEventListener("click", handleOnClickToggleMenu);
    });

    function handleOnClickToggleMenu(e) {
      nav.classList.toggle("nav-active");
    }

    window.addEventListener('load', (event) => {
      var w = window.innerWidth;
      if (w < 830) {
        document.querySelector("header").classList.add("header-scroll");
      }
      
    });

    window.addEventListener('scroll', (event) => {
      nav.classList.remove("nav-active");
    });

    document.querySelector(".search-icon").addEventListener("click", function (e) {
      document.querySelector(".search").classList.remove("hidden");
      document.querySelector("#search-input").focus();
    });
    document.querySelector(".search").addEventListener("click", function (e) {
      if (e.target.classList.contains("search")) e.target.classList.add("hidden");
    });

    document.querySelector(".search-go").addEventListener("click", function (e) {
      location.href = "<?php echo $folder ?>/community?search=" + document.querySelector("#search-input").value;
    });

    var input = document.querySelector("#search-input");
    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        location.href = "<?php echo $folder ?>/community?search=" + document.querySelector("#search-input").value;
      }
    });

    function showTimerAlert(text) {
      document.querySelector(".timer-alert").classList.remove("hidden");
      document.querySelector(".timer-alert .text").innerText = text;
      setTimeout(function () {
        document.querySelector(".timer-alert").classList.add("hidden");
      }, 4900);
    }

  </script>


</body>

</html>
