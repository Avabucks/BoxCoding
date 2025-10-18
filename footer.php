<!DOCTYPE html>
<html lang="en">

<head>

  <style>

    .footer * {
        box-sizing: border-box;
    }
    .footer {
        padding: 70px 0 0;
        background-color: var(--bg);
        box-sizing: border-box;
        width: 100%;
        font-size: 1em;
        border-top: 1px solid rgb(255, 255, 255, .1);
    }
    .footer .cont {
        max-width: 1170px;
        margin: auto;
    }
    .footer .row {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        color: rgb(255, 255, 255, 1);
    }
    .footer .row > div:nth-child(1) {
        width: 35%;
    }
    .footer .row > div {
        width: 20%;
        padding: 0 25px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        flex-grow: 1;
    }

    .footer .row p {
        margin: 20px 0;
        color: rgb(255, 255, 255, .8);
        font-size: .9em;
        line-height: 1.8em;
        width: 90%;
    }

    .footer .row h4 {
        background-color: rgb(85, 73, 241, .2);
        color: rgb(85, 73, 241, 1);
        width: fit-content;
        border-radius: 7px;
        padding: 5px 10px;
        font-weight: 600;
    }

    .footer .row ul,
    .footer .row li {
        list-style-type: none;
        padding-left: 0;
        margin: 15px 0;
        transition: .3s;
        overflow: hidden;
    }

    .footer .row li {
        transform: translateX(-15px);
    }
    .footer .row li::before {
        content: '';
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-top: 5px solid transparent;
        border-left: 8px solid rgb(85, 73, 241);
        border-bottom: 5px solid transparent;
    }
    .footer .row li:hover {
        transform: translateX(0);
    }
    .footer .row ul a {
        text-decoration: none;
        color: rgb(255, 255, 255, .8);
        margin-left: 15px;
    }

    .footer .copyright {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
        height: 80px;
        background-color: rgb(10, 10, 10);
        color: rgb(255, 255, 255, .7);
        border-top: 1px solid rgb(255, 255, 255, .1);
        font-size: .8em;
    }

    /* Responsive */
    @media only screen and (max-width: 1170px) {

        .footer .row > div {
            width: 50% !important;
            margin-bottom: 30px;
        }

    }
    @media only screen and (max-width: 574px) {
        
        .footer .row > div {
            width: 100% !important;
        }

    }
  </style>

</head>

<body>

  <?php include 'config.php'; ?>

  <footer data-aos="fade-in" class="footer">
      <div class="cont">
          <div class="row">
              <div>
                  <h2>BoxCoding by Avabucks</h2>
                  <p>BoxCoding is a website for frontend developers featuring hundreds of community-made CSS and HTML UI elements. All elements are open source and free to use. Explore Elements and Free Source Code in HTML, CSS and JavaScript that can be used in your next project.</p>
              </div>
              <div>
                  <h4>Pages</h4>
                  <ul>
                      <li><a href="<?php echo $folder ?>/community">Community</a></li>
                      <li><a href="<?php echo $folder ?>/component">Components</a></li>
                      <li><a href="<?php echo $folder ?>/resources">Resources</a></li>
                      <li><a href="<?php echo $folder ?>/privacy">Privacy & Policy</a></li>
                  </ul>  
              </div>
              <div>
                  <h4>Account</h4>
                  <ul>
                      <li><a href="<?php echo $folder ?>/manage_component?id=0">Add Component</a></li>
                      <li><a href="<?php echo $folder ?>/dashboard">Dashboard</a></li>
                      <li><a href="<?php echo $folder ?>/login">Login</a></li>
                      <li><a href="<?php echo $folder ?>/signup">Signup</a></li>
                  </ul>    
              </div>
          </div>
      </div>
      <div class="copyright">
          <p>© BoxCoding by Avabucks</p>
      </div>
  </footer>

</body>

</html>
