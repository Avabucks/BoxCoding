-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Giu 20, 2022 alle 09:16
-- Versione del server: 5.7.37-cll-lve
-- Versione PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h1015089_boxcoding`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name_category` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name_category`) VALUES
(1, 'UI/UX'),
(2, 'NavBar'),
(3, 'Footer'),
(4, 'Animation'),
(5, 'Buttons'),
(6, 'Cards'),
(7, 'Input'),
(8, 'Social'),
(9, 'Loading'),
(10, 'JavaScript');

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_elements`
--

CREATE TABLE `tbl_elements` (
  `id` int(11) NOT NULL,
  `id_elem` mediumtext NOT NULL,
  `name_el` mediumtext NOT NULL,
  `description_el` mediumtext NOT NULL,
  `image_el` mediumtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `preview_el` int(11) NOT NULL,
  `preview_size` mediumtext NOT NULL,
  `html_text` longtext NOT NULL,
  `css_text` longtext NOT NULL,
  `javascript_text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tbl_elements`
--

INSERT INTO `tbl_elements` (`id`, `id_elem`, `name_el`, `description_el`, `image_el`, `category_id`, `preview_el`, `preview_size`, `html_text`, `css_text`, `javascript_text`) VALUES
(1, 'el-00002', 'Button Hover', 'Button Hover Effect Using Only HTML & CSS.', 'project/el-00002.png', 5, 1, '100x200', '<button class=\"cta\">\n  Hover me <i class=\"bx bx-right-arrow-alt\"></i>\n</button>\n', '/* ===== Boxicons CSS  */\n§§chiocciola§§import url(\"https://unpkg.com/boxicons§§chiocciola§§2.1.1/css/boxicons.min.css\");\n\n.cta {\n    display: flex;\n    align-items: center;\n    color:#fff;\n    background: none;\n    border: none;\n    padding: 12px 18px;\n    position: relative;\n    font-size: .95em;\n    cursor: pointer;\n    font-weight: 500;\n}\n.cta .bx {\n    font-size: 19px;\n    margin-left: 15px;\n}\n.cta:before {\n    content: \"\";\n    position: absolute;\n    top: 50%;\n    transform: translateY(-50%)\n    translateX(calc(100% + 27px));\n    width: 45px;\n    height: 45px;\n    background: #dc143c;\n    border-radius: 50px;\n    transition: transform .25s .25s\n    cubic-bezier(0, 0, .5, 2), width\n    .25s cubic-bezier(0, 0, .5, 2);\n    z-index: -1;\n}\n.cta:hover::before {\n    width: 100%;\n    transform: translateY( -50%)\n    translateX(-18px);\n    transition: transform .25s\n    cubic-bezier(0, 0, .5, 2), width\n    .25s .25s cubic-bezier(0, 0, .5, 2);\n}\n.cta i {\n    margin-left: 5px;\n    transition: transform .25s .4s\n    cubic-bezier(0, 0, .5, 2);\n}\n.cta:hover i {\n    transform: translateX(3px);\n}\n', ''),
(2, 'el-00001', 'Scroll Animation', 'Amazing Scroll Animation Using Only HTML & CSS.', 'project/el-00001.png', 4, 1, '100x200', '<span class=\"mouse\">\n  <span class=\"mouse-wheel\"></span>\n</span>', '.mouse {\n    width: 25px;\n    height: 50px;\n    border: 2px solid #fff;\n    border-radius: 20px;\n    display: flex;\n    opacity: .9;\n}\n.mouse-wheel {\n    display: block;\n    width: 10px;\n    height: 10px;\n    background-color: #fff;\n    border-radius: 50%;\n    margin: auto;\n    animation: move-wheel 2s infinite;\n}\n§§chiocciola§§keyframes move-wheel {\n    0% {\n        opacity: 1;\n        transform: translateY(-.8rem);\n    }\n    100% {\n        opacity: 0;\n        transform: translateY(.8rem);\n    }\n}\n', ''),
(3, 'el-00003', 'Context Menu', 'Context Menu with hover animations Using Only HTML & CSS.', 'project/el-00003.png', 1, 1, '100x200', '<ul class=\"context\">\r\n    <li><a><i class=\"bx bx-plus\"></i>New tab to the right</a></li>\r\n    <li class=\"divisor\"></li>\r\n    <li><a><i class=\"bx bx-save\"></i>Save</a></li>\r\n    <li><a><i class=\"bx bx-printer\"></i>Print</a></li>\r\n    <li><a><i class=\"bx bx-undo\"></i>Undo</a></li>\r\n    <li class=\"divisor\"></li>\r\n    <li><a><i class=\"bx bx-comment\"></i>Comment</a></li>\r\n    <li><a><i class=\"bx bx-expand-horizontal\"></i>Inspect</a></li>\r\n</ul>', '/* ===== Boxicons CSS  */\r\n@import url(\"https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css\");\r\n\r\n.context {\r\n    padding: 0 7px;\r\n    border-radius: 10px;\r\n    background-color: #fff;\r\n    color: rgb(20, 20, 20);\r\n    list-style-type: none;\r\n    -webkit-box-shadow: 2px 5px 6px 3px rgb(100, 100, 100, .2); \r\n    box-shadow: 2px 5px 6px 3px rgb(100, 100, 100, .2);\r\n}\r\n.context li a{\r\n    display: flex;\r\n    align-items: center;\r\n    padding: 12px 10px;\r\n    border-radius: 7px;\r\n    cursor: pointer;\r\n    user-select: none;\r\n    width: 200px;\r\n    transition: .1s;\r\n    background-color:rgb(200, 200, 200, 0);\r\n    font-size: 14px;\r\n    margin: 7px auto;\r\n}\r\n.context li a:hover {\r\n    background-color: rgb(200, 200, 200, .4);\r\n}\r\n.context li a:active {\r\n    background-color: rgb(200, 200, 200, .6);\r\n}\r\n.context li a i {\r\n    color: rgb(20, 20, 20, .7);\r\n    font-size: 18px;\r\n    margin-right: 10px;\r\n}\r\n.context .divisor {\r\n    width: 100%;\r\n    height: 1px;\r\n    background-color: rgb(100, 100, 100, .2);\r\n}', ''),
(4, 'el-00004', 'Floating Input', 'Floating Label Input Animation Using Only HTML & CSS.', 'project/el-00004.png', 7, 1, '100x200', '<div class=\"field\">\n    <input type=\"text\" name=\"fullname\" id=\"fullname\" placeholder=\"Name\">\n    <label for=\"fullname\">Name</label>\n</div>', '.field {\n    display: flex;\n    flex-flow: column-reverse;\n    justify-content: center;\n    border: 0;\n    border-bottom: 1px solid #ccc;\n    border-radius: 2px;\n    padding: 8px 12px;\n    font-size: .95em;\n    cursor: text;\n    background-color: rgb(255, 255, 255);\n    border-bottom: 2px solid rgb(100, 100, 100);\n    transition: .2s;\n}\n.field:hover {\n    background-color: rgb(220, 220, 220);\n}\n.field:focus-within {\n    border-bottom: 2px solid rgb(97, 61, 193);\n    background-color: rgb(200, 200, 200);\n}\n\n.field input::-webkit-input-placeholder {\n    opacity: 0;\n}\n.field input::-moz-placeholder {\n    color: transparent !important;\n}\n\n.field input {\n    border: 0;\n    background-color: rgb(0, 0, 0, 0);\n    outline: 0;\n    font-size: 15px;\n    transition: all 0.2s;\n}\n.field input + label {\n    transform-origin: left;\n    color: rgb(20, 20, 20, .7);\n    cursor: text;\n    font-size: 15px;\n    user-select: none;\n    transition: all 0.2s;\n}\n.field input + label {\n    transform: translate(0, 50%) scale(1);\n}\n.field input:not(:placeholder-shown) + label,\n.field input:focus + label {\n    transform: translate(0, 0) scale(.8);\n}', ''),
(5, 'el-00005', 'Submit Button', 'Submit Button Effect Using Only HTML & CSS.', 'project/el-00005.png', 5, 1, '100x200', '<button class=\"submit\">\n    <span class=\"text\">Submit</span>\n    <i class=\"bx bx-check icon\"></i>\n</button>', '.submit {\n    position: relative;\n    width: 100px;\n    height: 50px;\n    font-size: 15px;\n    background-color: rgb(20, 20, 20);\n    color: #fff;\n    border: none;\n    border-radius: 4px;\n    cursor: pointer;\n    transition: width .5s,\n    border-radius .5s;\n}\n.submit *{\n    position: absolute;\n    top: 50%;\n    left: 50%;\n    transform: translate(-50%, -50%);\n    transition: opacity .25s;\n}\n.submit .icon{\n    opacity: 0;\n    font-size: 20px;\n}\n.submit .icon, .submit .text {\n    pointer-events: none;\n}\n.submit-animation {\n    width: 50px;\n    background-color: #44c08a;\n    border-radius: 50%;\n}\n.submit-animation .text {\n    opacity: 0;\n}\n.submit-animation .icon {\n    opacity: 1;\n    transition-delay: .5s;\n}', 'const submits = document.querySelectorAll(\".submit\");\nsubmits.forEach((submit, index) => {\n    submit.addEventListener(\"click\", handleOnClickSubmit);\n});\n\nfunction handleOnClickSubmit(e) {\n    console.log(e.target);\n    e.target.classList.toggle(\"submit-animation\");\n}'),
(7, 'el-00007', 'OTP Input Field', 'OTP/PIN Input Field with Events Using Only HTML, CSS & JavaScript.', 'project/el-00007.png', 7, 1, '100x200', '<div class=\"otp-field\">\n    <input type=\"text\" maxlength=\"1\" />\n    <input type=\"text\" maxlength=\"1\" />\n    <input class=\"space\" type=\"text\" maxlength=\"1\" />\n    <input type=\"text\" maxlength=\"1\" />\n    <input type=\"text\" maxlength=\"1\" />\n    <input type=\"text\" maxlength=\"1\" />\n</div>', '.otp-field {\n    display: flex;\n}\n.otp-field input {\n    width: 37px;\n    font-size: 18px;\n    padding: 10px;\n    text-align: center;\n    border-radius: 5px;\n    margin: 4px;\n    border: 2px solid rgb(255, 255, 255, .2);\n    background: rgb(100, 100, 100, .2);\n    color: #fff;\n    outline: none;\n    transition: all 0.1s;\n}\n\n.otp-field input:focus {\n    border: 2px solid #a527ff;\n    box-shadow: 0 0 2px 2px #a527ff6a;\n}\n.disabled {\n    opacity: 0.5;\n}\n.space {\n    margin-right: 1rem !important;\n}', 'const inputs = document.querySelectorAll(\".otp-field input\");\ninputs.forEach((input, index) => {\n    input.dataset.index = index;\n    input.addEventListener(\"paste\", handleOnPasteOtp);\n    input.addEventListener(\"keyup\", handleOtp);\n});\n\nfunction handleOnPasteOtp(e) {\n    const data = e.clipboardData.getData(\"text\");\n    const value = data.split(\"\");\n    if (value.length == inputs.length) {\n        inputs.forEach((input, index) => (input.value = value[index]));\n        submit();\n    }\n}\n\nfunction handleOtp(e) {\n    const input = e.target;\n    let value = input.value;\n    input.value = \"\";\n    input.value = value ? value[0] : \"\";\n\n    let fieldIndex = input.dataset.index;\n    if (value.length > 0 && fieldIndex < inputs.length - 1) {\n        input.nextElementSibling.focus();\n    }\n\n    if (e.key == \"Backspace\" && fieldIndex > 0) {\n        input.previousElementSibling.focus();\n    }\n\n    if (fieldIndex == inputs.length - 1) {\n        submit();\n    }\n}\n\nfunction submit() {\n    let otp = \"\";\n    inputs.forEach((input) => {\n        otp += input.value;\n        input.disabled = true;\n        input.classList.add(\"disabled\");\n    });\n    console.log(otp);\n}'),
(8, 'el-00008', 'Login Form', 'Login Form Responsive with animation Using HTML, CSS, JavaScript', 'project/el-00008.png', 1, 1, '100x200', '<div class=\"login\">\n    <div>\n        <p class=\"title\">Log In</p>\n        <input placeholder=\"Email\" required />\n        <input placeholder=\"Password\" type=\"password\" required />\n        <button class=\"loader\">Sign in</button>\n        <a href=\"#\">Forgtot your password?</a>\n        <p class=\"text\">Don\"t have an account?</p>\n        <button class=\"buttonShadow\">Create new account</button>\n    </div>\n</div>', '/* ===== Boxicons CSS  */\n§§chiocciola§§import url(§§virgoletta§§https://unpkg.com/boxicons§§chiocciola§§2.1.1/css/boxicons.min.css§§virgoletta§§);\n\n.login {\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    height: 100%;\n    width: 100%;\n}\n\n.login > div {\n    display: flex;\n    align-items: center;\n    flex-direction: column;\n    padding: 30px;\n    border-radius: 8px;\n    background-color: #fff;\n}\n\n.login .title {\n    color: rgb(30, 30, 30);\n    font-size: 18px;\n    font-weight: bold;\n    margin: 30px auto 20px;\n}\n\n.login input {\n    width: 260px;\n    border-radius: 4px;\n    margin: 10px auto;\n    padding: 11px 15px;\n    background-color: rgb(245, 245, 245);\n    outline: none;\n    border: 1px solid rgb(0, 0, 0, 0);\n    font-size: 15px;\n    color: rgb(30, 30, 30);\n    transition: .3s;\n}\n.login input::placeholder {\n    color: rgb(200, 200, 200);\n}\n.login input:hover {\n    background-color: #F1EFF1;\n}\n.login input:focus {\n    background-color: #fff;\n    border: 1px solid rgb(87, 126, 219);\n    box-shadow: 0 0 4px 2px rgb(50, 50, 50, .1);\n}\n.login input:valid {\n    border: 1px solid rgb(220, 220, 220);\n}\n\n.login button {\n    border-radius: 4px;\n    background-color: rgb(87, 126, 219);\n    height: 45px;\n    padding: 12px;\n    width: 260px;\n    font-size: 14px;\n    font-weight: bold;\n    color: #fff;\n    border: none;\n    cursor: pointer;\n    margin: 20px auto;\n    transition: .3s;\n}\n.login button:hover {\n    background-color: #3A6DD8;\n}\n.login button i {\n    font-size: 16px;\n}\n\n.login .buttonShadow {\n    background-color: #fff;\n    color: rgb(100, 100, 100);\n    box-shadow: 0 0 4px 2px rgb(50, 50, 50, .1);\n}\n.login .buttonShadow:hover {\n    background-color: rgb(50, 50, 50, .2);\n}\n\n.login a {\n    text-decoration: none;\n    color: rgb(160, 160, 160);\n    font-size: 12px;\n}\n\n.login .text {\n    font-size: 15px;\n    margin: 40px auto 0;\n    color: rgb(20, 20, 20);\n}\n\n§§chiocciola§§media only screen and (max-width: 830px) {\n\n    .login > div {\n        border-radius: 0;\n        width: 100%;\n        height: 100%;\n        padding: 0;\n        overflow: auto;\n    }\n\n}', 'const loaders = document.querySelectorAll(\".loader\");\nloaders.forEach((loader, index) => {\n    loader.addEventListener(\"click\", handleOnClickLoad);\n});\n\nfunction handleOnClickLoad(e) {\n    e.target.§§innerH§T§M§L§§ = \"<i class=§§virgoletta§§bx bx-loader-alt bx-spin§§virgoletta§§></i>\";\n}'),
(9, 'el-00009', 'Input Animation', 'Input Animation Using Only HTML & CSS.', 'project/el-00009.png', 7, 1, '100x200', '<div class=\"input-cont\">\n    <input type=\"text\" name=\"fullname\" id=\"fullname\" placeholder=\"Fullname\" required>\n    <span class=\"border-bottom\"></span>\n</div>', '.input-cont {\n    position: relative;\n}\n.input-cont input {\n    padding: 5px 1px;\n    width: 250px;\n    font-size: 15px;\n    border: 0;\n    background-color: rgb(0, 0, 0, 0);\n    outline: 0;\n    font-size: 15px;\n    border-bottom: 1px solid rgb(100, 100, 100);\n    color: rgb(200, 200, 200, .9)\n}\n.input-cont input::placeholder {\n    color: rgb(100, 100, 100);\n    letter-spacing: .5px;\n}\n\n.input-cont::after {\n    content: \"\";\n    position: absolute;\n    left: 0;\n    bottom: 0;\n    width: 100%;\n    height: 2px;\n    transform: scaleX(0);\n    transform-origin: center;\n    transition: .3s;\n}\n.input-cont:focus-within::after {\n    transform: scaleX(1);\n    background-color: #3a3b9c !important;\n}', ''),
(10, 'el-00010', 'Button Animation', 'Button Hover Effect Using Only HTML & CSS.', 'project/el-00010.png', 5, 1, '100x200', '<button class=\"butt\">\n    <i class=§§virgoletta§§bx bxs-slideshow§§virgoletta§§></i>Slideshow\n</button>', '/* ===== Boxicons CSS  */\n§§chiocciola§§import url(§§virgoletta§§https://unpkg.com/boxicons§§chiocciola§§2.1.1/css/boxicons.min.css§§virgoletta§§);\n\n.butt {\n    display: flex;\n    align-items: center;\n    gap: 10px;\n    border: 0;\n    outline: 0;\n    color: #fff;\n    background-color: #723fff;\n    cursor: pointer;\n    padding: 16px 35px;\n    font-size: 1em;\n    border-radius: 50rem;\n    transition: .2s linear;\n}\n.butt:hover {\n    transform: translateY(-3px);\n    background-color: #642cff;\n}\n.butt:active {\n    transform: translateY(0);\n    background-color: #5517ff;\n}\n.butt i {\n    font-size: 1.3em;\n}', ''),
(11, 'el-00011', 'Link Hover', 'Link Hover Animation Using Only HTML & CSS.', 'project/el-00011.png', 5, 1, '100x200', '<div class=\"link\">\n    Hover me\n</div>', '.link {\n    position: relative;\n    font-size: 1em;\n    color: #fff;\n    cursor: pointer;\n    line-height: 30px;\n}\n.link::after {\n    content: \"\";\n    position: absolute;\n    left: 0;\n    bottom: 0;\n    width: 99%;\n    height: 1px;\n    transform-origin: left;\n    transform: scaleX(0);\n    transition: .3s;\n    background-color: #fff;\n}\n.link:hover::after {\n    transform: scaleX(1);\n}', ''),
(12, 'el-00012', 'Card Hover', 'Card Animation with Hover Effect Using Only HTML & CSS.', 'project/el-00012.png', 6, 1, '100x200', '<div class=\"cardLink\">\n    <a href=\"#\">\n        <div>\n            <i class=§§virgoletta§§bx bxl-visual-studio§§virgoletta§§></i>\n            <strong>Visual Studio Code</strong>\n            <p>Free coding editor in any programming language.</p>\n        </div>\n        <span>Download Now</span>\n    </a>\n</div>', '/* ===== Boxicons CSS  */\n§§chiocciola§§import url(§§virgoletta§§https://unpkg.com/boxicons§§chiocciola§§2.1.1/css/boxicons.min.css§§virgoletta§§);\n\n.cardLink {\n    position: relative;\n    border-radius: 20px;\n    background-color: rgb(220, 220, 220);\n    width: 250px;\n    padding: 40px 20px;\n    transition: .2s;\n    overflow: hidden;\n    user-select: none;\n    box-sizing: border-box;\n}\n.cardLink:hover {\n    background-color: #E8E2F7;\n}\n.cardLink:hover > a div {\n    opacity: 0;\n}\n.cardLink:hover > a span {\n    opacity: 1;\n    transform: translate(-50%, -50%);\n    top: 50%;\n}\n\n.cardLink a {\n    color: #000;\n    text-decoration: none;\n    text-align: center;\n}\n.cardLink a div {\n    display: flex;\n    flex-direction: column;\n    gap: 20px;\n    opacity: 1;\n    transition: .2s;\n}\n.cardLink i {\n    font-size: 50px;\n}\n.cardLink strong {\n    font-size: 24px;\n    font-weight: 700;\n}\n.cardLink p {\n    font-size: 16px;\n    line-height: 25px;\n}\n.cardLink span {\n    color: #873ADF;\n    font-weight: 700;\n    font-size: 30px;\n    line-height: 42px;\n    opacity: 0;\n    transition: .2s;\n    position: absolute;\n    top: 100%;\n    left: 50%;\n    transform: translate(-50%, 0%);\n}', ''),
(13, 'el-00013', 'Social Buttons', 'Social Buttons with Hover Effect Using Only HTML & CSS.', 'project/el-00013.png', 8, 1, '100x200', '<div class=\"socialButton\">\n    <a><i class=§§virgoletta§§bx bxl-instagram-alt§§virgoletta§§></i></a>\n    <a><i class=§§virgoletta§§bx bxl-facebook§§virgoletta§§></i></a>\n    <a><i class=§§virgoletta§§bx bxl-twitter§§virgoletta§§></i></i></a>\n    <a><i class=§§virgoletta§§bx bxl-discord-alt§§virgoletta§§></i></a>\n</div>', '/* ===== Boxicons CSS  */\n§§chiocciola§§import url(§§virgoletta§§https://unpkg.com/boxicons§§chiocciola§§2.1.1/css/boxicons.min.css§§virgoletta§§);\n\n.socialButton {\n    display: flex;\n    align-items: center;\n    gap: 25px;\n    cursor: pointer;\n}\n.socialButton i {\n    font-size: 28px;\n    text-decoration: none;\n    color: rgb(200, 200, 200);\n    transition: .3s;\n    opacity: .8;\n    transform: translateY(0);\n}\n.socialButton i:hover {\n    opacity: 1;\n    transform: translateY(-2px);\n}', ''),
(14, 'el-00014', 'Slider Skills', 'Slider Skills Using Only HTML & CSS.', 'project/el-00014.png', 6, 1, '100x200', '<div class=\"skills\">\n    <div class=\"skillsCont\">\n        <div class=\"title\"><p>HTML</p><p>90%</p></div>\n        <div class=\"slider\"><div style=\"width: 90%;\"></div></div>\n    </div>\n    <div class=\"skillsCont\">\n        <div class=\"title\"><p>CSS</p><p>76%</p></div>\n        <div class=\"slider\"><div style=\"width: 76%;\"></div></div>\n    </div>\n    <div class=\"skillsCont\">\n        <div class=\"title\"><p>JavaScript</p><p>82%</p></div>\n        <div class=\"slider\"><div style=\"width: 82%;\"></div></div>\n    </div>\n    <div class=\"skillsCont\">\n        <div class=\"title\"><p>PHP</p><p>67%</p></div>\n        <div class=\"slider\"><div style=\"width: 67%;\"></div></div>\n    </div>\n</div>', '.skills {\n    display: flex;\n    flex-direction: column;\n}\n.skillsCont {\n    margin: 20px 0;\n    width: 300px;\n    display: flex;\n    flex-direction: column;\n    gap: 5px;\n    color: rgb(200, 200, 200);\n}\n.skillsCont .title {\n    display: flex;\n    justify-content: space-between;\n}\n.skillsCont .slider {\n    height: 8px;\n    background-color: rgb(114, 63, 255, .5);\n    border-radius: 50em;\n    width: 100%;\n}\n.skillsCont .slider div {\n    height: 8px;\n    background-color: rgb(114, 63, 255);\n    border-radius: 50em;\n}', ''),
(15, 'el-00015', 'Input Form', 'Responsive Form with Input and Textarea Using Only HTML & CSS.', 'project/el-00015.png', 1, 1, '100x200', '<div class=\"contField\">\n    <!§§trattino§§§§trattino§§ INPUTS §§trattino§§§§trattino§§>\n    <div class=\"box\">\n        <input class=\"input\" type=\"text\" name=\"fullname\" id=\"fullname\" placeholder=\"Fullname\">\n        <label for=\"fullname\">Fullname</label>\n    </div>\n    <div class=\"box\">\n        <input class=\"input\" type=\"text\" name=\"email\" id=\"email\" placeholder=\"Email\">\n        <label for=\"email\">Email</label>\n    </div>\n    <!§§trattino§§§§trattino§§ TEXTAREA §§trattino§§§§trattino§§>\n    <div class=\"box\">\n        <textarea class=\"input\" type=\"text\" name=\"description\" id=\"description\" placeholder=\"Description\"></textarea>\n        <label for=\"description\">Description</label>\n    </div> \n</div>', '.contField {\n    display: flex;\n    flex§§trattino§§direction: column;\n    gap: 40px;\n    align§§trattino§§items: center;\n}\n\n.contField .box {\n    display: flex;\n    flex§§trattino§§flow: column§§trattino§§reverse;\n    justify§§trattino§§content: center;\n    border: 0;\n    width: 400px;\n    border§§trattino§§radius: 5px;\n    padding: 4px 15px 6px;\n    font§§trattino§§size: .9em;\n    cursor: text;\n    background§§trattino§§color: rgb(220, 220, 220, .1);\n    transition: .3s;\n}\n.contField .box:hover {\n    background§§trattino§§color: rgb(220, 220, 220, .1);\n}\n.contField .box:focus§§trattino§§within {\n    background§§trattino§§color: rgb(220, 220, 220, .2);\n}\n\n.contField .box .input::§§trattino§§webkit§§trattino§§input§§trattino§§placeholder {\n    opacity: 0;\n}\n.contField .box .input::§§trattino§§moz§§trattino§§placeholder {\n    color: transparent !important;\n}\n\n.contField .box textarea {\n    resize: none;\n    height: 150px;\n}\n\n.contField .box .input {\n    border: 0;\n    background§§trattino§§color: rgb(0, 0, 0, 0);\n    outline: 0;\n    font§§trattino§§size: 15px;\n    transition: all 0.2s;\n    color: rgb(220, 220, 220);\n}\n.contField .box .input + label {\n    transform§§trattino§§origin: left;\n    color: rgb(220, 220, 220, .4);\n    cursor: text;\n    font§§trattino§§size: 15px;\n    user§§trattino§§select: none;\n    transition: all 0.2s;\n}\n.contField .box .input + label {\n    transform: translate(0, 50%) scale(1);\n}\n.contField .box .input:not(:placeholder§§trattino§§shown) + label,\n.contField .box .input:focus + label {\n    transform: translate(0, 0) scale(.8);\n}\n\n§§chiocciola§§media only screen and (max§§trattino§§width: 830px) {\n\n    .contField .box {\n        width: 300px;\n    }\n\n}', ''),
(16, 'el-00016', 'CheckBox Input', 'CheckBox Input Animation Using Only HTML & CSS.', 'project/el-00016.png', 7, 1, '100x200', '<div class=\"form§§trattino§§check\">\n    <input type=\"checkbox\" id=\"check\" />\n    <label for=\"check\"><span>I accept the Terms of Use</span></label>\n</div>', '.form§§trattino§§check label {\n    color: rgb(255, 255, 255, .9);\n    position: relative;\n    display: flex;\n    align§§trattino§§items: center;\n    gap: 5px;\n    cursor: pointer;\n    user§§trattino§§select: none;\n}\n.form§§trattino§§check label span {\n    transform: translateX(15%);;\n}\n\n.form§§trattino§§check input[type=\"checkbox\"] {\n    display: none;\n}\n.form§§trattino§§check label::after {\n    content: \"\";\n    border: 2px solid rgb(255, 255, 255, .9);\n    width: 18px;\n    height: 18px;\n    position: absolute;\n    top: 50%;\n    transform: translateY(§§trattino§§50%);\n    border§§trattino§§radius: 4px;\n    transition: .3s;\n}\nlabel::before {\n    content: \"\";\n    background§§trattino§§image: url(\"data:image/svg+xml,%3Csvg §§x§m§l§n§s§§=§§virgoletta§§http://www.w3.org/2000/svg§§virgoletta§§ width=§§virgoletta§§24§§virgoletta§§ height=§§virgoletta§§24§§virgoletta§§ style=§§virgoletta§§fill: rgba(114, 63, 255, 1);transform: ;msFilter:;§§virgoletta§§><path d=§§virgoletta§§M7 5a2 2 0 0 0§§trattino§§2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2§§trattino§§2V7a2 2 0 0 0§§trattino§§2§§trattino§§2H7zm4 10.414§§trattino§§2.707§§trattino§§2.707 1.414§§trattino§§1.414L11 12.586l3.793§§trattino§§3.793 1.414 1.414L11 15.414z§§virgoletta§§></path></svg>\");\n    background§§trattino§§position: center;\n    background§§trattino§§size: contain;\n    width: 22px;\n    height: 22px;\n    position: absolute;\n    background§§trattino§§position: center;\n    background§§trattino§§size: 35px;\n    transition: .3s;\n\n    transform: scale(0) rotateZ(180deg);\n    transition: all 0.4s cubic§§trattino§§bezier(0.54, 0.01, 0, 1.49);\n}\n.form§§trattino§§check input[type=\"checkbox\"]:checked + label::before {\n    transform: scale(1) rotateZ(0deg);\n}\n.form§§trattino§§check input[type=\"checkbox\"]:checked + label::after {\n    border: 2px solid rgb(255, 255, 255, 0);\n}', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_saved`
--

CREATE TABLE `tbl_saved` (
  `id` int(11) NOT NULL,
  `id_item` mediumtext NOT NULL,
  `id_us` mediumtext NOT NULL,
  `date_saved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tbl_saved`
--

INSERT INTO `tbl_saved` (`id`, `id_item`, `id_us`, `date_saved`) VALUES
(71, 'el-00003', '00000', '2022-05-04'),
(73, 'el-00007', '00000', '2022-05-04'),
(74, 'tp-00001', '00000', '2022-05-17');

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_templates`
--

CREATE TABLE `tbl_templates` (
  `id` int(11) NOT NULL,
  `id_templ` mediumtext NOT NULL,
  `name_tp` mediumtext NOT NULL,
  `description_tp` mediumtext NOT NULL,
  `image_tp` mediumtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `file_tp` mediumtext NOT NULL,
  `link_tp` mediumtext NOT NULL,
  `price_tp` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tbl_templates`
--

INSERT INTO `tbl_templates` (`id`, `id_templ`, `name_tp`, `description_tp`, `image_tp`, `category_id`, `file_tp`, `link_tp`, `price_tp`) VALUES
(1, 'tp-00001', 'Innovative - Template', 'Landing Page Template Using HTML, CSS & JavaScript', 'project/tp-00001.png', 1, 'project/tp-00001', 'https://avabucks.gumroad.com/l/qruoo', '14.99 $');

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username_us` varchar(256) NOT NULL,
  `email_us` varchar(256) NOT NULL,
  `password_us` varchar(256) NOT NULL,
  `id_us` mediumtext NOT NULL,
  `premium_us` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username_us`, `email_us`, `password_us`, `id_us`, `premium_us`) VALUES
(1, 'localhost', 'local@host.it', '25d55ad283aa400af464c76d713c07ad', '00000', 1),
(2, 'nirine', 'ilainiriko.tambaza@gmail.com', '01dc6ca06ac713bcccc41696885d5de6', '8cd6f2ebc576f7cbbb1fed3c484fa7a3', 0),
(3, 'michael.sell@usa.net', 'michael.sell@usa.net', 'b41c5a4128c876137fb687a159e39ef1', 'd5f3fe7467cc17c856a72591029b8748', 0),
(4, 'cdujardin4000', 'cedric.dujardin4000@gmail.com', '7403f1c6022ae8710d19ca21dabef6b1', '1c52b2417899963563fe0027010e8faa', 0),
(5, 'cedric', 'cdujardin4000@gmail.com', 'd1c21a90fbfb544913f40e8147ad5bb8', 'e961166cabd078abdb989137747c2a5b', 0),
(6, 'mizomico', 'afshatshow@gmail.com', '98c0f5e1e6ce877c2ad3a24c06d682d1', '3f57a5d98aaed91bc8675581c765837a', 0),
(7, 'epistemopholic', 'epistemopholic@gmail.com', '923e02cb0629896f7d2f1b3012c7c679', 'eae4afa271fed41811476b35c6b7fb06', 0),
(8, 'tesfaye', 'Gettesfu@gmail.com', 'e0a8aa81eb1762d529783cf587f6f422', '9f8caf8f369aaf2998f3c0ba6db631fe', 0),
(9, 'StanJr', 'stanjunior262@gmail.com', '37fe1604c862f910b2b3c6b401e1ae26', '2b443b1bf65e83aa8f68578cf2eaccd9', 0),
(10, 'Sauravmdhr', 'manandhar4388@gmail.com', '20185d87c057885105179a1740a950d0', '8b4b6d483ae20fc9b06f1a1ce5390df4', 0),
(11, 'knowshare', 'knowshare1989@gmail.com', 'cf79e3121608d583e58d2469e33f72b9', 'e74b3c01ca1877f5d3887c3b363999c3', 0),
(12, 'Talk2nuel', 'Ochemeemmanuel3@gmail.com', 'cf19971aa28f5ae80ad740d6fa62b3d0', 'e8442a2bdab8026dd719719b977cf432', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tbl_elements`
--
ALTER TABLE `tbl_elements`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tbl_saved`
--
ALTER TABLE `tbl_saved`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tbl_templates`
--
ALTER TABLE `tbl_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `tbl_elements`
--
ALTER TABLE `tbl_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `tbl_saved`
--
ALTER TABLE `tbl_saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT per la tabella `tbl_templates`
--
ALTER TABLE `tbl_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
